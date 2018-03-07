<?php
session_start();
include('connection.php');
if(isset($_SESSION['user_log_uid']))
  {
    header('Location: home.php');
    exit;
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
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/save_details.js"></script>

	<title>Welcome | FVCL</title>
</head>
<body id="welcome_body">
<div class="row" id="log_sign">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
			<button class="btn btn-primary" id="Log_button" data-toggle="modal" data-target="#loginModal">Login</button>
			<button class="btn btn-success" id="Sign_button" data-toggle="modal" data-target="#signupModal">Sign Up</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="container-fluid">
		<div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 text-center welcome_landing">
			<img src="Styles/logo2.png" height="300" width="300">
			<h1 id="main_title">FANTASY VESIT CRICKET LEAGUE</h1>
		</div>
	</div>
</div>


<!--modal for login-->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Login</h3>
        </div>
          <form id="LoginForm" method="POST">
            <div class="modal-body">
              <!--login form-->
               <div class="form-group">
                 <label for="login_email">Email address:</label>
                 <input type="email" class="form-control" id="login_email" placeholder="Email">
               </div>
               <div class="form-group">
                 <label for="login_pwd">Password:</label>
                 <input type="password" class="form-control" id="login_pwd" placeholder="Password">
               </div>
               <div class="form-group">
                 <a href='d_changepwd.php' target="_blank">Forgot Password?</a>
               </div>

                <div id="loginStatus"></div>
                <!--login form ends-->
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="admins_login()"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Login as Admin</button>
              <button type="button" class="btn btn-primary" onclick="register_login()"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Login as User</button>
            </div>
          </form>
    </div>

  </div>
</div>
<!--Login Modal ends-->


<!-------------------------------------------------------------------------------->

<!--modal for Sign Up-->
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <!--Sign up form-->
        	<form id="signupForm" method="POST">
        	  <div class="form-group">
			    <label for="fname">First Name:</label>
			    <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
			  </div>

			  <div class="form-group">
			    <label for="lname">Last Name:</label>
			    <input type="text" class="form-control" id="lname" placeholder="Enter last Name">
			  </div>

			  <div class="form-group">
			    <label for="mail">Email-id:</label>
			    <input type="email" class="form-control" id="mail" placeholder="Enter Email Id">
			  </div>

        <div class="form-group">
          <label for="username">Username:</label>
          <input type="email" class="form-control" id="username" placeholder="Enter the cool username">
        </div>

			  <div class="form-group">
			    <label for="phone">Phone number:</label>
			    <input type="text" class="form-control" id="phone" placeholder="Phone Number">
			  </div>

			   <div class="form-group">
			    <label for="Class">Class:</label>
			    <select class="form-control" id="Class" placeholder="Class Name">
<option>D1</option>
					<option>D2</option>
					<option>D3</option>
					<option>D4</option>
          <option>D5</option>
			    <option>D6A</option>
					<option>D6B</option>
					<option>D7A</option>
					<option>D7B</option>
					<option>D7C</option>
          <option>D8</option>
          <option>D9A</option>
          <option>D9B</option>
          <option>D9C</option>
          <option>D10</option>
          <option>D11A</option>
          <option>D11B</option>
          <option>D12A</option>
          <option>D12B</option>
          <option>D12C</option>
          <option>D13</option>
          <option>D14A</option>
          <option>D14B</option>
          <option>D14C</option>
          <option>D15</option>
          <option>D16A</option>
          <option>D16B</option>
          <option>D17A</option>
          <option>D17B</option>
          <option>D17C</option>
          <option>D18</option>
          <option>D19A</option>
          <option>D19B</option>
          <option>D19C</option>
          <option>D20</option>
          <option>MCA</option>
			    </select>
			  </div>

         <div class="form-group">
          <label for="Question">Security Question:</label>
          <select class="form-control" id="Question" placeholder="Security Question">
            <option>Who is your favourite Cricketer?</option>
            <option>What is your nickname?</option>
            <option>Which VCL team do you like the most?</option>
            <option>Who is your idol?</option>
          </select>
        </div>

        <div class="form-group">
          <label for="Answer">Answer:</label>
          <input type="text" class="form-control" id="Answer" placeholder="Answer">
        </div>

			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd" placeholder="Enter Password">
			  </div>

			  <div class="form-group">
			    <label for="cpwd">Confirm Password:</label>
			    <input type="password" class="form-control" id="cpwd" placeholder="Enter Password Again">
			  </div>

			  <div id="status"></div>

        	</form>
        <!--Sign up form ends-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" href="javascript:void(0);" onclick="register_details()">Sign Up</button>
      </div>
    </div>

  </div>
</div>
<!--Sign up Modal ends-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>