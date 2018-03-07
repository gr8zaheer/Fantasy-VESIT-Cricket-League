<?php
session_start();
include 'connection.php';
echo "<script type='text/javascript' src='js/transfer.js'></script>";
$user_id =  $_SESSION['user_log_uid'];
$cat = $_POST['cat'];
if($cat == 'All')
{
	$getplayer = "SELECT * from players where player_id NOT IN (select player_id from selected where user_id=$user_id) ORDER BY player_price DESC";
}
else
{
	$getplayer = "SELECT * from players where player_position = '$cat' AND player_id NOT IN (select player_id from selected where user_id=$user_id) ORDER BY player_team";
}

$query = mysqli_query($con,$getplayer) or die(mysqli_error($con));
$get_stat = mysqli_query($con,"SELECT * FROM gameday") or die(mysql_error($con));
	while($row = mysqli_fetch_array($get_stat))
	$status = (int)$row['game_status'];
	$_SESSION['gameday_status'] = $status;
?>
<div class='select-info text-center' style="color:white;background-color:black;margin-top:10px;">
	<p style='padding:10px;'><b>1. Search players according to their position<br>2. Click on <span class='fa fa-exchange' ></span>&nbsp;to transfer player<br>3. Click on <span class='fa fa-info-circle'></span> icon to get info of player<br>4. If you are playing on a mobile, You might need to scroll the table horizontally to access info and transfer buttons</b></p>
</div>


<?php
$stat = (int)$_SESSION['gameday_status'];
echo "
<table class='table' style='border:1px solid black;margin-top:10px;background-color:#800060;color:white;' id='trans_table'>
	<thead>
		<tr>
			<th class='text-center'>Name</th>
			<th class='text-center'>Team</th>
			<th class='text-center'>Price<br>(in &#8377;)</th>
			<th class='text-center'>Points</th>
			<th class='text-center'>Position</th>
			<th class='text-center'></th>
		</tr>
	</thead>
	<tbody>
";

while ($row = mysqli_fetch_array($query))
{
	$id = (int)$row['player_id'];
	$fname = (string)$row['player_fname'];
	$lname = (string)$row['player_lname'];
	$price = (int)$row['player_price'];
	$points = (int)$row['player_total_points'];
	$team = (string)$row['player_team'];
	$position = (string)$row['player_position'];

	$name = $fname." ".$lname;

	echo "
	<tr class='transfer_click'>
		<td class='t_name text-center'>$name</td>
		<td class='t_team text-center'>$team</td>
		<td class='t_price text-center'>$price</td>
		<td class='t_points text-center'>$points</td>
		<td class='t_position text-center'>$position</td>
		<td>
			<div class='btn-group btn-group-xs'>
				<button class='btn btn-default' onclick='return info2($id)'><i class='fa fa-info' aria-hidden='true'></i></button>";
				if($stat == 0)
				echo"<button class='btn btn-success' onclick='return transfer($id)'><i class='fa fa-exchange' aria-hidden='true'></i></button>";
			echo "</div>
		</td>";
	echo "</tr>";
}
echo "</tbody></table>";
?>