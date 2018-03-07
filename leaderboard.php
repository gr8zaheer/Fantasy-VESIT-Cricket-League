<body>
	<h1 class='text-center' style="font-family:sport;">Leaderboard</h1>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12' style="margin-top:15px;margin-bottom:15px;">
				<table class='table table-striped table-bordered text-center' style="width:100%;">
					<thead>
						<tr>
							<th class='text-center'>Rank</th>
							<th class='text-center'>User name</th>
							<th class='text-center'>Points</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							include 'connection.php';
							session_start();
							$user_id = (int)$_SESSION['user_log_uid'];
							$exec = mysqli_query($con,"SELECT * FROM users ORDER BY user_points DESC LIMIT 15");
							while($row = mysqli_fetch_array($exec))
							{
								$rank = $count++;
								$id = $row['user_id']; 
								$username = $row['username'];
								$points = $row['user_points'];
								if($id == $user_id)
								{
									echo"
									<tr style='background-color:red;color:white'>
									";
								}
								else
								echo"<tr>";

								echo "
									<td>$rank</td>
									<td>$username</td>
									<td>$points</td>
								</tr>
									";
								
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>