<?php
include 'connection.php';

  $user_fname= $_POST['fname'];
  $user_lname= $_POST['lname'];
  $user_mail= $_POST['mail'];
  $user_phone=$_POST['phone'];
  $username= $_POST['username'];
  $user_class = $_POST['Class'];
  $user_pwd= md5($_POST['pwd']);
  $user_q = $_POST['Question'];
  $user_ans = $_POST['Answer'];
  $check_if_exists = "SELECT * from users where user_mail='$user_mail'";
  $exec_check = mysqli_query($con,$check_if_exists) or die(mysqli_error($con));
  $check_username = "SELECT * from users where username = '$username'";
  $exec_user = mysqli_query($con,$check_username) or die(mysqli_error($con));
  if(mysqli_num_rows($exec_check) >  0)
  {
    echo "Entered E-mail is already used. Please Log In to continue";
  }
  else if(mysqli_num_rows($exec_user) > 0)
  {
    echo "This username is already taken";
  }
  else
  {
    $qry="INSERT INTO users(user_fname,user_lname,user_mail,username,user_phone,user_class,user_q,user_ans,user_pwd) VALUES('$user_fname','$user_lname','$user_mail','$username','$user_phone','$user_class','$user_q','$user_ans','$user_pwd')";
    if(mysqli_query($con, $qry))
    {
    	echo "Signed Up Successfully";
    }
  }
?>