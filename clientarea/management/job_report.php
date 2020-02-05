<?php
include '../../basis_files/php/get_user_data.php';
//GET parameters
$requested_user_name= $_GET['username'];
$requested_job_id= $_GET['jobid'];
$requested_accept = $_GET['accpt'];

//hole Fahrtdaten
$sql = "SELECT * FROM tour_table WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
$result2 = $conn->query($sql) or die($conn->error);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
	    $departure = $row["departure"];
	    $departure_comp = $row["depature_company"];
	    $destination = $row["destination"];
	    $destination_comp = $row["destination_company"];
	    $truck_manufacturer = $row["truck_manufacturer"];
	    $truck_model = $row["truck_model"];
	    $trailer_damage = $row["trailer_damage"];
	    $cargo_weight = $row["cargo_weight"];
	    $cargo = $row["cargo"];
	    $money_earned = $row["money_earned"];
	    $tour_date = $row["tour_date"];
	    $status = $row["status"];
	    $percentage = $row["percentage"];
	    $job_scompanyID = $row["companyID"];
	    $income = $row["money_earned"];
	    $tour_approved_int = $row["tour_approved"];

	    //Übersetzung des Tour-Status
	    if ($status == "finished"){
		    $status = "abgeschlossen";
	    }else if ($status == "canceled"){
		    $status = "abgebrochen";
	    }else if ($status == "accepted by driver"){
		    $status = "wird gefahren";
	    }else if ($status == "accepted"){
		    $status = "von Spedition bestätigt";
	    }else if ($status == "declined"){
		    $status = "von Spedition abgelehnt";
	    }

	    //hole Firmennamen der Tour
	    $sql = "SELECT * FROM company_information_table WHERE id=$job_scompanyID";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
			    $job_s_found_comp_name = $row["name"];
		    }
	    }
	    if ($EditLogbook == "1"){ //hat der Nutzer Rechte zum Editieren des Fahrtenbuches?
		    if($tour_approved_int == "0"){//ist die Tour schon überprüft worden?
			    if ($requested_accept == "1") {//soll die Tour bestätigt werden?
				    //Tourdaten aktualisieren
				    $sql = "UPDATE tour_table SET tour_approved=1, status='accepted' WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
				    if ($conn->query($sql) === TRUE) {
					    //setze visuelles Feedback
					    $status = "von Spedition angenommen";
					    $info = '<div class="alert alert-success" role="alert">
					    Auftrag erfolgreich bestätigt!
					    </div>';

					    //Transaktionsvorgang wird gestartet
					    //alten Kontostand der Firma holen
					    $sql = "SELECT * FROM company_information_table WHERE id=$job_scompanyID";
					    $result = $conn->query($sql);
					    if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
							    $tra_comp_bank_balance = $row["bank_balance"];
						    }
					    } else {
						    die("receiver doesn't exist");
					    }
					    $tra_comp_bank_balance_conv = floatval($tra_comp_bank_balance);
					    //Berechnung des Gewinnes der Firma durch die Tour
					    $umsatz = (int)$income - ((int)$income*0.19 )-((int)$trailer_damage*100 ); //Berechnung des Gewinnes (Abzug von Schaden und Steuern
					    $tra_comp_bank_balance_new = $tra_comp_bank_balance_conv + $umsatz; //neuer Kontostand
					    //Überweisung in DB eintragen
					    $sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status) VALUES ('$departure_comp', '$job_s_found_comp_name', '$message',$umsatz, 'sent')";
					    if ($conn->query($sql) === TRUE) {
					    } else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						    die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
					    }
					    //Kontostand der Firma aktualisieren
					    $sql = "UPDATE company_information_table SET bank_balance=$tra_comp_bank_balance_new WHERE id='$job_scompanyID'";

					    if ($conn->query($sql) === TRUE) {
					    } else {
						    echo "Error updating record: " . $conn->error;
						    die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
					    }
					    //Benachrichtigung an den Prüfer der Tour
					    $data = http_build_query(array(
						    'fu' => $username_cookie,
						    'evnt' => 'newtransaction',
						    'evntid' => '0',
						    'evbyu' => $departure_comp
					    ));
					    $context = stream_context_create(array(
						    'http' => array(
							    'method' => 'POST',
							    'header' => 'Content-Type: application/x-www-form-urlencoded',
							    'content' => $data
						    )
					    ));
					    $response = file_get_contents('http://vtc.northwestvideo.de/notifications/notify.php', false, $context);
					    if ($result === FALSE) { /* Handle error */ }
				    } else {
					    echo "Error updating record: " . $conn->error;
				    }
			    }else if ($requested_accept == "2") { //die Tour sll abgelehnt werden
				    //Aktualisierung des Tour Status
				    $sql = "UPDATE tour_table SET tour_approved=2, status='declined' WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
				    if ($conn->query($sql) === TRUE) {
					    //visuelles Feedback
					    $status = "von Spedition abgelehnt";
					    $info = '<div class="alert alert-danger" role="alert">
					    Auftrag erfolgreich abgelehnt!
					    </div>';
				    } else {
					    echo "Error updating record: " . $conn->error;
				    }
			    }
		    }
	    }
    }
}else { //Tour nicht gefunden
    echo "Error: Job not found";
	die();
}
mysqli_close($conn); //Verbindung zur DB schließen
?>
<?php
$page_now = "management/job_report
";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>VTCMInterface</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
  <style>

.map-container{
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}
.map-container iframe{
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" target="_blank">
          <strong class="blue-text">VTCMI</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Übersicht
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/">Fahrtenbuch</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="connected-accounts">Verknüpfungen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/">Einstellungen</a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                target="_blank">
                <i class="fab fa-github mr-2"></i>MDB GitHub
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <?php
    include 'php/sidebar.php';?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Homepage</a>
            <span>/</span>
            <span>Fracht</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">
              <p>Test</p>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <div class="card-header text-center">
                Die Letzten 5 touren
              </div>
              <!-- Add Last 5 Tours -->
              <!-- Screen: https://cdn.discordapp.com/attachments/669997960829993032/671049813894234112/unknown.png -->
              <!-- List group links -->
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect">Bla</a>
                <a class="list-group-item list-group-item-action waves-effect">Bla</a>
                <a class="list-group-item list-group-item-action waves-effect">Bla</a>
                <a class="list-group-item list-group-item-action waves-effect">Bla</a>
                <a class="list-group-item list-group-item-action waves-effect">Bla</a>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download
        MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> NorthWestMedia </a>
    </div>
    <!--/.Copyright-->

  </footer>
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
