<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="/clientarea/management/img/favicon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="/clientarea/management/img/apple-icon.png">
  <title>VTCMInterface</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/home/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/home/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/home/css/style.min.css" rel="stylesheet">
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

<body class="elegant-color-dark">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar">
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
            <li class="nav-item">
              <a class="nav-link waves-effect" href="index">Home
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="team">Team</a>
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

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Homepage</a>
            <span>/</span>
            <span>Team</span>
          </h4>

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
                    <hr class="mx-auto col-md-8 m-0 role-underline">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3 role-description">Der Oberster der Ränge.</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <div class="card bg-dark text-white shadow-lg">
                        <div class="card-body">
                          <img style="height: 184px;width: 184px;" src="https://vtc.northwestvideo.de/media/profile_pictures/joschi_service.PNG">
                          <a href="#"><h4 class="text-white mt-3 mb-0 text-center">Joschi_service</h4></a>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-xl-5">
                  <div class="col-sm-12 pt-md-3">
                    <h1 style="color: rgb(250, 0, 0);" class="mx-auto text-center">Project Manager</h1>
                  </div>
                  <div class="col-sm-12 h-25 pb-0">
                    <hr class="mx-auto col-md-8 m-0 role-underline">
                  </div>
                  <div class="col-sm-12 h-25 pb-0 text-center">
                    <p class="mx-auto col-md-8 mt-md-3 role-description">Der fast Oberste der Ränge</p>
                  </div>
                    <div class="col-sm-auto m-md-5">
                      <div class="card bg-dark text-white shadow-lg">
                        <div class="card-body">
                          <img style="height: 184px;width: 184px;" src="https://image.freepik.com/vektoren-kostenlos/in-kuerze-nachricht-mit-lichtprojektor-beleuchtet_1284-3622.jpg">
                          <a href="#"><h4 class="text-white mt-3 mb-0 text-center">Thommy</h4></a>
                        </div>
                      </div>
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
    include 'clientarea/management/php/footer.php'; //Footer laden?>
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
