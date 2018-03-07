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
$_SESSION['transfer']=$player_id;
$exec = mysqli_query($con,"SELECT player_position from players where player_id=$player_id");
while($row =  mysqli_fetch_array($exec))
{
	$player_position = $row['player_position']; 
}
$get_info = "SELECT * FROM selected where user_id=$user_id AND player_position='$player_position'";
$exec = mysqli_query($con,$get_info) or die(mysqli_error($con));
echo "

	<table class='table text-center' id='transfer_table'>
		<thead>
			<tr>
				<td class='text-center' colspan='3'><h3>Transfer With:</h3></td>
			<tr>
			<tr>
				<th class='text-center'>Name</th>
				<th class='text-center'>Position</th>
				<th class='text-center'>Transfer</th>
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
		<td><button class='btn btn-success btn-xs' onclick='return transfer_swap($swap_id)'><i class='fa fa-exchange' aria-hidden='true'></i></button></td>
	</tr>
	";	
}
echo "</tbody></table>";
?>