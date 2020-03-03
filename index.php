<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="/media/images/favicon.png" type="image/x-icon">
  <meta name="theme-color" content="rgba(0, 255, 229, 1)">
  <title>VTCManager</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="home/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="home/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="home/css/style.min.css" rel="stylesheet">
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand">
        <img src="/media/images/favicon.png" height="30">
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
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="team" target="_blank">Team</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.instagram.com/tnwm_group/" class="nav-link" target="_blank">
              <i class="fab fa-instagram"></i>
              </a>
          </li>
          <li class="nav-item">
            <a href="https://twitter.com/TNWM_group" class="nav-link" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="/account/login" class="nav-link border border-light rounded">
              <?php if(!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) {?>
              <i class="fas fa-sign-in-alt mr-2"></i>Anmelden
              <?php }else{ ?>
                <i class="fas fa-sign-in-alt mr-2"></i>Öffnen
                <?php } ?>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('/media/images/highway-w-trucks.png'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Speditionsverwaltung neu definiert.</strong>
              </h1>

              <p>
                <strong>Funktionsreiches und modern gestalltes Verwaltungssystem.</strong>
              </p>
              <?php if(!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) {?>
              <a target="_blank" href="/account/register" class="btn btn-outline-white btn-lg">Registrieren
              <?php }else{?>
                <a target="_blank" href="/account/login" class="btn btn-outline-white btn-lg">Öffnen
                <?php } ?>
                <i class="fas fa-sign-in-alt ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('/media/images/white-truck-on-black-road-1003868.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Speditionsverwaltung neu definiert.</strong>
              </h1>

              <p>
                <strong>Funktionsreiches und modern gestalltes Verwaltungssystem.</strong>
              </p>

              <?php if(!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) {?>
              <a target="_blank" href="/account/register" class="btn btn-outline-white btn-lg">Registrieren
              <?php }else{?>
                <a target="_blank" href="/account/login" class="btn btn-outline-white btn-lg">Öffnen
                <?php } ?>
                <i class="fas fa-sign-in-alt ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('/media/images/building-business-ceiling-empty-209251.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Speditionsverwaltung neu definiert.</strong>
              </h1>

              <p>
                <strong>Funktionsreiches und modern gestalltes Verwaltungssystem.</strong>
              </p>

              <?php if(!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) {?>
              <a target="_blank" href="/account/register" class="btn btn-outline-white btn-lg">Registrieren
              <?php }else{?>
                <a target="_blank" href="/account/login" class="btn btn-outline-white btn-lg">Öffnen
                <?php } ?>
                <i class="fas fa-sign-in-alt ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <img src="media/vtcminterface-screenshot.png" class="img-fluid z-depth-1-half"
              alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">Maximale Kontrolle und Übersicht über dein Unternehmen</h3>
            <p>Mit unserem eigens entwickelten Interface hast du immer die aktuellsten Informationen und Statistiken auf einen Blick</p>
            <!-- Main heading -->

            <hr>
            <!-- CTA -->
            <?php if(!isset($_COOKIE['authWebToken']) && !isset($_COOKIE['username'])) {?>
            <a href="/account/register" class="btn btn-grey btn-md">Registrieren
              <i class="fas fa-sign-in-alt ml-1"></i>
            </a>
            <a href="/account/login" class="btn btn-grey btn-md">Anmelden
              <i class="fas fa-sign-in-alt ml-1"></i>
            </a>
            <?php }else{ ?>
              <a href="/account/login" class="btn btn-grey btn-md">Öffnen
              <i class="fas fa-sign-in-alt ml-1"></i>
            </a>
            <?php } ?>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Main info-->

     <hr class="mb-5">

      <!--Section: More-->
      <section>

        <h2 class="my-5 h3 text-center">...und noch viel mehr</h2>

        <!--First row-->
        <div class="row features-small mt-5 wow fadeIn">

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-moon fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2 pl-3">
                <h5 class="feature-title font-bold mb-1">DarkMode</h5>
                <p class="grey-text mt-2">Nichts blendet dich mehr. Für angenehmere Nachtfahrten und -arbeit.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-chart-line fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Statistiken</h5>
                <p class="grey-text mt-2">Detailierte Statistiken, die die Optimierung deiner Firma so viel mehr erleichtern.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-users fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Aktive Community</h5>
                <p class="grey-text mt-2">Fahre nicht mehr alleine. Du findest immer jemanden.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Regelmäßige Updates</h5>
                <p class="grey-text mt-2">Unser großartiges Team entwickelt, codiert und designed rund um die Uhr.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

        </div>
        <!--/First row-->

        <!--Second row-->
        <div class="row features-small mt-4 wow fadeIn">

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-truck fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Offizieller InfiniteTruckersMultiPlayer-Partner</h5>
                <p class="grey-text mt-2">Wir sind ein Partner von IFMP und bieten zahlreiche Optimierungen und Anpassungen für den MultiPlayer an.</p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-calendar-check fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Events</h5>
                <p class="grey-text mt-2">Plane und finde Events so einfach wie niemals zuvor.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-truck-loading fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Echtzeit Fracht-Kreisläufe (demnächst)</h5>
                <p class="grey-text mt-2">Reale Frachtkreisläufe, realistische Disponentenplanung.</p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-shield-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">Für Konvoi-Sicherheitsfirmen (demnächst)</h5>
                <p class="grey-text mt-2">Eine herausragende Planung. Für dich und dein gesamtes Team.</p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

        </div>
        <!--/Second row-->

      </section>
      <!--Section: More-->
      <hr class="my-5">

      <!--Section: Main features & Quick Start-->
      <section>

        <h3 class="h3 text-center mb-5">VTConnect</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-lg-6 col-md-12 px-4">

            <!--First row-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-users fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Multiplayer Kompatibilität</h5>
                <p class="grey-text">Unser Fahrtenerkennungstool ist mit jedem Multiplayer kompatibel und zeigt aktuelle Verkehrsinformationen an.</p>
              </div>
            </div>
            <!--/First row-->

            <div style="height:30px"></div>

            <!--Second row-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-couch fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Maximaler Komfort</h5>
                <p class="grey-text">Tragen deine Touren niemals mehr selber ein. Wir erledigen das!
                </p>
              </div>
            </div>
            <!--/Second row-->

            <div style="height:30px"></div>

            <!--Third row-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-file-code fa-2x cyan-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Ständige Entwicklung</h5>
                <p class="grey-text">Wir veröffentlichen regelmäßig Updates. Sei gespannt auf neue Funktionen, die du noch nie gesehen hast!</p>
              </div>
            </div>
            <!--/Third row-->

          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-12">

            <p class="h5 text-center mb-4">VTConnect - Automatische Tourenerkennung</p>
              <img src="media/vtcmanager-beta-client.jpg" class="img-fluid z-depth-1-half"
              alt="">
          </div>
          <!--/Grid column-->

        </div>
        <!--/Grid row-->

      </section>
      <!--Section: Main features & Quick Start-->

      <hr class="my-5">

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small unique-color-dark mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="/account/login"
        role="button">Download
        <i class="fas fa-download ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.instagram.com/tnwm_group/" target="_blank">
        <i class="fab fa-instagram mr-3"></i>
      </a>

      <a href="https://twitter.com/TNWM_group" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://github.com/TheNorthWestMediaGroup" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="https://northwestvideo.de" target="_blank"> TheNorthWestMedia Group </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="home/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="home/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="home/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="home/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
