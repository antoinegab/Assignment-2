<?php
$host = "mysql10.000webhost.com";
$db_name = "a4989387_ass1";
$user = "******";
$password = "******";
$mysqli =new mysqli($host, $user, $password, $db_name);
if(mysqli_connect_errno())
{

	printf("Connection failed");
	exit();
}
?>
