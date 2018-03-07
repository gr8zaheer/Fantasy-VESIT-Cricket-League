<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = $_SESSION['user_log_uid'];
$get_stat = mysqli_query($con,"SELECT * FROM gameday");
while($row = mysqli_fetch_array($get_stat))
	$status = (int)$row['game_status'];
	$_SESSION['gameday_status'] = $status;

	$stat = (int)$_SESSION['gameday_status'];
if($stat == 0)//Gameday off
{
	$check = "SELECT squad_selected,team_formed FROM users WHERE user_id = $user_id";
	$exec2 = mysqli_query($con,$check) or die(mysqli_error($con));
	while($row = mysqli_fetch_array($exec2))
	{
		$squad_selected = (int)$row['squad_selected'];
		$team_formed = $row['team_formed'];
	}
	if($squad_selected == 0)
	{
		$sel_batsman = "SELECT * from selected WHERE player_position = 'Batsman' AND user_id = $user_id ORDER BY RAND() LIMIT 6";
		$exec1 = mysqli_query($con,$sel_batsman) or die(mysqli_error($con));
		while($row1 = mysqli_fetch_array($exec1))
		{
			$player_id = (int)$row1['player_id'];

			$insert_batsman = "UPDATE selected SET inTeam=1 WHERE user_id=$user_id AND player_id=$player_id";
			$exec2 = mysqli_query($con,$insert_batsman) or die(mysqli_error($con));
		}

		$sel_bowler = "SELECT * from selected WHERE player_position = 'Bowler' AND user_id = $user_id ORDER BY RAND() LIMIT 4";
		$exec3 = mysqli_query($con,$sel_bowler) or die(mysqli_error($con));
		while($row2 = mysqli_fetch_array($exec3))
		{
			$player_id = (int)$row2['player_id'];
		
			$insert_bowler = "UPDATE selected SET inTeam=1 WHERE user_id=$user_id AND player_id=$player_id";
			$exec4 = mysqli_query($con,$insert_bowler) or die(mysqli_error($con));
		}

		$sel_keeper = "SELECT * from selected WHERE player_position ='Captain' AND user_id = $user_id ORDER BY RAND() LIMIT 1";
		$exec5 = mysqli_query($con,$sel_keeper) or die(mysqli_error($con));
		while($row3 = mysqli_fetch_array($exec5))
		{
			$player_id = (int)$row3['player_id'];

			$insert_keeper ="UPDATE selected SET inTeam=1 WHERE user_id=$user_id AND player_id=$player_id";
			$exec6 = mysqli_query($con,$insert_keeper) or die(mysqli_error($con));
		}

		$sel_all = "SELECT * from selected WHERE player_position = 'AllRounder' AND user_id = $user_id ORDER BY RAND() LIMIT 2";
		$exec7 = mysqli_query($con,$sel_all) or die(mysqli_error($con));
		while($row4 = mysqli_fetch_array($exec7))
		{
			$player_id = (int)$row4['player_id'];

			$insert_all ="UPDATE selected SET inTeam=1 WHERE user_id=$user_id AND player_id=$player_id";
			$exec8 = mysqli_query($con,$insert_all) or die(mysqli_error($con));
		}

		$sel_cap = "SELECT * from selected WHERE user_id = $user_id AND inTeam=1 ORDER BY RAND() LIMIT 1";
		$exec9 = mysqli_query($con,$sel_cap) or die(mysqli_error($con));
		while($row5 = mysqli_fetch_array($exec9))
		{
			$player_id = (int)$row5['player_id'];

			$assign_cap ="UPDATE selected SET isCaptain=1 WHERE user_id=$user_id AND player_id=$player_id";
			$exec10 = mysqli_query($con,$assign_cap) or die(mysqli_error($con));
		}

		$update_status = "UPDATE users SET squad_selected = 1 WHERE user_id = $user_id";
		$exec = mysqli_query($con,$update_status) or die(mysqli_error($con));
		echo "Success";
	}
	else
	{
		echo "Failure";
	}
}
else
{
	echo "<h3 class='text-center'>Sorry,You can't Make the team.<br>Gameday already Started.<br><i class='fa fa-frown-o' aria-hidden='true' style='color:red;'></i></h3>";
}
?>