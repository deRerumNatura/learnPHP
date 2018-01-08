<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function dump($str) {
	echo "<pre style='background-color:pink; padding: 10px;'>";
	var_dump($str);
	echo "</pre>";
	// exit;
}