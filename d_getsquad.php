<?php
include 'connection.php';
session_start();
$id = $_SESSION['user_log_uid'];
$max_squad = 16;

	$universal = "SELECT * FROM selected where user_id=$id ORDER BY player_position";
	$rununi = mysqli_query($con,$universal) or die(mysqli_error($con));

	$get_stat = mysqli_query($con,"SELECT * FROM gameday") or die(mysql_error($con));
	while($row = mysqli_fetch_array($get_stat))
	$status = (int)$row['game_status'];
	$_SESSION['gameday_status'] = $status;
	$stat = (int)$_SESSION['gameday_status'];
	echo "<script type='text/javascript' src='js/squad.js'></script>";
	echo "<div class='col-lg-12' style='background-color:#d9d9d9;padding:10px;margin-bottom:20px;'><h4>Instructions:</h4>";
		echo "
		<ol>
			<li>Select 16 players from the list of players</li>
			<li>You have to select <b>9</b> batsmen,<b>6</b> bowlers and <b>1</b> Real captain </li>
			<li>After selecting players 'Make team' button will appear</li>
		</ol></div>
		";
	if(mysqli_num_rows($rununi) == 0)
	{
		echo "<h4 style='text-align:center;font-weight:bold;'>*You have not selected any player yet</h4>";
	}
	else
	{
		echo 
		"
			<div id='table-wrapper'>
			<h3 style='text-align:center;color:white;'>Your Squad</h3>
			<table class='table table-responsive text-center' id='table-squad'>
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Name</th> 
						<th class='text-center'>Position</th>
						<th class='text-center'>Price(in &#8377;)</th>
						<th class='text-center'></th>
					</tr>
				</thead>
				<tbody>
		";

		while($row = mysqli_fetch_array($rununi))
		{
			$id = (int)$row['player_id'];
			$name = (string)$row['player_name'];
			$position = $row['player_position'];
			$price = $row['player_price'];
			echo 
			"
				<tr>
					<td class='s_id'>$id</td>
					<td class='s_name'>$name</td>
					<td class='s_position'>$position</td>
					<td class='s_pricec'>$price</td>
					<td class='text-center'><i class='fa fa-minus-square remove-player' aria-hidden='true' style='cursor:pointer;'></i>&nbsp;&nbsp;&nbsp;<span class='fa fa-info-circle s_info' style='cursor:pointer;'></span></td>
				</tr>
			";

		}
		echo 
		"</tbody></table></div>";
		if(mysqli_num_rows($rununi) == $max_squad)
		{
			echo "<p style='text-align:center;margin-bottom:10px;'><button class='btn btn-success make_team'>Make Team</button></p>";
		}
	}

	/*$batsman = "SELECT * FROM selected where user_id = $id AND player_position ='Batsman'";
	$runbat = mysqli_query($con,$batsman) or die(mysqli_error($con));
	$bat_num = mysqli_num_rows($runbat);

	$bowler = "SELECT * FROM selected where user_id = $id AND player_position ='Bowler'";
	$runbowl = mysqli_query($con,$bowler) or die(mysqli_error($con));
	$bowl_num = mysqli_num_rows($runbowl);

	$wicketkeeper = "SELECT * FROM selected where user_id = $id AND player_position ='Wicketkeeper'";
	$runwicket = mysqli_query($con,$wicketkeeper) or die(mysqli_error($con));
	$wicket_num = mysqli_num_rows($runwicket);

	$all = "SELECT * FROM selected where user_id = $id AND player_position ='All-rounder'";
	$runall = mysqli_query($con,$all) or die(mysqli_error($con));
	$all_num = mysqli_num_rows($runall);*/
?>