<?php
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Efriandika\LaravelSettings\Settings;
use Efriandika\LaravelSettings\Cache;

class SettingsTest extends PHPUnit_Framework_TestCase
{
    protected $settings;
    protected $db;
    protected $config;

    protected function setUp()
    {
        $this->db = $this->initDb();

        $this->config   = [
            'db_table'   => 'settings',
            'cache_file' => storage_path('settings.json'),
        ];
        $this->settings = new Settings($this->db, new Cache($this->config['cache_file']), $this->config);
    }


    public function testSet()
    {
        $this->settings->set('key', 'value');

        $setting = $this->db->table($this->config['db_table'])->where('key', 'key')->first(['value']);
        $this->assertEquals('value', unserialize($setting['value']));
    }

    public function testSetArray()
    {
        $set = ['valuekey' => 'value'];
        $this->settings->set('key', $set);

        $setting = $this->db->table($this->config['db_table'])->where('key', 'key')->first(['value']);

        $this->assertEquals($set, unserialize($setting['value']));
        $this->assertEquals($set, $this->settings->get('key'));
    }

    public function testGet()
    {
        $this->settings->set('key', 'value');
        $this->assertEquals('value', $this->settings->get('key'));
    }

    public function testGetAll()
    {
        $this->settings->set('key', 'value');
        $this->settings->set('key2', 'value2');

        $this->assertEquals('value', $this->settings->get('key'));
        $this->assertEquals('value2', $this->settings->get('key2'));

        $this->assertEquals(['key' => 'value', 'key2' => 'value2'], $this->settings->getAll());
    }

    public function testFlush()
    {
        $this->settings->set('key', 'value');
        $this->settings->flush();
        $this->assertEquals([], $this->settings->getAll());
    }

    public function testHasKey()
    {
        $this->settings->set('key', 'value');
        $this->assertTrue($this->settings->hasKey('key'));
        $this->assertFalse($this->settings->hasKey('key2'));
    }
    public function testHasKeyWithoutCache()
    {
        $this->settings->set('key', 'value');
        $this->assertTrue($this->settings->hasKey('key'));
        $this->assertFalse($this->settings->hasKey('key2'));

        @unlink(storage_path('settings.json'));
        $this->assertTrue($this->settings->hasKey('key'));
        $this->assertFalse($this->settings->hasKey('key2'));

    }

    public function testForget()
    {
        $this->settings->set('key', 'value');
        $this->settings->forget('key');
        $this->assertNull($this->settings->get('key'));
    }

    protected function tearDown()
    {
        Capsule::schema()->drop('settings');
        @unlink(storage_path('settings.json'));
    }


    private function initDb()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'   => 'sqlite',
            'host'     => 'localhost',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Capsule::schema()->create('settings', function ($table) {
            $table->string('key', 100)->index()->unique('key');
            $table->text('value', 65535)->nullable();
        });

        return $capsule->getDatabaseManager();
    }

}
