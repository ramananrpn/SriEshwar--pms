<?php

$server = 'localhost';
$uname = 'root';
$pass = '';
$db = 'srieshwar_pms';

$conn = mysqli_connect($server,$uname,$pass,$db);
if(mysqli_connect_errno())
{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>			