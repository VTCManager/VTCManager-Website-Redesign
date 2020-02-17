<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/logbook";
//Connect and Check
include '../../../basis_files/php/get_user_data.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="/clientarea/management/img/favicon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="/clientarea/management/img/apple-icon.png">
  <title>VTCMInterface</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <script>$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});</script>
  <script>
function delete_entry(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var res = save_val.split(",");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
			
	};
	xmlhttp.open("GET", "delete_entry.php?tour_id="+res[1]+"&username="+res[0], true);
	xmlhttp.send();
	window.location.reload();
}
</script>
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
  <style>.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(/clientarea/management/img/loader.gif) center no-repeat;
}
</style>

<body class="grey lighten-3">
  <div class="se-pre-con"></div>

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php
    include '../php/navbar.php';?>
    <!-- Navbar -->

    <!-- Sidebar -->
    <?php
    include '../php/sidebar.php';?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <?php //Lade Tour Prüfungs Fenster nur wenn User Berechtigung zum Bearbeiten des Logbuches hat
  if($EditLogbook == "1") { ?>
  <div class="modal fade" id="tourcheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" id="TourCheckTitle">Daten werden abgerufen...</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3" style="display:none;" id="TourCheckContent">
        <div class="md-form mb-5">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab" aria-controls="Allgemein"
      aria-selected="true">Allgemein</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="Abrechnung"
      aria-selected="false">Abrechnung</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#map_tab" role="tab" aria-controls="Abrechnung"
      aria-selected="false">Karte</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="map_tab" role="tabpanel" aria-labelledby="home-tab">
    <div style="height: 180px;" id="map"></div>
  </div>
  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
    <span id="departure">Startort:</span><br>
    <span id="destination">Zielort:</span><br>
    <span id="distance">Distanz:</span><br>
    <span id="cargo">Fracht:</span><br>
    <span id="weight">Frachtgewicht:</span><br>
    <span id="truck">LKW:</span><br>
    <span id="trailer_damage">Aufliegerschaden:</span><br>
    <span id="departure_time">Abfahrt:</span><br>
    <span id="destination_time">Ankunft:</span><br>
  </div>
  <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="profile-tab">
  <span style="color: green;" id="freight_value">Frachtwert:</span><br>
  <span style="color: red;" id="taxes">Steuern:</span><br>
  <span style="color: red;" id="damage_cost">Wartungskosten:</span><br>
  <span style="color: green;" id="income">Umsatz:</span><br>
  <div class="row d-flex justify-content-center">
	<div class="col-md-12 mb-4">
	<button type="button" onclick="window.location='http://vtc.northwestvideo.de/job_report?username=<?php echo $requested_user_name;?>&jobid=<?php echo $requested_job_id;?>&accpt=1';" class="btn btn-success"><i class="fas fa-check" aria-hidden="true"></i>Akzeptieren</button>
	<button type="button" onclick="window.location='http://vtc.northwestvideo.de/job_report?username=<?php echo $requested_user_name;?>&jobid=<?php echo $requested_job_id;?>&accpt=2';" class="btn btn-danger"><i class="fas fa-ban" aria-hidden="true"></i>Ablehnen</button>
	</div>
  </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
  var map = L.map('map').setView([51.505, -0.09], 13);
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoiam9zY2hpc2VydmljZSIsImEiOiJjazZwODh1MDIwcnZ6M25xcG5hNXk4N2syIn0.4SvFM1_Zm0k3_M6Tz5Jvbw'
}).addTo(map);
  L.Routing.control({
  waypoints: [
    L.latLng(57.74, 11.94),
    L.latLng(57.6792, 11.949)
  ]
}).addTo(map);</script>
</head>
<script>
function load_tourcheck(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var res = save_val.split(",");
  console.log(res[1]+res[0]);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    console.log(xmlhttp.response);
    var response = this.responseText;
    var myObj = JSON.parse(response);
    if(myObj != "") {
    user_count = myObj.length;
    }
    document.getElementById("TourCheckTitle").innerHTML="Fahrer: "+myObj[0]["username"]+"|Tour Nr."+myObj[0]["tour_id"];
    document.getElementById("departure").innerHTML="Startort: "+myObj[0]["departure"]+"|"+myObj[0]["depature_company"];
    document.getElementById("destination").innerHTML="Zielort: "+myObj[0]["destination"]+"|"+myObj[0]["destination_company"];
    document.getElementById("cargo").innerHTML="Fracht: "+myObj[0]["cargo"];
    document.getElementById("weight").innerHTML="Frachtgewicht: "+myObj[0]["cargo_weight"];
    document.getElementById("truck").innerHTML="LKW: "+myObj[0]["truck_manufacturer"]+" "+myObj[0]["truck_model"];
    var trailer_damage = parseInt(myObj[0]["trailer_damage"]);
    document.getElementById("trailer_damage").innerHTML="Aufliegerschaden: "+trailer_damage;
    document.getElementById("departure_time").innerHTML="Abfahrt: "+myObj[0]["tour_date"];
    document.getElementById("distance").innerHTML="Distanz: "+myObj[0]["distance"]+"km";
    var income = parseInt(myObj[0]["money_earned"]);
    var taxes = income*0.20;
    var damage_cost = trailer_damage*100;
    var real_income = income-taxes-damage_cost;
    document.getElementById("freight_value").innerHTML="Frachtwert: "+income.toFixed(2)+"€";
    document.getElementById("taxes").innerHTML="Steuern: "+taxes.toFixed(2)+"€";
    document.getElementById("damage_cost").innerHTML="Wartungskosten: "+damage_cost.toFixed(2)+"€";
    document.getElementById("income").innerHTML="Umsatz: "+real_income.toFixed(2)+"€";
	};
	xmlhttp.open("GET", "get_tour.php?tour_id="+res[1]+"&username="+res[0], true);
	xmlhttp.send();
  document.getElementById("TourCheckContent").style.display="block";
}
</script>
<?php }?>
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Dashboard</a>
            <span>/</span>
            <span>Fahrtenbuch</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <div class="card-header text-center">
                Fahrtenbuch von <?php echo $user_company_name; ?>
              </div>
              <!-- List group links -->
              <div class="list-group list-group-flush">
                <div class="vertical-scroll">
            <table class="table">
                <thead>
                    <tr>
						<td>Fahrer</td>
                        <td>Fracht</td>
                        <td>Von</td>
                        <td>Nach</td>
                        <td>Verdienst</td>
                        <td>LKW</td>
                        <td>Datum</td>
                        <td>Status</td>
						<td></td>
						<td></td>
						<td></td>
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_data.php'; //Lade Aufträge?>                  
                </tbody>
            </table>
        </div>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php
    include '../php/footer.php';?>
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
