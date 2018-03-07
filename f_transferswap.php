<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = (int)$_SESSION['user_log_uid'];
$player_id = (int)$_SESSION['transfer'];//in;
$swap_id = (int)$_POST['swap_id'];//out;

$user_info = "SELECT * FROM users where user_id=$user_id";
$exec = mysqli_query($con,$user_info) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec))
{
	$user_amount = (int)$row['user_amount'];
	$user_transfers = (int)$row['user_transfers'];
}

$in_player_info = "SELECT * FROM players where player_id=$player_id";
$exec2 = mysqli_query($con,$in_player_info) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec2))
{
	$in_price = (int)$row['player_price'];
	$in_position = (string)$row['player_position'];
	$in_fname = (string)$row['player_fname'];
	$in_lname = (string)$row['player_lname'];
	$in_name = $in_fname.' '.$in_lname;
}

$out_player_info = "SELECT * FROM players where player_id=$swap_id";
$exec3 = mysqli_query($con,$out_player_info) or die(mysqli_error($con));
while($row2 = mysqli_fetch_array($exec3))
{
	$out_price = (int)$row2['player_price'];
}
	$can_do = $user_amount + $out_price - $in_price;

	if($user_transfers > 0)
	{
		if($can_do > 0|| $can_do == 0)
		{
			$user_transfers = $user_transfers - 1;
			$out_team_status = "SELECT inTeam,isCaptain FROM selected WHERE user_id=$user_id AND player_id=$swap_id";
			$exec4 = mysqli_query($con,$out_team_status) or die(mysqli_error($con));
			while($row3 = mysqli_fetch_array($exec4))
			{
				$out_inTeam = (int)$row3['inTeam'];
				$out_isCaptain = (int)$row3['isCaptain'];
			}

			$swap_player = "INSERT INTO selected(user_id,player_id,player_name,player_position,player_price,inTeam,isCaptain) VALUES($user_id,$player_id,'$in_name','$in_position',$in_price,$out_inTeam,$out_isCaptain)";
			$exec5 = mysqli_query($con,$swap_player) or die(mysqli_error($con));

			$exec6 = mysqli_query($con,"DELETE FROM selected where user_id=$user_id AND player_id=$swap_id") or die(mysqli_error($con));

			$exec7 = mysqli_query($con,"UPDATE users SET user_amount=$can_do,user_transfers=$user_transfers WHERE user_id=$user_id") or die(mysqli_error($con));

			echo "success";
		}
		else
		{
			echo "not enough balance";
		}
	}
	else
	{
		echo "Transfer limit Exceeded";
	}	

?>