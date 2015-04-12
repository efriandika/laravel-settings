<?php
use Efriandika\LaravelSettings\Cache;

class CacheTest extends PHPUnit_Framework_TestCase
{
    protected $cache;
    protected $cacheFile;

    protected function setUp()
    {
        $this->cacheFile = storage_path('settings.json');
        $this->cache     = new Cache($this->cacheFile);
    }

    public function testSet()
    {
        $this->cache->set('key', 'value');

        $contents = file_get_contents($this->cacheFile);
        $this->assertEquals('{"key":"s:5:\"value\";"}', $contents);
    }
   public function testSetArray()
    {
        $set = ['value' => 1, 'value2' => 2];
        $this->cache->set('key', $set);

        $contents = file_get_contents($this->cacheFile);
        $this->assertEquals('{"key":"a:2:{s:5:\"value\";i:1;s:6:\"value2\";i:2;}"}', $contents);

        $this->assertEquals($this->cache->get('key'), $set);
    }

    public function testGet()
    {
        $this->cache->set('key', 'value');
        $this->assertEquals('value', $this->cache->get('key'));
    }

    public function testGetAll()
    {
        $this->cache->set('key', 'value');
        $this->cache->set('key2', 'value2');

        $this->assertEquals(['key' => 'value', 'key2' => 'value2'], $this->cache->getAll());
    }

    public function testFlush()
    {
        $this->cache->set('key', 'value');
        $this->cache->flush();
        $this->assertEquals([], $this->cache->getAll());
    }

    public function testHasKey()
    {
        $this->cache->set('key', 'value');
        $this->assertTrue($this->cache->hasKey('key'));
    }

    public function testForget()
    {
        $this->cache->set('key', 'value');
        $this->cache->forget('key');
        $this->assertNull($this->cache->get('key'));
    }


    protected function tearDown()
    {
        @unlink(storage_path('settings.json'));
    }

}
