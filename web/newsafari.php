<!DOCTYPE html>
<?php
	require("config/config.php");
?>

<?php
if(isset($_POST['submit']))
    {
        $s_name = $_POST['inputName'];
		$s_desc = $_POST['inputDescription'];
		$s_head = $_POST['selectHeader'];
		$s_foot = $_POST['selectFooter'];
		$s_tile = $_POST['selectTile'];
		$stmt = $db_conn->prepare("INSERT INTO SAFARI(name, description, header_media_id, footer_media_id, tile_media_id) values(?, ?, ?, ?, ?)");
		$stmt->bind_param('ssiii', $s_name, $s_desc, $s_head, $s_foot, $s_tile);
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
							<label class="control-label" for="inputName">Name</label>
							<div class="controls">
								<input type="text" name="inputName" id="inputName" placeholder="Safari Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputDescription">Description</label>
							<div class="controls">
								<textarea rows="3" name="inputDescription" id="inputDescription" placeholder="Safari Description" width="85%"></textarea>
							</div>
						</div>
						<div class="controls-group">
							<label class="control-label" for="selectHeader">Header</label>
							<div class="controls">
								<select name="selectHeader" id="selectHeader">
								<?php
									$stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA");
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
						<div class="controls-group">
							<label class="control-label" for="selectFooter">Footer</label>
							<div class="controls">
								<select name="selectFooter" id="selectFooter">
								<?php
									$stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA");
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
						<div class="controls-group">
							<label class="control-label" for="selectTile">Tile</label>
							<div class="controls">
								<select name="selectTile" id="selectTile">
								<?php
									$stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA");
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
							<button type="submit" name="submit" class="btn">Add Safari</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
