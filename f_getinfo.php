<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
include 'connection.php';
$user_id = $_SESSION['user_log_uid'];
$player_id = $_POST['id'];
$get_info = "SELECT * FROM players where player_id=$player_id";
$exec = mysqli_query($con,$get_info) or die(mysqli_error($con));
while($row=mysqli_fetch_array($exec))
{
	$fname = (string)$row['player_fname'];
	$lname = (string)$row['player_lname'];
	$name = $fname.' '.$lname;
	$position = (string)$row['player_position'];
	$price = (int)$row['player_price'];
	$points = (int)$row['player_total_points'];
        $team = (string)$row['player_team'];
	$runs = (int)$row['player_runs'];
	$wickets = (int)$row['player_wickets'];
	$sixes = (int)$row['player_sixes'];
        $imageURL = (string)$row['player_image'];
        
        $imageSrc = "https://www.ieeevesit.org/fvcl18/public/players_images/".$imageURL;
	echo "
        <img src='$imageSrc' class='img-circle' style='width:150px;height:150px;'>
        <h3 class='text-center'>$name</h3>
        <h4 class='text-center'>$position</h4>
	<table class='table table-bordered'>
		<tbody>
                        <tr>
				<td><b>Team:</b></td>
				<td><b>$team</b></td>
			</tr>
			<tr>
				<td><b>Price:</b></td>
				<td><b>&#8377;$price</b></td>
			</tr>
			<tr>
				<td><b>Points:</b></td>
				<td><b>$points</b></td>
			</tr>
			<tr>
				<td><b>Runs:</b></td>
				<td><b>$runs</b></td>
			</tr>
			<tr>
				<td><b>Wickets:</b></td>
				<td><b>$wickets</b></td>
			</tr>
			<tr>
				<td><b>Sixes:</b></td>
				<td><b>$sixes</b></td>
			</tr>

		</tbody>
	</table>
	";
}
?>