# Laravel-Settings
Laravel 5 Persistent Settings (Database + Cache)

## How to Install
Require this package with composer using the following command:

    composer require efriandika/laravel-settings

or modify your `composer.json`:
   
       "require": {
          "efriandika/laravel-settings": "dev-labs"
       }
       
then run `composer update`:

After updating composer, Register the ServiceProvider to the `providers` array in `config/app.php`

    'Efriandika\LaravelSettings\SettingsServiceProvider',
    
Add an alias for the facade to `aliases` array in  your `config/app.php`

    'Settings'  => 'Efriandika\LaravelSettings\Facades\Settings',

You can publish the config and migration files now (Attention: This command will not work if you don't follow previous instruction):

    $ php artisan vendor:publish --provider="Efriandika\LaravelSettings\SettingsServiceProvider"
    
Change `config/settings.php` according to your needs. If you change `db_table`, don't forget to change the table's name
in the migration file as well.
    
Create the `settings` table. 

    $ php artisan migrate
    

## How to Use it

Set a value

    Settings::set('key', 'value');
    
Get a value

    $value = Settings::get('key');
    
Forget a value

    Settings::forget('key');

Forget all values

    Settings::flush();
    
### To Do

* Add `settings(key)` helper as an alternative in blade templating
      
### License

The Laravel 5 Persistent Settings is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

