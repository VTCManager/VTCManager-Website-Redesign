<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/index";
//Connect and Check
include '../get_user_data.php';
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
	background: url(../img/loader.gif) center no-repeat white;
}
</style>
<script>
  window.setInterval(function(){
  var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = this.responseText;
          var myObj = JSON.parse(response);

            if(myObj != "") {
              const myNode = document.getElementById("traffic_list");
              myNode.innerHTML = '';
                user_count = myObj["response"].length;
                for (var a in myObj["response"]) {
                  var para = document.createElement("P");   
                  if(myObj["response"][a]["severity"] == 'Heavy' || myObj["response"][a]["severity"] == 'Congested'){
                    para.innerHTML = myObj["response"][a]["name"]+' <span class="badge badge-danger badge-pill pull-right">'+myObj["response"][a]["players"]+'</span>'; 
                  }else if (myObj["response"][a]["severity"] == 'Moderate'){
                    para.innerHTML = myObj["response"][a]["name"]+' <span class="badge badge-warning badge-pill pull-right">'+myObj["response"][a]["players"]+'</span>'; 
                  }else{
                    para.innerHTML = myObj["response"][a]["name"]+' <span class="badge badge-primary badge-pill pull-right">'+myObj["response"][a]["players"]+'</span>'; 
                    }
                  para.className = 'list-group-item list-group-item-action waves-effect elegant-color white-text';
                  document.getElementById("traffic_list").appendChild(para); 
                };
                var para2 = document.createElement("A");
                para2.innerHTML = 'powered by Trucky';
                para2.className = 'text-right';
                para2.href = 'https://truckyapp.com/';
                document.getElementById("traffic_list").appendChild(para2); 
            } else {
            };
				}
			};
			xhttp.open("GET", "https://api.truckyapp.com/v2/traffic/top?server=sim1&game=ets2", true);
			xhttp.send();
      var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = this.responseText;
          var myObj = JSON.parse(response);

            if(myObj != "") {
              const myNode = document.getElementById("traffic_label");
              myNode.innerHTML = 'Verkehr Sim 1 ['+myObj["response"][0]["players"]+' / '+myObj["response"][0]["maxplayers"]+']';
            } else {
            };
				}
			};
			xhttp.open("GET", "https://api.truckersmp.com/v2/servers", true);
			xhttp.send();
}, 10000);
</script>
</head>

