<?php
$page_now = "management/job_advertisements";
include '../get_user_data.php';
if($EditEmployees != "1"){
	die("Berechtigung fehlt");
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<?php include '../../head.php'; ?>
	<style>
		.map-container {
			overflow: hidden;
			padding-bottom: 56.25%;
			position: relative;
			height: 0;
		}

		.map-container iframe {
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			position: absolute;
		}
	</style>
</head>

<body class="elegant-color-dark">

	<!--Main Navigation-->
	<header>

		<!-- Sidebar -->
		<?php
		include '../php/sidebar.php'; ?>
		<!-- Sidebar -->

	</header>
	<!--Main Navigation-->

	<!--Main layout-->
	<main class="pt-4 mx-lg-5">
		<div class="container-fluid">

			<!-- Heading -->
			<div class="card mb-4 wow fadeIn">

				<!--Card content-->
				<div class="card-body elegant-color white-text d-sm-flex justify-content-between">

					<h4 class="mb-2 mb-sm-0 pt-1">
						<a href="/clientarea/management/">Spedition</a>
						<span>/</span>
						<span>Stellenanzeigen</span>
					</h4>

				</div>

			</div>
			<!-- Heading -->
			<div class="card mb-4 wow fadeIn">

				<!--Card-->
				<div class="card" style="width:100%;">

					<!--Card content-->
					<div class="card-body elegant-color white-text" style="width:100%;">
						<?php if ($_GET['idc'] == "tra_sc") {
							echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Transaktion erfolgreich gesendet!</strong></p>
</div></div>';
						} ?>
						<div class="modal fade" id="new_ad" tabindex="-1" role="dialog">
							<div class="modal-dialog elegant-color white-text" role="document">
								<div class="modal-content elegant-color white-text">
									<form action="create" method="post" name="new_ad" id="new_ad">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Neue Stellenanzeige erstellen</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

										</div>
										<div class="modal-body">
											<div class="md-form">
												<input type="text" class="form-control white-text" name="rank" id="rank" autocomplete="off">
												<label for="receiver">Rolle (muss bereits existieren)</label>
											</div>
											<div class="md-form">
												<input type="hidden" id="fire_employeeID" value="" name="employeeID" />
												<textarea id="message" name="message" class="md-textarea form-control white-text" rows="3" maxlength="250" required></textarea>
												<label for="message">Stellenbeschreibung</label>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" name="submit" id="submit">Erstellen</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<h1>Stellenanzeigen</h1>
						<table class="table white-text" style="max-height: 150px !important; overflow: auto !important;">
							<a href="#" class="btn btn-default float-right" data-toggle="modal" data-target="#new_ad">Erstellen</a>
							<thead>
								<tr>
									<td>Rolle</td>
									<td>Erstellt am</td>
									<td>Status</td>
									<td></td>
									<td></td>
								</tr>
							</thead>

							<tbody>
								<?php
								$sql = "SELECT * FROM job_market WHERE byCompanyID=$user_company_id ORDER by created_date DESC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while ($row = $result->fetch_assoc()) {
										$jm_rank = $row["rank"];
										$jm_date = $row["created_date"];
										$jm_status = $row["status"];
										$jm_id = $row["AdID"];
										echo '<tr><td>' . $jm_rank . '</td><td>' . $jm_date . '</td><td>' . $jm_status . '</td>';
										echo <<<EOT
		<td><button type="button" onclick="window.location='edit?id=$jm_id';" class="btn btn-info">Bearbeiten</button></td><td><a href="/clientarea/job_ad?id=$jm_id" style="color:white;" ><i class="fas fa-share-square"></i>Link</a></td></tr> 
		EOT;
									}
								} else {
								}
								?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

		</div>
		<!--/.Card-->
		</div>
	</main>
	<!--Main layout-->

	<!--Footer-->
	<?php
	include '../php/footer.php'; //Footer laden
	?>
	<!--/.Footer-->

	<!-- SCRIPTS -->
	<!-- JQuery -->
	<script type="text/javascript" src="/clientarea/management/js/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="/clientarea/management/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/clientarea/management/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="/clientarea/management/js/mdb.min.js"></script>
	<!-- Initializations -->
	<script type="text/javascript">
		// Animations initialization
		new WOW().init();
	</script>

</body>

</html>