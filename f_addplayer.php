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

$exec5 = mysqli_query($con,"SELECT * FROM players where player_id=$player_id") or die(mysqli_error($con));
while($rowname = mysqli_fetch_array($exec5))
{
	$player_fname = (string)$rowname['player_fname'];
	$player_lname = (string)$rowname['player_lname'];
	$player_price = (int)$rowname['player_price'];
	$player_position =(string)$rowname['player_position'];
}
	$player_name = $player_fname." ".$player_lname;

if($player_position == 'Batsman')
	$limit = 9;
else if($player_position == 'Bowler')
	$limit = 6;
else if($player_position == 'Captain')
	$limit = 1;

$get_user_details = "SELECT * FROM users WHERE user_id = $user_id";
$exec = mysqli_query($con,$get_user_details) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec))
{
	$user_amount = $row['user_amount'];
	$user_players = $row['user_players'];
}

if($player_price > $user_amount)
{
	echo "not enough balance";
}

else
{
	$check_if_there = "SELECT * FROM selected WHERE user_id = $user_id AND player_id = $player_id";
	$exec4 = mysqli_query($con,$check_if_there) or die(mysqli_error($con));
	if(mysqli_num_rows($exec4)==0)
	{
		$get_count = "SELECT COUNT(*) as total FROM selected WHERE player_position='$player_position' AND user_id=$user_id";
		$exec9 = mysqli_query($con,$get_count);
		$data = mysqli_fetch_assoc($exec9);
		$total = $data['total'];
		if($total < $limit)
		{
			$add_player = "INSERT INTO selected(user_id,player_id,player_name,player_position,player_price) values($user_id,$player_id,'$player_name','$player_position',$player_price)";

			$exec2 = mysqli_query($con,$add_player) or die(mysqli_error($con));
			$user_amount = $user_amount - $player_price;
			$user_players++;

			$update_info = "UPDATE users SET user_amount=$user_amount,user_players=$user_players WHERE user_id=$user_id";
			$exec3 = mysqli_query($con,$update_info) or die(mysqli_error($con));
			echo "success";
		}
		else
		{
			echo "Number Exceeded";
		}
	}
	else
	{
		echo "Player already exists";
	}
	exit;
}
?>