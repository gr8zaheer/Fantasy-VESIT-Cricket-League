<?php
	session_start();
	include 'connection.php';

  $login_email= $_POST['login_email'];
  $login_pwd= md5($_POST['login_pwd']);
  $check_if_exist = "SELECT * FROM users where user_mail='$login_email' AND user_pwd='$login_pwd'";
  $run_query = mysqli_query($con,$check_if_exist) or die(mysqli_error($con));
  if(mysqli_num_rows($run_query) > 0)
  {
  	while($row = mysqli_fetch_array($run_query))
  	{
      $login_uid = $row['user_id'];
  		$login_fname = $row['user_fname'];
  		$login_lname = $row['user_lname'];
      $login_username = $row['username'];
  		$login_phone = $row['user_phone'];
  		$login_class = $row['user_class'];
      $login_amount = $row['user_amount'];
  	  $login_points = $row['user_points'];
      $login_players = $row['user_players'];
    }
  		$_SESSION['user_log_fname'] = $login_fname;
  		$_SESSION['user_log_lname'] = $login_lname;
  		$_SESSION['user_log_phone'] = $login_phone;
  		$_SESSION['user_log_class'] = $login_class;
  		$_SESSION['user_log_email'] = $login_email;
      $_SESSION['username'] = $login_username;
  		$_SESSION['user_log_pwd'] = $login_pwd;
      $_SESSION['user_log_uid'] = $login_uid;
      $_SESSION['user_log_amount'] = $login_amount;
      $_SESSION['user_log_points'] = $login_points;
      $_SESSION['user_log_players'] = $login_players;
  		echo "You have successfully logged in";
  }
  else
  {
  	echo "Either Email Id or Password is incorrect";
  }
?>