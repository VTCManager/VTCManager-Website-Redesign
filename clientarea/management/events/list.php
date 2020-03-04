<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "management/events";
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
    <p class="h2">aktuelle Version: 0.0.5 Alpha Build<p>
      <p class="h2 lead">Changelog Version 0.0.5 Alpha Build</p><br>
    <ul>
      <li>Touren können abgelehnt werden</li>
      <li>Footer auf der HP hinzugefügt</li>
      <li>Angemeldete Benutzer können über HP direkt auf Interface zugreifen ohne erneutes LogIn</li>
    </ul>
    
    <hr>
      <p class="h2 lead">Changelog Version 0.0.4 Alpha Build</p><br>
    <ul>
      <li>Lade-Animation entfernt (störend, da die Webseite schnell lädt)</li>
      <li>Sidebar DarkMode Fehler behoben</li>
      <li>Map an DarkMode angepasst</li>
      <li>Homepage an Projektinformationen angepasst</li>
    </ul>
    
    <hr>
      <p class="h2 lead">Changelog Version 0.0.3 Alpha Build</p><br>
    <ul>
      <li>Daten werden nun aus der Benutzerfirma geladen und nicht aus der Test-Firma</li>
      <li>Liste der letzten 3 Transaktionen hinzugefügt</li>
      <li>Mitarbeitername in Mitarbeiter-Modal hinzugefügt</li>
      <li>Lade-Hintergrund angepasst</li>
      <li>API aktualisiert</li>
      <li>Verdienst in Tourenliste wird nun genauer berechnet</li>
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
            <a href="/">Homepage</a>
            <span>/</span>
            <span>Events</span>
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

            <h2>Headline</h2>
            <h5>Creator</h5>
            <p>Long Text...</p>
            <a href=""><button type="button" class="btn btn-primary">Beitreten</button></a>
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
                <a class="text-right" href="https://truckyapp.com/">powered by Trucky</a>
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
</body>

</html>
<?php 
//close DB conn
$conn->close();
?>
