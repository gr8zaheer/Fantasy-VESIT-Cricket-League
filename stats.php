<div class="container">
	<!--div class='row' style="margin-bottom:10px;">
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 box'>
			<h1>Carousel</h1>
		</div>
	</div-->
	<div class='row'>
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
			<table class='table table-bordered text-center' style="background-color:#b3b3b3;color:black;">
				<thead>
					<tr>
						<td colspan="3" class="text-center" style="font-family:sport;"><h3>MAXIMUM RUNS</h3></td>
					</tr>
					<tr>
						<th class='text-center'>Name</th>
						<th class='text-center'>Runs</th>
                                                <th class='text-center'>Info</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'connection.php';
						$exec = mysqli_query($con,"SELECT * FROM players ORDER BY player_runs DESC LIMIT 5") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($exec))
						{
                                                        $player_id = (int)$row['player_id'];
							$player_fname = (string)$row['player_fname'];
							$player_lname = (string)$row['player_lname'];
							$player_name = $player_fname.' '.$player_lname;
							$player_runs = (int)$row['player_runs'];

							echo "
							<tr>
								<td>$player_name</td>
								<td>$player_runs</td>
                                                                <td><button class='btn btn-default btn-xs' onclick='info($player_id)'><i class='fa fa-info' aria-hidden='true'></i></button></td>
							</tr>
							";
						}
					?>
				</tbody>	
			</table>
			
		</div>
		<div class='col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
		<table class='table table-bordered text-center' style="background-color:#b3b3b3;color:black;">
				<thead>
					<tr>
						<td colspan="3" class="text-center" style="font-family:sport;"><h3>MAXIMUM WICKETS</h3></td>
					</tr>
					<tr>
						<th class='text-center'>Name</th>
						<th class='text-center'>Wickets</th>
                                                <th class='text-center'>Info</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'connection.php';
						$exec = mysqli_query($con,"SELECT * FROM players ORDER BY player_wickets DESC LIMIT 5") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($exec))
						{
                                                        $player_id = (int)$row['player_id'];
							$player_fname = (string)$row['player_fname'];
							$player_lname = (string)$row['player_lname'];
							$player_name = $player_fname.' '.$player_lname;
							$player_wickets = (int)$row['player_wickets'];

							echo "
							<tr>
								<td>$player_name</td>
								<td>$player_wickets</td>
                                                                <td><button class='btn btn-default btn-xs' onclick='info($player_id)'><i class='fa fa-info' aria-hidden='true'></i></button></td>
							</tr>
							";
						}
					?>
				</tbody>	
			</table>
			
		</div>
		<div class='col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1  col-sm-12 col-xs-12'>
			<table class='table table-bordered text-center' style="background-color:#b3b3b3;color:black;">
				<thead>
					<tr>
						<td colspan="3" class="text-center" style="font-family:sport;"><h3>MAXIMUM SIXES</h3></td>
					</tr>
					<tr>
						<th class='text-center'>Name</th>
						<th class='text-center'>Sixes</th>
                                                <th class='text-center'>Info</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'connection.php';
						$exec = mysqli_query($con,"SELECT * FROM players ORDER BY player_sixes DESC LIMIT 5") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($exec))
						{
                                                        $player_id = (int)$row['player_id'];
							$player_fname = (string)$row['player_fname'];
							$player_lname = (string)$row['player_lname'];
							$player_name = $player_fname.' '.$player_lname;
							$player_sixes = (int)$row['player_sixes'];

							echo "
							<tr>
								<td>$player_name</td>
								<td>$player_sixes</td>
                                                                <td><button class='btn btn-default btn-xs' onclick='info($player_id)'><i class='fa fa-info' aria-hidden='true'></i></button></td>
							</tr>
							";
						}
					?>
				</tbody>	
			</table>
			
		</div>
	</div>
</div>