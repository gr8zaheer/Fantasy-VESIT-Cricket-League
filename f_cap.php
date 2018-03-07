<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = (int)$_SESSION['user_log_uid'];
$player_id = (int)$_POST['id'];

$exec = mysqli_query($con,"UPDATE selected SET isCaptain=0 WHERE user_id=$user_id AND isCaptain=1");
$exec2 = mysqli_query($con,"UPDATE selected SET isCaptain=1 WHERE user_id=$user_id AND player_id=$player_id");

if($exec && $exec2)
{
	echo "success";
}
else
{
	echo "failure";
}
?>