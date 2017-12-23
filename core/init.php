<?php
// MySQL connection variables
define('ROOT_URL','http://localhost/cytrivia/');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','12345');
define('DB_NAME','cytrivia');

// define('ROOT_URL','http://cytrivia.ml/');
// define('DB_HOST','sql113.epizy.com');
// define('DB_USER','epiz_21213311');
// define('DB_PASSWORD','CyTrivia123');
// define('DB_NAME','epiz_21213311_cytrivia');
// Connect to MySQL using MySQLi
$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die($mysqli->error);
session_start();

require_once 'functions/sanitize.php';
?>