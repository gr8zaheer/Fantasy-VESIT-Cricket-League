<?php
include 'connection.php';
session_start();
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$('.start,.stop').click(function(event){
		if($(this).hasClass('start'))
		{
			var message = "Gameday Started";
		}
		else
		{
			var message = "Gameday Stopped";
		}
		$.ajax({
			url:'af_gameday.php',
			success:function(msg){
			var feedback = String(msg);
			if(feedback == 'success')
			{
				alert('success');
			}
			else
			{
				alert(msg);
			}
		}

		});
	});
});

	function update_points()
	{
	    var r = confirm("Do you really want to update points?");
	    if(r == true)
		{
			$.ajax({
					url:'af_updatepoints.php',
					success:function(msg){
					var feedback = String(msg);
					if(feedback == 'success')
					{
						alert('success');
					}
					else
					{
						alert(msg);
					}
				}
		
				});
		}
		else
		{
			alert('Update Cancelled');
		}
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Update points</title>
</head>
<body>
	<button onclick="update_points()">Update</button>
	<button class='start'>Start Gameday</button>
	<button class='stop'>Stop Gameday</button>

</body>
</html>
