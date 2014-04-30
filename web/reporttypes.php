<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['delete']))
    {
        $delete_id = $_POST['ID'];
		$stmt = $db_conn->prepare("DELETE FROM REPORT WHERE report_type_id = ?");
		$stmt->bind_param('i', $delete_id);
		$stmt->execute();
		$stmt->close();
		$stmt = $db_conn->prepare("DELETE FROM REPORT_TYPE WHERE id = ?");
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
						$stmt = $db_conn->prepare("SELECT REPORT_TYPE.id, REPORT_TYPE.name FROM REPORT_TYPE");
						$stmt->execute();
						$stmt->bind_result($rt_id, $rt_name);

					?>
					<h2>Report Types</h2>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
										
					<?php
						while($stmt->fetch()) {
					?>						
							<tr>
								<td><?php echo $rt_id;?></td>
								<td><?php echo $rt_name;?></td>
								<form name="" method=POST action="">
									<input type="hidden" name="ID" value="<?php echo $rt_id; ?>">
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
					<a href="newreporttype.php" class='btn btn-success'>New Report Type</a>
				</div>
			</div>
		</div>						
	</body>
</html>
