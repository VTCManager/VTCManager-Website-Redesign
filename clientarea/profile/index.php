<?php
$page_now = "management/profile";
include '../get_user_data.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../head.php' ?>
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" target="_blank">
          <strong class="blue-text">VTCMI</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect" target="_blank">
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
    include '../php/sidebar.php'; ?>
    <!-- Sidebar -->

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
            <span>Mein Profil</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card-->
        <div class="card" style="width:100%;">

          <!--Card content-->
          <div class="card-body elegant-color white-text" style="width:100%;">
            <?php
            date_default_timezone_set('Europe/Berlin');
            $requested_user_id = $_GET['userid'];
            if (empty($requested_user_id)) {
              $requested_user_id = $userID;
            }

            $sql = "SELECT * FROM user_data WHERE userID=$requested_user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                date_default_timezone_set("+1");
                $username_search = $row["username"];
                $userCompanyID_search = $row["userCompanyID"];
                $profile_pic_url_search = $row["profile_pic_url"];
                $rank_search = $row["rank"];
                $last_seen_search = $row["last_seen"];
                $last_seen_search = date('d.m.Y H:i', strtotime($last_seen_search));
                $last_seen_search = "zuletzt online am $last_seen_search";
                $created_date_search = $row["created_date"];

                $created_date_search = date('d.m.Y', strtotime($created_date_search));
                if ($userCompanyID_search == "0") {
                  $company_txt_search = "arbeitslos";
                } else {
                  $sql = "SELECT * FROM company_information_table WHERE id=$userCompanyID_search";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $compname = $row["name"];
                      if ($rank_search != "owner") {
                        if ($rank_search == "driver") {
                          $rank_tr = "Fahrer";
                        } else {
                          $rank_tr = $rank_search;
                        }

                        $company_txt_search = "angestellt bei $compname als $rank_tr";
                      } else {
                        $company_txt_search = "selbstständig bei " . $compname;;
                      }
                    }
                  }
                }
              }
            ?>
              <img class="rounded float-left" src="<?php echo $profile_pic_url_search; ?>" style="height: 80px;width: 80px;height: auto;">
              <h2 style="margin-left: 90px;"><?php echo $username_search; ?></h2>
              <p><?php echo $last_seen_search; ?></p>
              <h4>Information</h4>
              <p><i class="fa fa-briefcase"></i> <?php echo $company_txt_search; ?></p>
              <p><i class="fas fa-calendar-check"></i> registriert seit <?php echo $created_date_search; ?></p>
            <?php
            } else {
              echo "Error: User not found";
              die();
            }
            ?>
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

</body>

</html>