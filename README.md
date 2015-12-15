[![Latest Stable Version](https://poser.pugx.org/efriandika/laravel-settings/v/stable.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![Total Downloads](https://poser.pugx.org/efriandika/laravel-settings/downloads.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![Latest Unstable Version](https://poser.pugx.org/efriandika/laravel-settings/v/unstable.svg)](https://packagist.org/packages/efriandika/laravel-settings) 
[![License](https://poser.pugx.org/efriandika/laravel-settings/license.svg)](https://packagist.org/packages/efriandika/laravel-settings)

# Laravel-Settings
Laravel 5.1.x Persistent Settings (Database + Cache)  

### Attention: for update to v1.2.0
Re-Publish new migration file

    $ php artisan vendor:publish --provider="Efriandika\LaravelSettings\SettingsServiceProvider" --force
    
And run

    $ php artisan migrate

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

    'Settings'  => Efriandika\LaravelSettings\Facades\Settings::class,

Publish the config and migration files now (Attention: This command will not work if you don't follow previous instruction):

    $ php artisan vendor:publish --provider="Efriandika\LaravelSettings\SettingsServiceProvider" --force
    
Change `config/settings.php` according to your needs. If you change `db_table`, don't forget to change the table's name
in the migration file as well.
    
Create the `settings` table. 

    $ php artisan migrate
    

## How to Use it?

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
    
## Fallback to Laravel Config (available in v1.2.0)

How to activate?

    // Change your config/settings.php
    'fallback'   => true
    
Example

    /* 
     * If the value with key => mail.host is not found in cache or DB of Larave Settings
     * it will return same value as config::get('mail.host');
     */     
    Settings::get('mail.host');

> Note: It will work if default value in laravel setting is not set
    
### Changelogs
v1.2.0 - Dec 16th, 2015

* Bugs fix
* Adding Feature: Fallback Value 


### To Do

- 

### License

The Laravel 5 Persistent Settings is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

