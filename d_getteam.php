<?php
include 'connection.php';
session_start();
$id = $_SESSION['user_log_uid'];
?>
<script type="text/javascript">
	$('.team_info').load('d_getteamdetails.php');
	$('.team_subs').load('d_getteamlist.php');
	function transfer_show()
	{
		var cat = $('#transfer_category').val();
		var datastring = 'cat='+cat;
		$.ajax({
			type : 'post',
			url : 'd_gettransfers.php',
			data : datastring,
			cache:false,
			success : function(msg){
				$('#transfer_display').html(msg);
			}
		});
	return false;
	}
</script>	
<div class='container-fluid'>
	<div class='row'>						
		<div class='col-lg-6 col-md-6'>
			<div class='col-lg-12 col-md-12 text-center team_info'>
			</div>
			<div class='col-lg-12 col-md-12 text-center team_subs' style="margin-bottom:20px;">
			</div>
		</div>
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<div class='col-lg-12 col-md-12 text-center box'>
				<h2>Transfers:</h2>
			</div>

		<form class='form-inline text-center'>
			<div class="form-group">
				<label for='position'>Position</label>
					<select class='form-control' id='transfer_category'>
						<option>Batsman</option>
						<option>Bowler</option>
                                                <option>Captain</option>
					</select>
			</div>

			<button class='btn btn-default' onclick='return transfer_show()'>Search</button>

			<div style="overflow-x:auto;">
				<div class='col-lg-12 col-md-12' id='transfer_display'>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>