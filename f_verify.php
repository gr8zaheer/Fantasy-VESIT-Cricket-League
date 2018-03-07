<?php
session_start();
include 'connection.php';
$user_mail = (string)$_POST['mail'];
$user_phone  = (string)$_POST['mobile'];
$exec = mysqli_query($con,"SELECT * FROM users WHERE user_mail='$user_mail' AND user_phone='$user_phone' ") or die(mysqli_error($con));
if(mysqli_num_rows($exec) > 0)
{
	while($row = mysqli_fetch_array($exec))
		$user_id = (int)$row['user_id'];
		$_SESSION['temp_id'] = $user_id;
	echo "Success";
}
else
{
	echo "Either or both Email ID & Mobile Number entered don't exist";
}
?>