<div class="container">
	<!--div class='row' style="margin-bottom:10px;">
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 box'>
			<h1>Carousel</h1>
		</div>
	</div-->
	<div class='row'>
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center' style="background-color:#cc0000;color:white;margin-bottom:15px;">
			<h2 style="font-family:sport;">FVCL 2017 HAS ENDED</h2>
                   

		</div>
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12' style="background-color:#b3b3b3;color:black;margin-bottom:15px;">
			<h3 style="text-align:center;font-family:sport;">Upcoming Matches</h3><br>
			<div style="text-align:center;">
				<h4><b>18/02/2017</b></h4>
				<p><b>JOHNSON VS SACHIN</b></p>
				<br>

				<p><b>GAYLE VS STARC</b></p>
                                <p>Date will be announced soon</p>
				<br>

			</div>
		</div>
		<div class='col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12' style="color:white;background-color:#e67e22;margin-bottom:15px;">
		<h3 style="text-align:center;font-family:sport;">Match Results</h3><br>
			<div style="text-align:center;">

				<h4><b>12/02/2017</b></h4>
				<p><b>SACHIN VS STARC</b></p>
                                <p>STARC won by 9 wickets and 10 balls to spare<p>
				<br>
                                
                                <h4><b>12/02/2017</b></h4>
				<p><b>DRAVID VS JOHNSON</b></p>
                                <p>DRAVID won by 8 runs<p>
				<br>

			</div>
		</div>
		<div class='col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12'>
			<table class='table table-bordered text-center' style="background-color:#2980b9;color:white;">
				<thead>
					<tr>
						<td colspan="5" class="text-center" style="font-family:sport;"><h3>Team Leaderboard</h3></td>
					</tr>
					<tr>
						<th class='text-center'>Team</th>
						<th class='text-center'>W</th>
						<th class='text-center'>L</th>
						<th class='text-center'>D</th>
						<th class='text-center'>Points</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'connection.php';
						$exec = mysqli_query($con,"SELECT * FROM teams ORDER BY team_points DESC") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($exec))
						{
							$team = (string)$row['team_name'];
							$team_win = (int)$row['team_win'];
							$team_loss = (int)$row['team_loss'];
							$team_draw = (int)$row['team_draw'];
							$team_points = (int)$row['team_points'];

							echo "
							<tr>
								<td>$team</td>
								<td>$team_win</td>
								<td>$team_loss</td>
								<td>$team_draw</td>
								<td>$team_points</td>
							</tr>
							";
						}
					?>
				</tbody>	
			</table>
		</div>
	</div>
</div>