<?php
$requested_ad_id = $_GET['id'];
$page_now = "management/job_advertisements";
include '../get_user_data.php';
$requested_ad_id = $conn->real_escape_string($requested_ad_id);
$sql = "SELECT * FROM job_market WHERE AdID=$requested_ad_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$ad_byCompanyID = $row["byCompanyID"];
		$ad_rank = $row["rank"];
		$ad_created_date = $row["created_date"];
		$ad_status = $row["status"];
	}
} else {
}
if ($ad_byCompanyID != $user_company_id) {
	die("unauthorized");
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
						<h1>Stellenanzeigen Nr.<?php echo $requested_ad_id; ?></h1>
						<p>Suche nach: <?php echo $ad_rank; ?> </p>
						<p>Erstellt am: <?php echo $ad_created_date; ?> </p>
						<form action="/clientarea/management/job_advertisements/save_edit" method="post" name="registerform" id="account-register-form" enctype="multipart/form-data">
							<input type='hidden' name='AdID' value='<?php echo $requested_ad_id; ?>' />
							<div class="md-form">
								<textarea id="message" name="message" class="md-textarea form-control white-text" rows="3" maxlength="250" required><?php echo file_get_contents("../../../../media.northwestvideo.de/media/articles/ad_description/" . $requested_ad_id . '.txt'); ?></textarea>
								<label for="message">Stellenbeschreibung</label>
							</div>
							<select class="elegant-color white-text" name="status" id="status">
								<option value="open">Offen</option>
								<option value="closed">Geschlossen</option>
							</select>
							<input type="submit" name="submit" id="submitbtn" class="btn btn-default btn-block" value="Speichern">
						</form>
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