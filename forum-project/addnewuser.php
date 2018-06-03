<?php
/*
include('dbconn.php');

$newuser = $_POST['usernameinput'];
$newpwd = $_POST['passwordinput'];

$insert = mysqli_query($con , "INSERT INTO user (`username`,`password`) VALUES ('".$newuser."','".$newpwd."');");

if($insert) {
	//echo "hi";
	header("Location: /forum-project/index.php?status=reg_success");
}
else
	echo "no";

?>*/
	include ('dbconn.php');
	
	$newuser = $_POST['usernameinput'];
	$newpwd = $_POST['passwordinput'];
	
	$insert = mysqli_query($con, "INSERT INTO users (`username`, `password`) VALUES ('".$newuser."', '".$newpwd."');");
	
	if ($insert) {
		header("Location: /forum-project/index.php?status=reg_success");
	}
?>