<body class="elegant-color-dark">
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
<div class="modal fade" id="viewchangelog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content elegant-color white-text">
      <div class="modal-header text-center unique-color white-text">
        <h4 class="modal-title w-100 font-weight-bold">Changelog</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 elegant-color white-text">
        <div class="md-form mb-5">
          <ul class="nav nav-tabs elegant-color white-text" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#webinterface" role="tab" aria-controls="WebInterface"
      aria-selected="true">WebInterface</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#client" role="tab" aria-controls="Client"
      aria-selected="true">Client</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="webinterface" role="tabpanel" aria-labelledby="home-tab">
    <p class="h2">aktuelle Version: 0.0.3 Alpha Build<p>
      <p class="h2 lead">Changelog Version 0.0.3 Alpha Build</p><br>
    <ul>
      <li>Daten werden nun aus der Benutzerfirma geladen und nicht aus der Test-Firma</li>
      <li>Liste der letzten 3 Transaktionen hinzugefügt</li>
    </ul>
    <hr>
    
    <p class="h2 lead">Changelog Version 0.0.2 Alpha Build</p><br>
    <ul>
      <li>Startseite weiter angepasst</li>
      <li>Bestätigung des Auftrages verbessert (POST-Anfrage)</li>
      <li>Aufträge können nun bestätigt werden mit visuellem Feedback</li>
    </ul>
    
    <hr>
    <p class="h2 lead">Changelog Version 0.0.1 Alpha Build</p><br>
    <ul>
      <li>Unterscheidung beim Onlinestatus zwischen VTConnect und VTCMInterface</li>
      <li>Changelog hinzugefügt</li>
      <li>Tourlistenverteilung hinzugefügt</li>
    </ul>
    
    <hr>
  </div>
  <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="home-tab">
    <h2>Noch nicht verfügbar</h2>
  </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Homepage</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" style="margin:.0rem;" data-target="#viewchangelog">Changelog</button>
          </div>
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
            <div class="card-body elegant-color white-text">

              <canvas id="incomechart"></canvas>

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
            <div class="card-body elegant-color white-text">

              <div class="card-header text-center unique-color white-text" id="traffic_label">
                <?php include '../php/tmp-api.php';//load Server Stats?>
                Verkehr Sim 1 [<?php echo $sim1_players;?>]
              </div>
              <!-- List group links -->
              <div class="list-group list-group-flush" id="traffic_list">
                <?php include '../php/truckyapi.php';//load Top Traffic?>
                <a class="text-right" href="https://truckyapp.com/">powered by Trucky<a/>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <div class="card-header unique-color white-text">Die letzten 3 Touren</div>
            <!--Card content-->
            <div class="card-body elegant-color white-text">


              <!-- Table  -->
              <table class="table table-hover">
                <!-- Table head -->
                <thead class="stylish-color-dark white-text">
                  <tr>
                    <th>Startort</th>
                    <th>Zielort</th>
                    <th>Fracht</th>
                    <th>Fahrer</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody class="white-text">
                  <?php include '../php/get_latest_tours.php'; //hole die letzten Touren?>

                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">
            
            <!-- Card header -->
            <div class="card-header unique-color white-text">Die letzten 3 Transaktionen</div>

            <!--Card content-->
            <div class="card-body elegant-color white-text">

              <!-- Table  -->
              <table class="table table-hover">
                <!-- Table head -->
                <thead class="stylish-color-dark white-text">
                  <tr>
                    <th>Absender</th>
                    <th>Empfänger</th>
                    <th>Betrag</th>
                    <th>Nachricht</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody class="white-text">
                <?php include '../php/get_latest_transactions.php';?>
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header unique-color white-text">Touren Diagramm</div>

            <!--Card content-->
            <div class="card-body elegant-color white-text">

              <canvas id="lineChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header unique-color white-text">Fracht Diagramm</div>

            <!--Card content-->
            <div class="card-body elegant-color white-text">

              <canvas id="freightchart"></canvas>

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
  <?php
    include '../php/footer.php'; //Footer laden?>
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

  <!-- Charts -->
  <script>

    // Line
    var categories2 = new Array(0);
    var counts2 = new Array(0);
    var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = this.responseText;
          var myObj = JSON.parse(response);

            if(myObj != "") {

                user_count = myObj.length;
                for (var a in myObj) {
                  categories2.push("KW"+myObj[a]["week"]);
                  counts2.push(myObj[a]["amount"]);
                };
    var ctx = document.getElementById("incomechart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [categories2[0], categories2[1], categories2[2], categories2[3], categories2[4]],
        datasets: [{
          label: 'Umsatz in €',
          data: [counts2[0], counts2[1], counts2[2], counts2[3], counts2[4]],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
            } else {
            };
				}
			};
			xhttp.open("GET", "../php/get_earned_money.php", true);
			xhttp.send();


    //line
    var categories3 = new Array(0);
    var counts3 = new Array(0);
    var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = this.responseText;
          var myObj = JSON.parse(response);

            if(myObj != "") {

                user_count = myObj.length;
                for (var a in myObj) {
                  categories3.push("KW"+myObj[a]["week"]);
                  counts3.push(myObj[a]["count"]);
                };
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: [categories3[0], categories3[1], categories3[2], categories3[3], categories3[4]],
        datasets: [{
            label: "Gefahrene Touren",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [counts3[0], counts3[1], counts3[2], counts3[3], counts3[4]]
          }
        ]
      },
      options: {
        responsive: true
      }
    });
            } else {
            };
				}
			};
			xhttp.open("GET", "../php/get_tours.php", true);
			xhttp.send();


    //doughnut
    var categories = new Array(0);
    var counts = new Array(0);
    var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var response = this.responseText;
          var myObj = JSON.parse(response);

            if(myObj != "") {

                user_count = myObj.length;
                for (var a in myObj) {
                  categories.push(myObj[a]["cargo"]+" ("+myObj[a]["num"]+")");
                  counts.push(myObj[a]["num"]);
                };
                var ctxD = document.getElementById("freightchart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: [categories[0], categories[1], categories[2], categories[3], categories[4]],
        datasets: [{
          data: [counts[0], counts[1], counts[2], counts[3], counts[4]],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });
            } else {
            };
				}
			};
			xhttp.open("GET", "../php/get_freight_data.php", true);
			xhttp.send();

  </script>
</body>

</html>
<?php 
//close DB conn
$conn->close();
?>
