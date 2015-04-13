[![Latest Stable Version](https://poser.pugx.org/efriandika/laravel-settings/v/stable.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![Total Downloads](https://poser.pugx.org/efriandika/laravel-settings/downloads.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![Latest Unstable Version](https://poser.pugx.org/efriandika/laravel-settings/v/unstable.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![License](https://poser.pugx.org/efriandika/laravel-settings/license.svg)](https://packagist.org/packages/efriandika/laravel-settings)

# Laravel-Settings
Laravel 5 Persistent Settings (Database + Cache)

## How to Install
Require this package with composer ([Packagist](https://packagist.org/packages/efriandika/laravel-settings)) using the following command:

    composer require efriandika/laravel-settings

or modify your `composer.json`:
   
       "require": {
          "efriandika/laravel-settings": "1.*"
       }
       
then run `composer update`:

After updating composer, Register the ServiceProvider to the `providers` array in `config/app.php`

    'Efriandika\LaravelSettings\SettingsServiceProvider',
    
Add an alias for the facade to `aliases` array in  your `config/app.php`

    'Settings'  => 'Efriandika\LaravelSettings\Facades\Settings',

You can publish the config and migration files now (Attention: This command will not work if you don't follow previous instruction):

    $ php artisan vendor:publish --provider="Efriandika\LaravelSettings\SettingsServiceProvider" --force
    
Change `config/settings.php` according to your needs. If you change `db_table`, don't forget to change the table's name
in the migration file as well.
    
Create the `settings` table. 

    $ php artisan migrate
    

## How to Use it

Set a value

    Settings::set('key', 'value');
    
Get a value

    $value = Settings::get('key');
    
Get a value with Default Value.

    $value = Settings::get('key', 'Default Value');
    
> Note: If key is not found (null) in cache or settings table, it will return default value

Get a value via an helper
    
    $value = settings('key');
    $value = settings('key', 'default value');
    
Forget a value

    Settings::forget('key');

Forget all values

    Settings::flush();
    
### To Do

- 

### License

The Laravel 5 Persistent Settings is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

