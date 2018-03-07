<?php
	session_start();
	include 'connection.php';

  $login_email= $_POST['login_email'];
  $login_pwd= $_POST['login_pwd'];
  $check_if_exist = "SELECT * FROM admins where admin_email='$login_email' AND admin_pwd='$login_pwd'";
  $run_query = mysqli_query($con,$check_if_exist) or die(mysqli_error($con));
  if(mysqli_num_rows($run_query) > 0)
  {
  	while($row = mysqli_fetch_array($run_query))
  	{
      $login_uid = $row['admin_id'];
  		$login_name = $row['admin_name'];
    }
  		$_SESSION['admin_log_name'] = $login_name;
  		$_SESSION['admin_log_email'] = $login_email;
      $_SESSION['admin_log_uid'] = $login_uid;
  		echo "You have successfully logged in";
  }
  else
  {
  	echo "Either Email Id or Password is incorrect";
  }
?>