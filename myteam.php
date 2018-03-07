<script type="text/javascript">
$(document).ready(function()
{
	$('.container-fluid .playerdisplay').load('d_displayplayers.php');
	$('.money-players').load('d_getdetails.php');
	$('.number-players').load('d_getnumber.php');
	$('.squad-players').load('d_getsquad.php');
});
</script>

<div class='container-fluid'>
	<div class='row'>				
		<div class='col-lg-6 col-md-6 playerinfo'>
			<div class='row'>
				<div class='col-lg-12 col-md-12 box'>
					<div class='container-fluid money-players'>
					</div>
				</div>
				<div class='col-lg-12 col-md-12 number-players box '>
				</div>
				<div class='col-lg-12 col-md-12 squad-players'>
					
				</div>
			</div>
		</div>
	<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-lg-12 col-md-12 col-sm-offset-1 col-sm-11 col-xs-12 playerdisplay'>	
				</div>	
			</div>
    	</div>
	</div>
	</div>
</div>