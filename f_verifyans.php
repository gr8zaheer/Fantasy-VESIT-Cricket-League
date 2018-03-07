<?php
session_start();
include 'connection.php';
$user_id = (int)$_SESSION['temp_id'];
$user_ans = (string)$_POST['answer'];
$exec = mysqli_query($con,"SELECT * FROM users WHERE user_ans='$user_ans' AND user_id=$user_id ") or die(mysqli_error($con));
if(mysqli_num_rows($exec) > 0)
{
	echo "Success";
}
else
{
	echo "Wrong Answer";
}
?>