<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$a=0;
$b=0;
$player_id = (int)$_POST['id'];
$user_id = (int)$_SESSION['user_log_uid'];

$get_player_price = "SELECT player_price from players where player_id=$player_id";
$exec3 = mysqli_query($con,$get_player_price) or die(mysqli_error($con));

while ($run2 = mysqli_fetch_array($exec3)) {
	$price = (int)$run2['player_price'];
}

$get_user_detail = "SELECT * FROM users WHERE user_id = $user_id";
$exec = mysqli_query($con,$get_user_detail) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec))
{
	$user_amount = (int)$row['user_amount'];
	$user_players = (int)$row['user_players'];
}
	$delete_player = "DELETE FROM selected WHERE user_id = $user_id AND player_id = $player_id";
	$exec = mysqli_query($con,$delete_player) or die(mysqli_error($con));

	$user_amount2 = $user_amount + $price;
	$user_players2 = $user_players - 1;

	$update_player_info = "UPDATE users SET user_amount=$user_amount2,user_players=$user_players2 WHERE user_id=$user_id";
	$exec2 = mysqli_query($con,$update_player_info);

	if($exec2)
	{
		echo "deleted";
	}
	else
	{
		echo "not successful";
	}
?>