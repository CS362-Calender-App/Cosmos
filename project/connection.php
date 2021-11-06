<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname= "cosmosdb";



if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname))
{

	die("Failed to Connect!");
}
else
{
	echo "success from connection.php!";
}

