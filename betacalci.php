<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CALCULATE</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	function getit()
	{
			var team = String($('#team_name').val());
			var dataString = 'team='+team;
			$.ajax({
				type:'post',
				data:dataString,
				url:'af_getteam.php',
				success:function(msg){
				
					$('#disp').html(msg);
			}
		});
	}
</script>
</head>
<body>
	<p>Search by team</p>
<select id='team_name'>
	<option>SEHWAG</option>
	<option>TENDULKAR</option>
	<option>GANGULY</option>
	<option>DHONI</option>
	<option>STEYN</option>
        <option>PONTING</option>	
<option>MCCULLUM</option>
</select>
<button onclick='getit()'>SUBMIT</button>
<div id='disp'>
</div>
</body>
</html>