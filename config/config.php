<?php
    //Default Settings
    date_default_timezone_set('Asia/Dhaka');


    //Database Configuration 
    define("DB_HOST", "localhost:3308");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "forphp");


/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

//Default Function
function check_https() {
	if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
		return 'https';
	}
	return 'http';
}

function app_url() {
	return check_https() . '://' . $_SERVER['HTTP_HOST'];
}

//Local Config
define('BASE_URL', app_url() . '/php_best_work');
define ('SITE_ROOT', realpath(dirname(__DIR__)));
define('TITLE', 'Home Work');
define('FOOTER', 'Home Work');
define('TITLE_DIVIDER', ' | ');

?>