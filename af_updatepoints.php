<?php
session_start();
include 'connection.php';
$q2 = mysqli_query($con,"SELECT game_status FROM gameday") or die(mysqli_error($con));
while($x = mysqli_fetch_array($q2))
	$game_status = (int)$x['game_status'];
if($game_status == 1)
{
$q1 = "SELECT * FROM users WHERE squad_selected=1";//select all players who have their team formed
$exec_q1 = mysqli_query($con,$q1) or die(mysqli_error($con));
while($row = mysqli_fetch_array($exec_q1))
{
	$user_id = (int)$row['user_id'];
	$exec_q2 = mysqli_query($con,"SELECT * FROM selected WHERE user_id=$user_id AND inTeam=1") or die(mysqli_error($con));
	$update = (int)$row['user_points'];
	while($row2 = mysqli_fetch_array($exec_q2))
	{
		$player_id = (int)$row2['player_id'];
		$isCaptain = (int)$row2['isCaptain'];

		$exec_q3 = mysqli_query($con,"SELECT player_points FROM players WHERE player_id=$player_id") or die(mysqli_error($con));
		while($row3 = mysqli_fetch_array($exec_q3))
		{
			$player_points = (int)$row3['player_points'];
		}
		if($isCaptain == 1)
			$update = $update + 2*($player_points);
		else
			$update = $update + $player_points;
	}

	$exec_q4 = mysqli_query($con,"UPDATE users SET user_points=$update WHERE user_id=$user_id") or die(mysqli_error($con));
}
$exec_q5 = mysqli_query($con,"UPDATE players SET player_total_points = player_total_points + player_points") or die(mysqli_error($con));
$exec_q5 = mysqli_query($con,"UPDATE players SET player_points = 0") or die(mysqli_error($con));
echo "success";
}
else
{
	echo "failed";
}
?>