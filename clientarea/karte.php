<?php
//Verbindung zu DB und Login Check
include 'get_user_data.php';
//aktuelle Seite für Sidebar
$page_now = "management/map";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php' ?>
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
    include 'php/sidebar.php'; ?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-1 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Homepage</a>
            <span>/</span>
            <span>LiveMap</span>
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
            <div class="card-body elegant-color white-text">
              <div id="map-container" class="z-depth-1-half map-container" style="height: 500px">
                <iframe src="/map/" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>

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

              <div class="card-header text-center unique-color white-text">
                <?php include 'php/tmp-api.php'; //lade Onlinespieler
                ?>
                Verkehr Simulation 1 [<?php echo $sim1_players; ?>]
              </div>
              <!-- List group links -->
              <div class="list-group list-group-flush">
                <p>Wir haben den Verkehrsservice aufgrund von Problemen von unserem Anbieter vorübergehend deaktiviert.</p>
                <?php include 'php/truckyapi.php'; //lade Verkehrsdaten
                ?>
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
  <?php include 'php/footer.php'; ?>
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