<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['delete']))
    {
        $delete_id = $_POST['ID'];
		$stmt = $db_conn->prepare("DELETE FROM REPORT WHERE id = ?");
		$stmt->bind_param('i', $delete_id);
		$stmt->execute();
		$stmt->close();
    }
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
						$stmt = $db_conn->prepare("SELECT REPORT.id, REPORT.user_id, REPORT.latitude, REPORT.longitude, REPORT.time, MEDIA.type, REPORT_TYPE.name FROM REPORT JOIN MEDIA ON REPORT.report_media_id = MEDIA.id JOIN REPORT_TYPE ON REPORT.report_type_id = REPORT_TYPE.id ORDER BY REPORT.time DESC");
						$stmt->execute();
						$stmt->bind_result($r_id, $user_id, $latitude, $longitude, $time, $m_type, $r_type);

					?>
					<div class="accordion" id="loc-acc">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="btn btn-large btn-block btn-inverse" data-toggle="collapse" data-parent="#loc-acc" href="#collapseOne">
									User Reports
								</a>
							</div>
							<div id="collapseOne" class="accordion-body collapse">
								<div class="accordion-inner">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>UserID</th>
												<th>Report Type</th>
												<th>Media Type</th>
												<th>Time</th>
												<th>Latitude</th>
												<th>Longitude</th>
											</tr>
										</thead>
										<tbody>
											
					<?php
						while($stmt->fetch()) {
					?>						
							<tr>
								<td><?php echo $r_id;?></td>
								<td><?php echo $user_id;?></td>
								<td><?php echo $r_type;?></td>
								<td><?php echo $m_type;?></td>
								<td><?php echo $time;?></td>
								<td><?php echo $latitude;?></td>
								<td><?php echo $longitude;?></td>
								<td><a class="btn btn-block btn-primary" href="viewreport.php?id=<?php echo $r_id; ?>">View Report</a></td>
								<form name="" method=POST action="">
									<input type="hidden" name="ID" value="<?php echo $r_id; ?>">
									<td>
										<input type="submit" name="delete" value="Delete" class="btn btn-block btn-danger">
									</td>
								</form>
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
		$stmt = $db_conn->prepare("SELECT REPORT.id, REPORT.latitude, REPORT.longitude, REPORT.content FROM USER_LOG WHERE REPORT.time > DATE_SUB(now(), INTERVAL 30 DAY)");
		$stmt->execute();
		$stmt->bind_result($r_id, $latitude, $longitude, $content);

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
					title: "<p><?php echo $content;?></p> <a href='viewreport.php?id=<?php $r_id; ?>'>View Report</a>"
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
