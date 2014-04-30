<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
		$stmt = $db_conn->prepare("INSERT INTO REPORT_TYPE(name) values(?)");
		$stmt->bind_param('s', $name);
		$stmt->execute();
		$stmt->close();
		header('Location: reporttypes.php');
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
			include 'navbar.php';
		?>
		<div class="row-fluid">
			<div class="offset1 span10" id="backer">
				<div id="inner">
					<h2>New Report Type</h2>
					<form class="form-horizontal" method="POST">
						<div class="control-group">
							<label class="control-label" for="name">Name</label>
							<div class="controls">
								<input type="text" name="name" id="name">
							</div>
						</div>
						<div>
							<button type="submit" name="submit" class="btn">Add Report Type</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
