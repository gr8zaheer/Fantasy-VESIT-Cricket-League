<?php 
	include 'connection.php';
	session_start();
	$id = $_SESSION['user_log_uid'];

	$batsman = "SELECT * FROM selected where user_id = $id AND player_position ='Batsman'";
	$runbat = mysqli_query($con,$batsman) or die(mysqli_error($con));
	$bat_num = mysqli_num_rows($runbat);

	$bowler = "SELECT * FROM selected where user_id = $id AND player_position ='Bowler'";
	$runbowl = mysqli_query($con,$bowler) or die(mysqli_error($con));
	$bowl_num = mysqli_num_rows($runbowl);

	//$wicketkeeper = "SELECT * FROM selected where user_id = $id AND player_position ='Wicketkeeper/Batsman'";
	//$runwicket = mysqli_query($con,$wicketkeeper) or die(mysqli_error($con));
	//$wicket_bat_num = mysqli_num_rows($runwicket);

        //$wicketkeeper2 = "SELECT * FROM selected where user_id = $id AND player_position ='Wicketkeeper/Bowler'";
	//$runwicket2 = mysqli_query($con,$wicketkeeper2) or die(mysqli_error($con));
	//$wicket_bat_num = mysqli_num_rows($runwicket2);

	$captain = "SELECT * FROM selected where user_id = $id AND player_position ='Captain'";
	$runcap = mysqli_query($con,$captain) or die(mysqli_error($con));
	$cap_num = mysqli_num_rows($runcap);
       
?>

<div class='col-lg-12 text-center'><p><i class="fa fa-copyright fa-2x" aria-hidden="true" style='margin-top:3px;'></i>&nbsp;<span style="margin-top:-3px;">Captain:&nbsp;<b><?php echo "$cap_num"; ?>/1</b></span></p></div>
<div class='col-lg-6'><p><i class='flaticon-cricket-2'></i>&nbsp;Batsman:&nbsp;<b><?php echo "$bat_num"; ?>/9</b></p></div>
<div class='col-lg-6'><p><i class='flaticon-cricket'></i>&nbsp;Bowler:&nbsp;<b><?php echo "$bowl_num"; ?>/6</b></p></div>