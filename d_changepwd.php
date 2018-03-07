<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="FA/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="Styles/Mystyle.css">
  	<link rel="stylesheet" type="text/css" href="font/flaticon.css"> 
  	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/save_details.js"></script>
	<title>RESET PASSWORD</title>
</head>
<body>
<h1 style="text-align:center;">RESET PASSWORD</h1>
<h2 style="color:red;text-align:center;">Warning: Don't Refresh/Reload this page</h2>
	<div class="container-fluid">
		<div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4'>
			<div id="reset_details" style="margin-top:20px;">
				<form>
				  <div class="form-group">
				    <label for="email">Enter your login Email ID:</label>
				    <input type="email" class="form-control" id="verify_email" placeholder="Email ID">
				  </div>
				  <div class="form-group">
				    <label for="mobile">Enter your registered Mobile Number:</label>
				    <input type="text" class="form-control" id="verify_mobile" placeholder="Mobile Number">
				  </div>
				  <div class="form-group">
				    <button class='btn btn-primary verify' onclick='return verify()'>Submit</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>