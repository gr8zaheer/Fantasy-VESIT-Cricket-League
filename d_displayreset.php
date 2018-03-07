<?php
include 'connection.php';
session_start();
?>
<form>
	<div class="form-group">
         <label for="reset_pwd">New Password:</label>
         <input type="password" class="form-control" id="reset_pwd" placeholder="Password">
     </div>
     <div class="form-group">
         <label for="reset_cpwd">Confirm Password:</label>
         <input type="password" class="form-control" id="reset_cpwd" placeholder="Confirm Password">
     </div>
     <div id='reset_status'></div>
     <div class="form-group">
		<button class='btn btn-primary' onclick='return resetpwd()'>Submit</button>
	</div>
</form>