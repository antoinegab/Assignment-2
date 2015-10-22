<?php
session_start();
require('connect.php');
if(isset($_POST['Username']) && $_POST['Username'] !=null){
	$Username= $mysqli->real_escape_string($_POST['Username']);
} 
else {
	die("Please fill out the username");
}
if(isset($_POST['Loginname']) && $_POST['Loginname'] !=null){
	$Loginname=$mysqli->real_escape_string($_POST['Loginname']);
	
} 
else {
	die("Please fill out the loginname");
}
if(isset($_POST['Email']) && $_POST['Email'] !=null){
	$Email=$mysqli->real_escape_string($_POST['Email']);
	
} 
else {
	die("Please fill out the email");
}
if(isset($_POST['Guestbook']) && $_POST['Guestbook'] !=null){
	$Guestbook=$mysqli->real_escape_string($_POST['Guestbook']);
	
} 
else {
	die("Please fill out the comment");
}



$exist = $mysqli->prepare("SELECT * FROM User WHERE Email = ?");
$exist->bind_param('s', $Email);
$exist->execute();
$exist->store_result();
$num = $exist->num_rows;
$exist->bind_result($UserID, $Username, $Loginname, $Email, $Guestbook);
$exist->fetch();

if($num == 0 )

{


$stmt =$mysqli->prepare("INSERT INTO User(Username, Loginname, Email, Guestbook) Values (?,?,?,?)");
	$stmt->bind_param('ssss',$Username, $Loginname, $Email, $Guestbook);
	$stmt->execute();	
	$stmt->close();
	$mysqli->close();

die("Succesfully added");
}else
{
die("User already exists: ".$Username.", Message: ".$Guestbook." :D");

}



$stmt->execute();
$stmt->close();
header("Location:index3.html");

?>
