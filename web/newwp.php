<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['submit']))
    {
        $w_seq = $_POST['inputSeq'];
		$w_saf  = $_POST['selectSafari'];
		$w_lat = $_POST['inputLat'];
		$w_lng = $_POST['inputLng'];
		$stmt = $db_conn->prepare("INSERT INTO SAFARI_WAYPOINTS(sequence, safari_id, latitude, longitude) values( ?, ?, ?, ?)");
		$stmt->bind_param('iidd', $w_seq, $w_saf, $w_lat, $w_lng);
		$stmt->execute();
		$stmt->close();
		header('Location: index.php');
    }
?>
<html>
	<head>
		<title>TANAPA Safari Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="row-fluid">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
				<a class="brand" href="index.php">Safaris</a>
				<ul class="nav nav-tabs">
				</ul>
			</div>
		</div>
		<div class="row-fluid">
			<div class="offset1 span10" id="backer">
				<div id="inner">
					<form class="form-horizontal" method="POST">
						<div class="control-group">
							<label class="control-label" for="inputSeq">Sequence</label>
							<div class="controls">
								<input type="text" name="inputSeq" id="inputSeq">
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
							<button type="submit" name="submit" class="btn">Add Point of Interest</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
