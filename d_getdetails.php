<?php 
include 'connection.php';
session_start();
$id = $_SESSION['user_log_uid'];
$query = "SELECT * FROM users WHERE user_id = $id";
$run = mysqli_query($con,$query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($run)) {
	$money = $row['user_amount'];
	$players = $row['user_players'];
        $points = $row['user_points'];
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

<div class='col-lg-6 text-center'><h3><i class='fa fa-trophy'></i>&nbsp;Rank:&nbsp;<?php echo "$rank"; ?></h3></div>
<div class='col-lg-6 text-center'><h3><i class='fa fa-bar-chart'></i>&nbsp;Points:&nbsp;<?php echo "$points"; ?></h3></div>
<div class='col-lg-6 text-center'><h3><i class='flaticon-coins'></i>&nbsp;Money:&nbsp;&#8377;<?php echo"$money"; ?></h3></div>
<div class='col-lg-6 text-center'><h3>Players Selected:<?php echo "$players"; ?>/16</h3></div>
