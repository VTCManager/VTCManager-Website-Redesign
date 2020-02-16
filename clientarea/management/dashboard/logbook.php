<?php
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/logbook";
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
</head>

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
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
    <span id="departure">Startort:</span><br>
    <span id="destination">Zielort:</span><br>
  </div>
  <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie
    locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
    blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
    Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
    PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
    salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
    sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
    stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" onclick="checkIFMPuser()" id="TourStatusSend" style="display:none;">Verknüpfen</button>
        <button class="btn btn-default" id="TourStatusLoading" style="display:block;" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			Laden...
			</button>
      </div>
    </div>
  </div>
</div>
</div>
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
			
	};
	xmlhttp.open("GET", "get_tour.php?tour_id="+res[1]+"&username="+res[0], true);
	xmlhttp.send();
  document.getElementById("TourStatusLoading").style.display="none";
  document.getElementById("TourStatusSend").style.display="block";
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
					<?php include 'load_data.php'; ?>                  
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
