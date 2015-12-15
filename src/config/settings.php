<?php
return [
    /*
	|--------------------------------------------------------------------------
	| Cache Filename
	|--------------------------------------------------------------------------
	|
	| Cache configuration path
	|
	*/
    'cache_file' => storage_path('settings.json'),

    /*
	|--------------------------------------------------------------------------
	| Table name to store settings
	|--------------------------------------------------------------------------
	|
	| Info: If you change this table name, dont forget to update your settings migrations file.
	|
	*/
    'db_table'   => 'settings',

    /*
	|--------------------------------------------------------------------------
	| Fallback setting
	|--------------------------------------------------------------------------
	|
	| Return Laravel config if the value with particular key is not found in cache or DB.
    | It will work if default value in laravel setting is not set, and this value is set to true
	|
	*/
    'fallback'   => true
];