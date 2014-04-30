<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['submit']))
    {
        $p_name = $_POST['inputName'];
		$p_saf  = $_POST['selectSafari'];
		$p_lat = $_POST['inputLat'];
		$p_lng = $_POST['inputLng'];
		$p_rad = $_POST['inputRad'];
		$p_img = $_POST['selectImage'];
		$stmt = $db_conn->prepare("INSERT INTO SAFARI_POINTS_OF_INTEREST(name, safari_id, media_id, latitude, longitude, radius) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('siiddi', $p_name, $p_saf, $p_img, $p_lat, $p_lng, $p_rad);
		$stmt->execute();
		$stmt->close();
		header('Location: index.php');
    }
?>
<html>
	<head>
		<title>TANAPA Safari Admin Panel</title>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
			include 'navbar.php'
		?>
		<div class="row-fluid">
			<div class="offset1 span10" id="backer">
				<div id="inner">
					<form class="form-horizontal" method="POST">
						<div class="control-group">
							<label class="control-label" for="inputName">Name</label>
							<div class="controls">
								<input type="text" name="inputName" id="inputName" placeholder="Point of Interest Name">
							</div>
						</div>
						<div class="controls-group">
							<label class="control-label" for="selectImage">Image</label>
							<div class="controls">
								<select name="selectImage" id="selectImage">
								<?php
									$stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA LEFT JOIN REPORT ON MEDIA.id = REPORT.report_media_id");
									$stmt->execute();
									$stmt->bind_result($media_url, $media_id);
									while($stmt->fetch()){
										echo '<option value ="'.$media_id.'" >';
										echo $media_url;
										echo '</option>';
									}
									$stmt->close();
								?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="selectSafari">Safari</label>
							<div class="controls">
								<select name="selectSafari" id="selectSafari">
								<?php
									$stmt = $db_conn->prepare("SELECT SAFARI.id, SAFARI.name FROM SAFARI");
									$stmt->execute();
									$stmt->bind_result($s_id, $s_name);
									while($stmt->fetch()){
										echo '<option value ="'.$s_id.'" >';
										echo $s_name;
										echo '</option>';
									}
									$stmt->close();
								?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputLat">Latitude</label>
							<div class="controls">
								<input type="text" name="inputLat" id="inputLat">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputLng">Longitude</label>
							<div class="controls">
								<input type="text" name="inputLng" id="inputLng">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputRad">Radius</label>
							<div class="controls">
								<input type="text" name="inputRad" id="inputRad">
							</div>
						</div>
							<button type="submit" name="submit" class="btn">Add Point of Interest</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
