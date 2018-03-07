<?php
session_start();
include 'connection.php';
$user_id = (int)$_SESSION['temp_id'];
$user_pwd = md5($_POST['pwd']);
$exec = mysqli_query($con,"UPDATE users SET user_pwd='$user_pwd' WHERE user_id=$user_id") or die(mysqli_error($con));
if($exec > 0)
{
	echo "Success";
}
else
{
	echo "There was some error.Please Try again";
}
?>