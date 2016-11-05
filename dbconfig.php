<?php

session_start();

/*
 * 
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "dblogin"; */

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$DB_host = $url["host"];
$DB_user = $url["user"];
$DB_pass = $url["pass"];
$DB_name = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}


include_once 'class.user.php';
$user = new USER($DB_con);
?>
