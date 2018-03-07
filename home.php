<?php
	include 'connection.php';
	session_start();
	if(!isset($_SESSION['user_log_uid']))
	{
		header('Location: index.php');
		exit;
	}

	$user_id = $_SESSION['user_log_uid'];
	$isSquad = "SELECT squad_selected FROM users WHERE user_id = $user_id";
	$exec = mysqli_query($con,$isSquad) or die(mysqli_error($con));
	while($row = mysqli_fetch_array($exec))
	{
		$isSelect = $row['squad_selected'];
		$_SESSION['isselect'] = $isSelect;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="FA/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="Styles/MyStyle.css">
  	<link rel='stylesheet' type='text/css' href='Styles/table.css'>
  	<link rel="stylesheet" type="text/css" href="font/flaticon.css"> 
  	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script> 
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/save_details.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.11.0/dist/sweetalert2.all.js"></script> 
	<script type="text/javascript" src="js/loader.js"></script>
	<title>FVCL HOME</title>
</head>
<body>
<div class='container-fluid'>
	<div class='row home-wrapper'>
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
			<div style="width:80%;margin-left:auto;margin-right:auto;">
			<div class="logo">
				<a href='home.php'><img src="Styles/logo.png" class="img-responsive" width="100" height="100" style="margin-left:auto;margin-right:auto;"></a>
			</div>
			</div>
		</div>
		<div id='home_head' class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
			<h1>FANTASY VESIT CRICKET LEAGUE</h1>
			<p style="font-family:arial;font-size:10px;"><b>brought to you by IEEE-VESIT</b></p>
		</div>
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center'>
			<p class='details' style='margin-top:20px;'><b>For technical support, call us at:</b><br>
			<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;Abhishek Kuvar: +91-8779156986<br>
                        <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;Umesh Ramchandani: +91-9167246014<br>
			<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;Sarthak Dadhakar: +91-9029869094
			</p>
		</div>
	</div>
	<nav class='navbar navbar-inverse navbar-option'>
		<div class='container'>
		<div class="navbar-header">
		     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#upnav" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
    	</div>
    	<div class='collapse navbar-collapse' id='upnav'>
		<ul class='nav navbar-nav' id='options'>
			<li><a href='Endpage'>Home</a></li>
			<li><a href='leaderboard'>FVCL Leaderboard</a></li>
			<li><a href='stats'>Statistics</a></li>
			<li><a href='abouthegame'>About the game</a></li>
			<li><a href='rulesheet'>Rulesheet</a></li>
		</ul>
		<ul class='nav navbar-nav navbar-right' id='options'>
			 <p class='navbar-text' style='color:white;margin-left:8px;'><b><i class='fa fa-user' aria-hidden='true'></i>&nbsp;<?php echo $_SESSION['username'];?></b></p>
			<?php
			$dec = (int)$_SESSION['isselect'];
			if($dec == 0)
				echo "<li><a href='myteam'>Select Squad</a></li>";
			else if($dec == 1)
				echo "<li><a href='d_getteam'>My Team</a></li>";
			?>
			<li><button class='btn btn-danger navbar-btn' style='margin-left:8px;' onclick='f_logout()'>Logout</button></li>
		</ul>

		</div>
		</div>
	</nav>
	<div class='loader' style='height:auto;'>	
	</div>

	<div class="nav navbar-inverse foot" style="margin-left:-20px;margin-right:-20px;">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Connect with us:</h4>
            <p><b>Contact our MPOs:</b></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Shazmeen Shaikh:+91-7506292623</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Dhaval Potdar:+91-9167020741</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Address:</h4>
            <p>Vivekanand Education Society's Institute of Technology, Collector's Colony, Chembur, Mumbai-74</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Follow Us:</h4>
            <a href="https://www.facebook.com/groups/202373699777405/?ref=bookmarks" class="sm_button" id="fb_button"><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCOOep7LpQg3g5GnKtDO_EGA" class="sm_button" id="youtube_button"><i class="fa fa-youtube-play fa-2x"></i></a>
            <a href="https://www.instagram.com/ieee_vesit/" class="sm_button" id="instagram_button"><i class="fa fa-instagram fa-2x"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="https://www.ieeevesit.org/2017/">About IEEE</a></li>
                <li><a href="membership.html" target="_blank">Membership Details</a></li>
            </ol>
          </div>
        </div>
        <div class="row" style="margin-top:20px;">
          <div class="col-lg-12"><p style="color:#b3b3b3;">&copy;2017 IEEE-VESIT ALL RIGHTS RESERVED</p></div>
        </div>
      </div>
    </div>
</div>
</body>
</html>