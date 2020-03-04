<?php $current_page = "team"; 
include 'home/connect_mysql.php';?>
<!DOCTYPE html>
<html lang="de">

<head>
  <?php include 'home/head.php'; ?>
  <title>Team - VTCManager</title>
</head>

<body class="elegant-color-dark">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php include 'home/navbar.php'; ?>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body elegant-color white-text text-center">
          <a class="h4">
            VTCManager-Team
          </a>

        </div>

      </div>
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

          <!--Card-->
          <div class="card" style="width:100%;">

            <!--Card content-->
            <div class="card-body elegant-color white-text" style="width:100%;">
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(233, 30, 99);" class="mx-auto text-center">Project Director</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3">Gründer von VTCManager. Er übernimmt wichtige Aufgabenbereiche, wie das Projekt-Managment und die Entwicklung.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <?php include 'home/team/get_project_director.php';?>
                    </div>
                </div>
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(250, 0, 0);" class="mx-auto text-center">Project Manager</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3">Zuständig für die Planung und das Managment unserer Software.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <?php include 'home/team/get_project_manager.php'; ?>
                    </div>
                </div>
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(153, 45, 34);" class="mx-auto text-center">Event / Konvoi-Manager</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3">Planung von offizielen VTCM-Events/Konvois.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <?php include 'home/team/get_event_convoy_manager.php'; ?>
                    </div>
                </div>
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(230, 126, 34)" class="mx-auto text-center">Developer</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0 role-underline">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3 role-description">Unsere Entwickler entwickeln unsere zahlreichen einzigartigen Features.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <?php include 'home/team/get_developer.php';?>
                    </div>
                </div>
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(31, 139, 76)"; class="mx-auto text-center">Supporter</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0 role-underline">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3 role-description">Unsere Supporter sind immer für dich da und helfen bei allen Fragen.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <?php include 'home/team/get_supporter.php';?>
                    </div>
                </div>
            </div>
          </div>
          <!--/.Card-->
      </div>
      </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php
    include 'home/footer.php'; //Footer laden?>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/home/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/home/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/home/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

</body>

</html>
