<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = $_SESSION['user_log_uid'];
$player_id = (int)$_POST['id'];
$_SESSION['swap']=$player_id;
$exec = mysqli_query($con,"SELECT player_position from players where player_id=$player_id");
while($row =  mysqli_fetch_array($exec))
{
	$player_position = $row['player_position']; 
}
$get_info = "SELECT * FROM selected where user_id=$user_id AND player_position='$player_position' AND inTeam=0";
$exec = mysqli_query($con,$get_info) or die(mysqli_error($con));
echo "

	<table class='table text-center'>
		<thead>
			<tr>
				<td class='text-center' colspan='3'><h3>Substitute With:</h3></td>
			<tr>
			<tr>
				<th class='text-center'>Name</th>
				<th class='text-center'>Position</th>
				<th class='text-center'>Substitute</th>
			</tr>
		</thead>
		<tbody>
";
while($row=mysqli_fetch_array($exec))
{
	$swap_id = (int)$row['player_id'];
	$name = (string)$row['player_name'];
	$position = (string)$row['player_position'];
	echo "
	<tr>
		<td>$name</td>
		<td>$position</td>
		<td><button class='btn btn-info btn-xs' onclick='swap($swap_id)'><i class='fa fa-refresh' aria-hidden='true'></i></button></td>
	</tr>
	";	
}
echo "</tbody></table>";
?>