<?php
include 'connection.php';
session_start();
$id = $_SESSION['user_log_uid'];
$query = "SELECT * FROM users WHERE user_id = $id";
$run = mysqli_query($con,$query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($run)) {
	$money = $row['user_amount'];
	$players = $row['user_players'];
	$point = $row['user_points'];
	$subs = $row['user_subs'];
	$transfers = $row['user_transfers'];
}

$get_stat = mysqli_query($con,"SELECT * FROM gameday") or die(mysql_error($con));
while($row = mysqli_fetch_array($get_stat))
	$status = (int)$row['game_status'];
	$_SESSION['gameday_status'] = $status;
	$status = (int)$_SESSION['gameday_status'];
	if($status == 1)
	{
		$subs_lim = 3;
		$transfer_lim = 0;
	}
	else
	{
		$subs_lim = 11;
		$transfer_lim = 6;
	}

$get_rank = mysqli_query($con,"SELECT * FROM users ORDER BY user_points DESC") or die(mysqli_error($con));
$rank = 1;
while($row2 = mysqli_fetch_array($get_rank))
{
	$check_id = (int)$row2['user_id'];
	if($check_id == $id)
	{
		break;
	}
	else
	{
		$rank++;
	}
}

?>
<div class='col-lg-12 col-md-12 box' style="padding:5px 0px 5px 0px;">
	<div class='col-lg-12 col-md-12'><h4><i class='fa fa-trophy' aria-hidden='true'></i>&nbsp;Rank:<?php echo "$rank";?></h4></div>
	<div class='col-lg-6 col-md-6'><h4><i class='flaticon-coins'></i>&nbsp;Money:&nbsp;&#8377;<?php echo "$money"; ?></h4></div>
	<div class='col-lg-6 col-md-6'><h4><i class='fa fa-bar-chart' aria-hidden='true'></i>&nbsp;Points:<?php echo "$point"; ?></h4></div>
</div>
<div class='col-lg-12 col-md-12 box' style="padding:5px 0px 5px 0px;">
	<div class='col-lg-6 col-md-6'><h4><i class='fa fa-refresh' aria-hidden='true'></i>&nbsp;Substitutions:<?php echo "&nbsp;$subs/$subs_lim"; ?></h4></div>
	<div class='col-lg-6 col-md-6'><h4><i class='fa fa-exchange' aria-hidden='true'></i>&nbsp;Transfers:&nbsp;<?php echo"$transfers"; ?></h4></div>
</div>