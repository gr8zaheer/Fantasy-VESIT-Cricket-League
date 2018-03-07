<?php
include 'connection.php';

$player_id = (int)$_POST['p_id'];
$player_runs=(int)$_POST['player_runs'];
$player_sixes=(int)$_POST['player_sixes'];
$player_wickets=(int)$_POST['player_wickets'];
$player_points=(int)$_POST['player_points'];

$exec = mysqli_query($con,"UPDATE players SET player_runs = player_runs + $player_runs, 
	player_wickets=player_wickets+$player_wickets, 
	player_sixes=player_sixes+$player_sixes,
	player_points=$player_points 
	WHERE player_id=$player_id") or die(mysqli_error($con));
echo "success";

?>