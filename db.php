<?php

$hostname = "localhost";
$username = "root";
$passwd = "root";
$dbname = "mkemal1";

try{
	$db_conn = new mysqli($hostname, $username, $passwd, $dbname);
	
	echo "connection ok! ";
}
catch (Excepton $e){
	echo $e.getMessage();
}
?>
