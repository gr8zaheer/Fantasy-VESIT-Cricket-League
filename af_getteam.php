<script type="text/javascript">
	$('.calculate').click(function(event){
		var index = Number($('.calculate').index(this));
		var runs_scored = Number($('.runs_scored:eq('+index+')').val());
		var balls_faced = Number($('.balls_faced:eq('+index+')').val());
		var sixes = Number($('.sixes:eq('+index+')').val());
		var fours = Number($('.fours:eq('+index+')').val());
		var wickets = Number($('.wickets_taken:eq('+index+')').val());
		var runs_conceded = Number($('.runs_conceded:eq('+index+')').val());
		var overs_bowled = Number($('.overs_bowled:eq('+index+')').val());
		var fielding = Number($('.fielding:eq('+index+')').val());
		//strike rate points
		var points = 0;
		
		//runs points
		if(balls_faced > 0)
		{
			var strike_rate = runs_scored*100/balls_faced;
			if(strike_rate <= 90)
				points=points - 5;
			else if(strike_rate <= 120)
				points = points + 0;
			else if(strike_rate <= 150)
				points = points + 5;
			else if(strike_rate <= 180)
				points = points + 10;
			else
				points = points + 15;
			if(runs_scored != 0)
				points = points + runs_scored;
			else
				points = points - 5;
			//bonus runs
			if(runs_scored > 30)
				points=points+15;
			else if(runs_scored > 20)
				points = points+10;
			//six and four points
			points = points + (sixes*3);
			points = points + fours;
		}

		if(overs_bowled > 0)
		{
			points = points + (30*wickets);
			var eco = runs_conceded/overs_bowled;
			if(eco < 4)
				points = points + 15;
			else if(eco < 5.50)
				points = points + 10;
			else if(eco < 7.00)
				points = points + 5;
			else if(eco < 8.50)
				points = points;
			else
				points = points - 5;
		}

		points = points + (fielding*10);


		//
		//alert(index+' '+runs_scored+' '+balls_faced+' '+sixes+' '+fours+' '+wickets+' '+runs_conceded+' '+overs_bowled+' '+fielding+' '+strike_rate);

		$('.player_points:eq('+index+')').val(points);

	});


$('.sub').click(function(){
		var index = Number($('.sub').index(this));
		var pid = Number($('.p_id:eq('+index+')').val());
		var runs_scored = Number($('.runs_scored:eq('+index+')').val());
		var balls_faced = Number($('.balls_faced:eq('+index+')').val());
		var sixes = Number($('.sixes:eq('+index+')').val());
		var fours = Number($('.fours:eq('+index+')').val());
		var wickets = Number($('.wickets_taken:eq('+index+')').val());
		var runs_conceded = Number($('.runs_conceded:eq('+index+')').val());
		var overs_bowled = Number($('.overs_bowled:eq('+index+')').val());
		var fielding = Number($('.fielding:eq('+index+')').val());
		//strike rate points
		var points = 0;
		
		//runs points
		if(balls_faced > 0)
		{
			var strike_rate = runs_scored*100/balls_faced;
			if(strike_rate <= 90)
				points=points - 5;
			else if(strike_rate <= 120)
				points = points + 0;
			else if(strike_rate <= 150)
				points = points + 5;
			else if(strike_rate <= 180)
				points = points + 10;
			else
				points = points + 15;
			if(runs_scored != 0)
				points = points + runs_scored;
			else
				points = points - 5;
			//bonus runs
			if(runs_scored > 30)
				points=points+15;
			else if(runs_scored > 20)
				points = points+10;
			//six and four points
			points = points + (sixes*3);
			points = points + fours;
		}

		if(overs_bowled > 0)
		{
			points = points + (30*wickets);
			var eco = runs_conceded/overs_bowled;
			if(eco < 4)
				points = points + 15;
			else if(eco < 5.50)
				points = points + 10;
			else if(eco < 7.00)
				points = points + 5;
			else if(eco < 8.50)
				points = points;
			else
				points = points - 5;
		}

		points = points + (fielding*10);
		//alert(index+' '+runs_scored+' '+balls_faced+' '+sixes+' '+fours+' '+wickets+' '+runs_conceded+' '+overs_bowled+' '+fielding+' '+strike_rate+' '+points);
		dataString = 'p_id='+pid+'&player_runs='+runs_scored+'&player_sixes='+sixes+'&player_wickets='+wickets+'&player_points='+points;
		$.ajax({
			type:'post',
			url:'af_kardeupdate.php',
			cache:false,
			data:dataString,
			success:function(msg){
				alert(msg);
			}

		});


});

</script>

<table border="1" cellpadding="5px">
	<thead>
		<tr>
			<th>ID</th>
			<th>fname</th>
			<th>lname</th>
			<th>team</th>
			<th>batting runs</th>
			<th>batting balls</th>
			<th>sixes</th>
			<th>fours</th>
			<th>wickets</th>
			<th>bowling runs</th>
			<th>overs</th>
			<th>fielding</th>
			<th>points</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			include 'connection.php';
			
			$player_team = (string)$_POST['team'];
			$exec = mysqli_query($con,"SELECT * FROM players where player_team = '$player_team'");
			while($exec2 = mysqli_fetch_array($exec)) {
				$p_id = (int)$exec2['player_id'];
				$p_fname =(string)$exec2['player_fname'];
				$p_lname =(string)$exec2['player_lname'];
				$p_team = (string)$exec2['player_team'];
				echo "
				<tr>
					<td>
						<input type='number' class='p_id' value='$p_id' style='width:50px;' disabled>
					</td>
					<td>$p_fname</td>
					<td>$p_lname</td>
					<td>$p_team</td>
					<td>
					  <input type='number' class='runs_scored' value='0' style='width:50px;'><!--update-->
					</td>
					<td>
					  <input type='number' class='balls_faced' value='0' style='width:50px;'>
					</td>
					<td>
					  <input type='number' class='sixes' value='0' style='width:50px;'><!--update-->
					</td>
					<td>
					  <input type='number' class='fours' value='0' style='width:50px;'>
					</td>
					<td>
					  <input type='number' class='wickets_taken' value='0' style='width:50px;'><!--update-->
					</td>
					<td>
					  <input type='number' class='runs_conceded' value='0' style='width:50px;'>
					</td>
					<td>
					  <input type='number' class='overs_bowled' value='0' style='width:50px;'>
					</td>
					<td>
					  <input type='number' class='fielding' value='0' style='width:50px;'>
					</td>
					<td>
					  <input type='number' class='player_points' value='0' style='width:50px;' disabled>
					</td>
					<td>
						<button class='calculate'>Calculate</button>&nbsp;&nbsp;
						<button class='sub'>Submit</button>
					</td>
				</tr>
				";
			}
		?>
	</tbody>
</table>