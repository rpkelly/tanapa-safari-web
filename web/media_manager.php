<!DOCTYPE html>
<?php
	require("config/config.php");
?>


<html>
	<head>
		<title>TANAPA Safari Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
								
		<script>
			$(document).ready(function(){
				$("#mediaFileInput").on("change", function(e){

					if (e.source.val()) {
						//var formData = new FormData($("#poiMediaFileForm")[0]);
						$.ajax({
							url: 'media.php',  //Server script to process data
							type: 'POST',
							success: function(data){
								var response = JSON.parse(data);
								console.log(response);
								//rowBeingEdited.find("td:nth-child(5)").html("<a href='" + response.url.substring(1) + "'>" + response.url.substring(1) + "</a>");
							},
							// Form data
							data: e.source.form,
							//Options to tell jQuery not to process data or worry about content-type.
							cache: false,
							contentType: false,
							processData: false
						});   
					}
				});
			});           
		</script>

	</head>
	<body>
		<?php
			include 'navbar.php';
		?>
		<div class="row-fluid">
			<div class="offset1 span10" id="backer">
				<div id="inner">
					<div class="accordion" id="loc-acc">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="btn btn-large btn-block btn-inverse" data-toggle="collapse" data-parent="#loc-acc" href="#collapseOne">
									Media
								</a>
							</div>
							<div id="collapseOne" class="accordion-body collapse">
								<div class="accordion-inner">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>URL</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>
														
											<?php

												$stmt = $db_conn->prepare("SELECT MEDIA.url, MEDIA.id FROM MEDIA");
												$stmt->execute();
												$stmt->bind_result($media_url, $media_id);
												while($stmt->fetch()) {
											?>                      
												<tr>
													<td><?php echo $media_id?></td>
													<td><a href="<?php echo substr($media_url, 1); ?>"><?php echo $media_url?></a></td>
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
									<form id="mediaFileInputForm">
										<input type="file" id="mediaFileInput" name="file">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
