$(document).ready(
	function()
	{
		$('ul#nav-options li a').click(function(){
			var link = $(this).attr('href');
			$('.loader').load(link+'.php'); 
			return false;
		});
	}
);

function add()
{
	var fname = String($("#player_fname").val());
	var lname = String($("#player_lname").val());
	var position = String($("#player_position").val());
	var team = String($("#player_team").val());
	var price = Number($("#player_price").val());
	var datastring = 'fname='+fname+'&lname='+lname+'&position='+position+'&team='+team+'&price='+price;
	alert(datastring);

		$.ajax({
		type : 'post',
		url : 'af_addplayer.php',
		data:datastring,
		cache:false,
		success : function(msg){
			var feedback = String(msg);

			if(feedback == 'success')
			{
				bootbox.alert({
					size:'small',
					message: 'Player added successfully'
				});
			}
			else
			{
				alert(msg);
			}
		}
	});
	return false;
}