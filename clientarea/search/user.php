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
            <span>User-Profile</span>
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
            $requested_user_name = $_POST['username'];
            if (empty($requested_user_name)) {
              $requested_user_name = $username_cookie;
            }

            $sql = "SELECT * FROM user_data WHERE username='$requested_user_name'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                date_default_timezone_set("+1");
                $requested_user_id = $row["userID"];
                $username_search = $row["username"];
                $userCompanyID_search = $row["userCompanyID"];
                $profile_pic_url_search = $row["profile_pic_url"];
                $rank_search = $row["rank"];
                $staff_role_search = $row["staff_role"];
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
              <h2 style="margin-left: 90px;"><?php echo $username_search; ?><?php if ($staff_role_search != "") { ?> |<a style="color:red;">
                  <?php echo $staff_role_search; ?></a>
              <?php } ?></h2>
              <p><?php echo $last_seen_search; ?></p>
              <hr>
              <h4>Über mich:</h4>
              <p>
                <?php
                echo file_get_contents("https://media.northwestvideo.de/media/articles/profil_about_me/" . $userCompanyID_search . '.txt');
                ?>
              </p>
              <hr>
              <h4>Information</h4>
              <p><i class="fa fa-briefcase"></i> <?php echo $company_txt_search; ?></p>
              <p><i class="fas fa-calendar-check"></i> registriert seit <?php echo $created_date_search; ?>
              </p>
            <?php
            } else {
              echo "Error: User not found";
              die();
            }
            ?>
            <br>
            <br>
            <div style="max-width: 70%;">
              <div class="text-center">
                <h2>Lebenslauf</h2>
              </div>
              <table class="table white-text" style="max-height: 150px !important; overflow: auto !important;">
                <thead>
                  <tr>
                    <td>von</td>
                    <td>bis</td>
                    <td></td>
                  </tr>
                </thead>

                <tbody>




                  <?php
                  $sql = "SELECT * FROM career_table WHERE userID=$requested_user_id ORDER BY start_date DESC";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $atCompanyID_search = $row["atCompanyID"];
                      $career_job_search = $row["job"];
                      $start_date_search = $row["start_date"];
                      $end_date_search = $row["end_date"];
                      $sql = "SELECT name FROM company_information_table WHERE id=$atCompanyID_search";
                      $result2 = $conn->query($sql);
                      if ($result2->num_rows > 0) {
                        // output data of each row
                        while ($row = $result2->fetch_assoc()) {
                          $atCompanyname_search_2 = $row["name"];
                        }
                      }
                      if ($career_job_search == "owner") {
                        $career_job_search = "selbstständig bei $atCompanyname_search_2";
                      } else if ($career_job_search == "driver") {
                        $career_job_search = "Fahrer bei $atCompanyname_search_2";
                      } else {
                        $career_job_search = "$career_job_search bei $atCompanyname_search_2";
                      }
                      $start_date_search = date('d.m.Y', strtotime($start_date_search));
                      $end_date_search_conv = date('d.m.Y', strtotime($end_date_search));
                      if ($end_date_search_conv == "30.11.-0001") {
                        $end_date_search = "heute";
                      } else {
                        $end_date_search = $end_date_search_conv;
                      }

                      echo '<tr><td>' . $start_date_search . '</td><td>' . $end_date_search . '</td><td>' . $career_job_search . '</td></tr>';
                    }
                  }
                  $conn->close();
                  ?>
                </tbody>
              </table>
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

</body>

</html>