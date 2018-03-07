<?php
session_start();
include 'connection.php';
$exec = mysqli_query($con,"SELECT * FROM gameday") or die(mysqli_query($con));
while($row = mysqli_fetch_array($exec))
{
	$status = (int)$row['game_status'];
}
if($status == 0)
{
	$exec2 = mysqli_query($con,"UPDATE gameday SET game_status = 1") or die(mysqli_query($con));
	$update_subs = mysqli_query($con,"UPDATE users SET user_subs=3,user_transfers=0") or die(mysqli_query($con));
}
else
{
	$exec2 = mysqli_query($con,"UPDATE gameday SET game_status = 0") or die(mysqli_query($con));
	$update_subs = mysqli_query($con,"UPDATE users SET user_subs=11,user_transfers=6") or die(mysqli_query($con));
}

if($exec2)
{
	echo "success";
}
else
	echo "failure";

?>