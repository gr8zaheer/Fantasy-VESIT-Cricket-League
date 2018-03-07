<?php
session_start();
echo "<script type='text/javascript' src='js/players.js'></script>";
include 'connection.php';
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
?>
<div class='select-info text-center' style="color:white;background-color:black;margin-top:10px;">
	<p style='padding:10px;'><b>1. Search players according to their position<br>2. Click on <span class='fa fa-plus-square' style="color:#00cc00;"></span>&nbsp;to select player<br>3. Click on <span class='fa fa-info-circle'></span> icon to get info of player<br>4. If you are playing on mobile, you might need to scroll the table horizontally to access the info and transfer buttons</b></p>
</div>


<?php
echo "
<table class='table table-responsive table-hover' id='player_table' style='border:1px solid black;margin-top:10px;background-color:#800060;color:white;'>
	<thead>
		<tr>
			<th class='text-center'>ID</th>
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
	<tr class='click'>
		<td class='p_id text-center'>$id</td>
		<td class='p_name text-center'>$name</td>
		<td class='p_team text-center'>$team</td>
		<td class='p_price text-center'>$price</td>
		<td class='p_points text-center'>$points</td>
		<td class='p_position text-center'>$position</td>
		<td>
		<span class='fa fa-info-circle p_info'></span>&nbsp;&nbsp;<span class='fa fa-plus-square click_select'></span>
		</td>";
	echo "</tr>";
}
echo "</tbody></table>";
?>