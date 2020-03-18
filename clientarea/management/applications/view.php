<?php
$page_now = "management/applications";
include '../get_user_data.php';
if (!isset($_POST['id'])) {
	die("Keine Bewerbungsdaten abrufbar. Öffne die Bewerbungsliste erneut");
}
$application_id = $_POST['id'];

if ($EditEmployees != "1") {
	die("Berechtigung fehlt.");
}
if (isset($_POST['cmd'])) {
	$sql = "SELECT * FROM application WHERE applicationID=$application_id";
	$result1 = $conn->query($sql);
	if ($result1->num_rows > 0) {
		// output data of each row
		while ($row = $result1->fetch_assoc()) {
			$byUserID = $row["byUserID"];
			$forRank = $row["forRank"];
			$appli_status = $row["status"];
			$appli_time = $row["time"];
		}
	}
	$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$appli_username = $row["username"];
		}
	} else {
		$appli_username = "Unbekannt";
	}
	if ($_POST['cmd'] == "accept") {
		$sql = "UPDATE application SET status='accepted' WHERE applicationID=$application_id";
		if ($conn->query($sql) === TRUE) {
		} else {
			die("Error updating record: " . $conn->error);
		}
		$info = '<div class="alert alert-success" role="alert">
  Bewerbung wurde angenommen! Warte auf Bestätigung durch Bewerber...
</div>';
		if ($result === FALSE) { /* Handle error */
		}
	} else if ($_POST['cmd'] == "decline") {
		$sql = "UPDATE application SET status='declined' WHERE applicationID=$application_id";
		if ($conn->query($sql) === TRUE) {
		} else {
			die("Error updating record: " . $conn->error);
		}
		$info = '<div class="alert alert-danger" role="alert">
  Die Bewerbung wurde abgelehnt!
</div>';
	}
}

$sql = "SELECT * FROM application WHERE applicationID=$application_id";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) {
	// output data of each row
	while ($row = $result1->fetch_assoc()) {
		$byUserID = $row["byUserID"];
		$forRank = $row["forRank"];
		$appli_status = $row["status"];
		$appli_time = $row["time"];
	}
}
$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$appli_username = $row["username"];
	}
} else {
	$appli_username = "Unbekannt";
}
if ($appli_status == "sent") {
	$appli_status_tra = "Überprüfung ausstehend";
} else if ($appli_status == "declined") {
	$appli_status_tra = "Bewerbung abgelehnt";
} else if ($appli_status == "accepted") {
	$appli_status_tra = "Warte auf Bestätigung durch den Bewerber";
} else if ($appli_status == "acceptedbyuser") {
	$appli_status_tra = "Bewerber eingestellt";
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
						<?php echo $info; ?>
						<h1>Bewerbungen von <?php echo $appli_username; ?></h1>
						<p>Rolle: <?php echo $forRank; ?><br>
							Abgesendet um <?php echo $appli_time; ?><br>
							Status: <?php echo $appli_status_tra; ?></p>
						<p><?php
							$content = @file_get_contents("../../../../media.northwestvideo.de/media/articles/application_text/" . $application_id . '.txt');
							if ($content === FALSE) {
								echo "Der Bewerbungstext ist nicht abrufbar";
							} else {
								echo $content;
							}
							?></p>
						<?php if ($appli_status == "sent") { ?>
							<form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="accept" name="cmd" /><button class="btn btn-success" name="id" value="<?php echo $application_id; ?>">Akzeptieren</button></form>
							<form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="decline" name="cmd" /><button class="btn btn-danger" name="id" value="<?php echo $application_id; ?>">Ablehnen</button></form>
						<?php } ?>

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