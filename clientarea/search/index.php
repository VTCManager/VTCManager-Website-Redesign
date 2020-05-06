<?php
$page_now_navbar = "clientarea/search";
include '../get_user_data.php';
?>
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
  <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
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

    <!-- Navbar -->
    <?php include '../php/navbar.php' ?>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5" style="padding-left: 10px;padding-right: 10px;">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/clientarea">Dashboard</a>
            <span>/</span>
            <span>Suche</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card-->
        <div class="card" style="width:100%;">

          <!--Card content-->
          <div class="card-body elegant-color white-text" style="width:100%;">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#user" role="tab" aria-controls="home" aria-selected="true">Benutzer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#company" role="tab" aria-controls="profile" aria-selected="false">Firma</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <br>
              <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user">
                <form action="user" name="createnewrankForm" id="createnewrankForm">
                  <input class="form-control" type="text" name="name" id="user_search_field" placeholder="Nach Benutzer suchen..." aria-label="Search">
                  <button type="submit" class="btn btn-primary">Öffnen</button>
                </form>
              </div>
              <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company">
                <form action="company" name="createnewrankForm" id="createnewrankForm">
                  <input class="form-control" type="text" name="name" id="company_search_field" placeholder="Nach Firma suchen..." aria-label="Search">
                  <button type="submit" class="btn btn-primary">Öffnen</button>
                </form>
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
  <!-- jQuery UI library -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
    $(function() {
      $("#user_search_field").autocomplete({
        source: "user_search.php",
        select: function(event, ui) {
          event.preventDefault();
          $("#user_search_field").val(ui.item.id);
        }
      });
    });
  </script>
  <script>
    $(function() {
      $("#company_search_field").autocomplete({
        source: "company_search.php",
        select: function(event, ui) {
          event.preventDefault();
          $("#company_search_field").val(ui.item.id);
        }
      });
    });
  </script>

</body>

</html>