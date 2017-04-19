<?php
	define("DB_HOST", "localhost");
	define("DB_USR", "volquetas");
	define("DB_PASS", "volquetas");
	define("DB_DB", "volquetasDB");
	//define(DB_TYPE, "mysql");

	$template_config = 
    array(
        'template_dir' => 'vistas/',
        'compile_dir' => 'libs/smarty/templates_c/',
        'cache_dir' => 'libs/smarty/cache/',
        'config_dir' => 'libs/smarty/configs/',
        );
    define ("URL_BASE","/Volquetas/");
?>