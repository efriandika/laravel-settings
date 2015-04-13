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
    'db_table'   => 'settings'
];