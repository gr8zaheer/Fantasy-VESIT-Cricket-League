<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['user_log_uid'];
$fetch_player = "SELECT * FROM selected WHERE user_id = $user_id AND inTeam=1 ORDER BY player_position";
$exec = mysqli_query($con,$fetch_player) or die(mysqli_error($con));

$fetch_subs = "SELECT * FROM selected WHERE user_id = $user_id AND inTeam=0 ORDER BY player_position";
$exec2 = mysqli_query($con,$fetch_subs) or die(mysqli_error($con));
$get_stat = mysqli_query($con,"SELECT * FROM gameday") or die(mysql_error($con));
while($row = mysqli_fetch_array($get_stat))
	$status = (int)$row['game_status'];
	$_SESSION['gameday_status'] = $status;
?>
<script type='text/javascript' src='js/team.js'></script>

<table class='table table-responsive table-team' style='margin-bottom:0px;'>
<div class='team_heading' style="background-color:#cccccc;padding:2px;width:100%;">
	<h3>Team</h3>
</div>
	<thead>
		<tr>
			<th class='text-center'>Name</th>
			<th class='text-center'>Position</th>
			<th class='text-center'>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$stat = (int)$_SESSION['gameday_status'];
		while($row=mysqli_fetch_array($exec))
		{
			$id = (int)$row['player_id'];
			$name = (string)$row['player_name'];
			$position = (string)$row['player_position'];
			$isCaptain = (int)$row['isCaptain'];
			$pos = settype($position,'string');
			echo "<tr>";
			if($isCaptain == 0)
				echo "<td>$name</td>";
			else
				echo "<td>$name&nbsp;<b><i class='fa fa-copyright' style='color:red;' aria-hidden='true'></i></b></td>";

			echo
			"
					<td>$position</td>
					<td>
					<div class='btn-group btn-group-xs'>
						<button type='button' class='btn btn-default' onclick='info($id)'><span class='fa fa-info' aria-hidden='true'></i></button>
						<button type='button' class='btn btn-info' onclick='subs($id)'><span class='fa fa-refresh' aria-hidden='true'></span></button>";
					if($isCaptain == 0 && $stat == 0)
						echo "<button type='button' class='btn btn-warning' onclick='cap($id)'><span class='fa fa-copyright' aria-hidden='true'></span></button>";

			echo "</div>
					</td>
				</tr>
			"; 
		}
		?>
</tbody>
</table>
<table class='table table-responsive table-team' style='margin-bottom:0px;'>
<div class='team_heading' style="background-color:#cccccc;padding:2px;width:100%;">
	<h3>Substitutes</h3>
</div>
	<thead>
		<tr>
			<th class='text-center'>Name</th>
			<th class='text-center'>Position</th>
			<th class='text-center'>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row=mysqli_fetch_array($exec2))
		{
			$id = (int)$row['player_id'];
			$name = (string)$row['player_name'];
			$position = (string)$row['player_position'];
			echo "
				<tr>
					<td>$name</td>
					<td>$position</td>
					<td>
					<div class='btn-group btn-group-xs'>
						<button type='button' class='btn btn-default' onclick='info($id)'><span class='fa fa-info' aria-hidden='true'></i></button>
					</div>
					</td>
				</tr>
			"; 
		}
		?>
</tbody>
</table>