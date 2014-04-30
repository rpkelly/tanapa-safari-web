<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<html>
	<head>
		<title>TANAPA Safari Admin Panel</title>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style type="text/css">
			#map-canvas{ height: 400px }
		</style>
		<script type="text/javascript"
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiJYDrTbqabJ4a0T2mtzQwfpCOJwX443M&sensor=false">
		</script>
	</head>
	<body>
		<?php
			include 'navbar.php';
		?>
		<div class="row-fluid">
			<div class="offset1 span10" id="backer">
				<div id="inner">
					<?php
						$stmt = $db_conn->prepare("SELECT USER_LOG.id, USER_LOG.user_id, USER_LOG.latitude, USER_LOG.longitude, USER_LOG.time FROM USER_LOG ORDER BY USER_LOG.time DESC");
						$stmt->execute();
						$stmt->bind_result($log_id, $user_id, $latitude, $longitude, $time);

					?>
					<div class="accordion" id="loc-acc">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="btn btn-large btn-block btn-inverse" data-toggle="collapse" data-parent="#loc-acc" href="#collapseOne">
									User Locations
								</a>
							</div>
							<div id="collapseOne" class="accordion-body collapse">
								<div class="accordion-inner">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>UserID</th>
												<th>Latitude</th>
												<th>Longitude</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											
					<?php
						while($stmt->fetch()) {
					?>						
							<tr>
								<td><?php echo $log_id;?></td>
								<td><?php echo $user_id;?></td>
								<td><?php echo $latitude;?></td>
								<td><?php echo $longitude;?></td>
								<td><?php echo $time;?></td>
							</tr>
					<?php
						}

						$stmt->close();
					?>
						<tbody>
					</table>
				</div>
			</div>
		</div>						
<script type="text/javascript">
	<?php
		$stmt = $db_conn->prepare("SELECT USER_LOG.id, USER_LOG.user_id, USER_LOG.latitude, USER_LOG.longitude, USER_LOG.time FROM USER_LOG WHERE USER_LOG.time > DATE_SUB(now(), INTERVAL 30 DAY)");
		$stmt->execute();
		$stmt->bind_result($log_id, $user_id, $latitude, $longitude, $time);

					?>
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $latitude . ',' . $longitude;?>),
          zoom: 5
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

		<?php
			while($stmt->fetch()){
		?>
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(<?php echo $latitude . ',' . $longitude;?>),
					title: "<?php echo $user_id.": ".$time;?>"
				});

				marker.setMap(map);
		<?php
			}
			$stmt->close();
		?>
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
						<div id="map-canvas"></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
