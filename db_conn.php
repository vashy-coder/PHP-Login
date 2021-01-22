<?php

$sname= "localhost";
$uname= "root";
$password = "";

//$sname= "localhost";
//$uname= "postgres";
//$password = "Bvashy2104";

$db_name = "test_db";
// @todo use singleton
$conn =mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


?>
