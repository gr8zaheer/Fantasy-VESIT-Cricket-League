<?php
session_start();
include 'connection.php';
$user_id = (int)$_SESSION['temp_id'];

$exec = mysqli_query($con,"SELECT user_q from users where user_id=$user_id");
while($row = mysqli_fetch_array($exec))
{
	$question = (string)$row['user_q'];
}

echo "
<form>
				  <div class='form-group'>
				    <label for='sec_question'>Security Question:</label>
				    <input type='text' class='form-control' id='sec_question' value='$question'  placeholder='Email ID' readonly>
				  </div>
				  <div class='form-group'>
				    <label for='ver_ans'>Answer:</label>
				    <input type='text' class='form-control' id='ver_ans' placeholder='Your Answer'>
				  </div>
				  <div class='form-group'>
				    <button class='btn btn-primary' onclick='return verify_ans()'>Submit</button>
				  </div>
				</form>


";

?>