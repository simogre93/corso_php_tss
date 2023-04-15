<?php
//print_r($_SERVER);

$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'form_in_php');
} if ($host == 'simonegreco.000webhostapp.com') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'id20608614_simo93');
    define('DB_PASSWORD', 'zdVElCoE$?spi0@2');
    define('DB_NAME', 'id20608614_form_in_php');
}



//$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
define('DB_DSN', "mysql:host=".DB_HOST.";dbname=".DB_NAME);

//id20608614_form_in_php	id20608614_simo93	localhost
?>