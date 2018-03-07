<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = (int)$_SESSION['user_log_uid'];
$player_id = (int)$_SESSION['swap'];//out
$swap_id = (int)$_POST['swap_id'];//in
$exec5 = mysqli_query($con,"SELECT isCaptain from selected WHERE user_id=$user_id AND player_id=$player_id");
while($row5 = mysqli_fetch_array($exec5))
{
	$isCaptain = (int)$row5['isCaptain'];
}
$get_user_info = "SELECT * FROM users where user_id=$user_id";
$exec  = mysqli_query($con,$get_user_info) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec))
{
	$user_subs = (int)$row['user_subs'];
}

if($user_subs > 0)
{
	$exec2 = mysqli_query($con,"UPDATE selected SET inTeam=0,isCaptain=0 WHERE user_id=$user_id AND player_id=$player_id");
	$exec3 = mysqli_query($con,"UPDATE selected SET inTeam=1,isCaptain=$isCaptain WHERE user_id=$user_id AND player_id=$swap_id");
	if($exec2 && $exec3)
	{
		$user_subs = $user_subs - 1;
		$exec4 = mysqli_query($con,"UPDATE users SET user_subs=$user_subs WHERE user_id=$user_id");
		if($exec4)
			echo "success";
		else
			echo "failure";
	}
}
else
{
	echo "Substitute limit exceeded";
}
?>