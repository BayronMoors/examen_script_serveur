<?php  
/**
 * 
 *  ./core/constante.php
 * 
 */

$base_href = explode("public/", $_SERVER['REQUEST_URI']);
define('BASE_URL', $base_href[0] . "public/");
define("DATE_FORMAT", "d-m-y");
define("TRUNCATE_LENGTH", 150);