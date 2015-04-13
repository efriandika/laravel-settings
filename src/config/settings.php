<?php
return [
    /*
	|--------------------------------------------------------------------------
	| Cache
	|--------------------------------------------------------------------------
	|
	| Cache Configuration
    | if cache = true, you must set cache_file path.
	|
	*/
    'cache'      => true,
    'cache_file' => storage_path('settings.json'),

    /*
	|--------------------------------------------------------------------------
	| Table name to store settings
	|--------------------------------------------------------------------------
	|
	| Attention: If you change this table name, dont forget to update your settings migrations file.
	|
	*/
    'db_table'   => 'settings'
];