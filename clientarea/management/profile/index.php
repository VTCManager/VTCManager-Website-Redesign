<?php
$page_now = "management/profile";
include '../get_user_data.php';


$sql = "SELECT * FROM company_information_table WHERE id=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $founded_date = $row["founded_date"];
    $driven_km = $row["driven_km"];
    $rank_route = $row["rank_route"];
    $rank_money = $row["rank_money"];
    $Company_avatar = $row["company_pic_url"];
    $discord_url = $row["discord_url"];
    $website_url = $row["website_url"];
    $teamspeak_url = $row["teamspeak_url"];
  }
} else {
  echo "Error: Company not found";
  die();
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $employees = $result->num_rows;
} else {
}
$sql = "SELECT * FROM tour_table WHERE companyID=$user_company_id AND status='accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $tours_done = $result->num_rows;
} else {
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$user_company_id AND rank='owner'";
$result = $conn->query($sql);
$owners = array();
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $name_owner_comp = $row["username"];
    array_push($owners, $name_owner_comp);
  }
} else {
}
$founded_date = date('d.m.Y', strtotime($founded_date));
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <?php include '../../head.php'; ?>
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
              <a class="nav-link waves-effect" href="/clientarea/management/dashboard/employees">Mitarbeiter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="/clientarea/management/profile/jobs">Jobs</a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://www.instagram.com/tnwm_group/" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://twitter.com/TNWM_group" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="/account/logout" class="nav-link border border-light rounded waves-effect">
                <i class="fas fa-sign-out-alt mr-2"></i>Abmelden
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
            <a href="/clientarea/management/">Spedition</a>
            <span>/</span>
            <span>Profil</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card-->
        <div class="card" style="width:100%;">

          <!--Card content-->
          <div class="card-body elegant-color white-text" style="width:100%;">
            <img src="<?php echo $Company_avatar; ?>" class="rounded float-left" style="height: 80px;width: 80px;height: auto;">
            <?php if ($EditProfile == "1") { ?>
              <div class="float-right">
                <button type="button" class="btn btn-info" onclick="location.href = '/clientarea/management/settings/';">Bearbeiten</button>
              </div>
            <?php } ?>
            <?php if ($user_rank != "owner") { ?>
              <div class="float-right">
                <button type="button" class="btn btn-danger" onclick="location.href = 'leave';">Kündigen</button>
              </div>
            <?php } ?>
            <h1 style="margin-left: 90px;"> <?php echo $name; ?> </h1>
            <?php
            echo file_get_contents("https://media.northwestvideo.de/media/articles/company_about_us/" . $user_company_id . '.txt');
            ?>
            <hr>
            <h3><i class="fas fa-info-circle"></i> Informationen</h3>
            <p>
              <i class="fas fa-calendar-alt"></i> Gegründet am: <?php echo $founded_date; ?> <br>
              <i class="fas fa-user"></i> Geschäftsführung: <?php foreach ($owners as $value) {
                                                              $owners_string = $owners_string . $value . ", ";
                                                            }
                                                            $owners_string = substr($owners_string, 0, -2);
                                                            echo $owners_string;
                                                            ?><br>
              <i class="fas fa-users"></i> Mitarbeiter: <?php echo $employees; ?> <br>
              <i class="fas fa-truck-loading"></i> abgeschlossene Touren: <?php echo $tours_done; ?> <br>
              <!--<i class="fas fa-road"></i> zurückgelegte Strecke: <?php echo $driven_km; ?> km<br>-->
              <!--<i class="fas fa-trophy"></i> Rang(Strecke): <?php echo $rank_route; ?> <br>-->
              <!--<i class="fas fa-trophy"></i> Rang(Kapital): <?php echo $rank_money; ?> <br>-->
              <hr>
              <h3>Kontakt</h3>
              <?php if ($discord_url != "") { ?>
                <button type="button" class="btn btn-info" onclick="window.location='<?php echo $discord_url; ?>';"><i class="fab fa-discord pr-2" aria-hidden="true"></i> Discord </button>
              <?php }
              if ($teamspeak_url != "") { ?>
                <button type="button" class="btn btn-info" onclick="window.location='<?php echo $teamspeak_url; ?>';"><i class="fab fa-teamspeak pr-2" aria-hidden="true"></i> Teamspeak </button>
              <?php }
              if ($website_url != "") { ?>
                <button type="button" class="btn btn-info" onclick="window.location='<?php echo $website_url; ?>';"><i class="fas fa-desktop pr-2" aria-hidden="true"></i> Webseite </button>
              <?php } ?>
            </p>

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