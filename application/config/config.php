<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

	    define('HOST', '127.0.0.1');
	    define('DB', 'shop');
	    define('USER', 'root');
	    define('PASS', '');
	    define('CHARSET', 'utf8');
	    define('VIEWS_PATH', 'application/views');
	    define('PUBLIC_PATH', '/public');
	    define('IMAGE_PATH', '/public/images');

	    
function dump($str) {
	echo "<pre style='background-color:pink; padding: 10px;'>";
	var_dump($str);
	echo "</pre>";
}

