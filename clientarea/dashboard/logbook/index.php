<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/logbook";
//Connect and Check
include '../../get_user_data.php';
if (isset($_GET["page"])) {
  $page  = $_GET["page"];
} else {
  $page = 1;
};
$results_per_page = 20;
$start_from = ($page - 1) * $results_per_page;

if (isset($_POST['jobID']) && isset($_POST['driverUserName']) && isset($_POST['command']) && !empty($_POST['jobID']) && !empty($_POST['driverUserName']) && !empty($_POST['command'])) {
  $sql = "SELECT * FROM tour_table WHERE tour_id=" . $_POST['jobID'] . " AND username='" . $_POST['driverUserName'] . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $income = $row["money_earned"];
      $trailer_damage = $row["trailer_damage"];
      $departure_comp = $row["depature_company"];
      $tour_approved = $row["tour_approved"];
    }
  }
  if ($tour_approved == "0") {
    //mysql escape
    $jobID = $conn->real_escape_string($_POST['jobID']);
    $driverUserName = $conn->real_escape_string($_POST['driverUserName']);
    if ($_POST['command'] == "accept") {
      //execute tour accept
      //Tourdaten aktualisieren
      $sql = "UPDATE tour_table SET tour_approved=1, status='accepted' WHERE tour_id=" . $jobID . " AND username='" . $driverUserName . "'";
      if ($conn->query($sql) === TRUE) {
        //setze visuelles Feedback
        $info = '<div class="alert alert-success alert-dismissible fade show" role="alert">Tour erfolgreich bestätigt!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        //Transaktionsvorgang wird gestartet
        //alten Kontostand der Firma holen
        $sql = "SELECT * FROM company_information_table WHERE id=$user_company_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $tra_comp_bank_balance = $row["bank_balance"];
          }
        } else {
          $info = '<div class="alert alert-danger" role="alert">Fehler bei der Tourbestätigung: Fehlercode: Company Not Found 1001</div>';
        }
        $tra_comp_bank_balance_conv = floatval($tra_comp_bank_balance);
        //Berechnung des Gewinnes der Firma durch die Tour
        $umsatz = (int) $income - ((int) $income * 0.19) - ((int) $trailer_damage * 100); //Berechnung des Gewinnes (Abzug von Schaden und Steuern
        $tra_comp_bank_balance_new = $tra_comp_bank_balance_conv + $umsatz; //neuer Kontostand
        //Überweisung in DB eintragen
        $sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status) VALUES ('$departure_comp', '$user_company_name', 'Tour Einnahmen',$umsatz, 'sent')";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
        }
        //Kontostand der Firma aktualisieren
        $sql = "UPDATE company_information_table SET bank_balance=$tra_comp_bank_balance_new WHERE id='$user_company_id'";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error updating record: " . $conn->error;
          die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
        }
      }
    } else if ($_POST['command'] == "decline") {
      //die Tour sll abgelehnt werden
      //Aktualisierung des Tour Status
      $sql = "UPDATE tour_table SET tour_approved=2, status='declined' WHERE tour_id=" . $_POST['jobID'] . " AND username='" . $driverUserName . "'";
      if ($conn->query($sql) === TRUE) {
        //visuelles Feedback
        $info = '<div class="alert alert-success alert-dismissible fade show" role="alert">Tour erfolgreich abgelehnt!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
  } else {
    $info = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Diese Tour wurde bereits geprüft!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../../head.php' ?>
  <script>
    function delete_entry(elmnt) {
      var save_val = $(elmnt).attr("data-id");
      var res = save_val.split(",");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.response == "OK") {
          document.getElementById(save_val).style.display = "none";
        }
      };
      xmlhttp.open("POST", "delete_entry.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("tour_id=" + res[1] + "&username=" + res[0]);
    }
  </script>
  <style>
    .tour_url:hover {
      color: #007bff;
    }

    table.table a {
      color: white;
    }
  </style>

<body class="elegant-color-dark">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php
    include '../../php/navbar.php'; ?>
    <!-- Navbar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <?php include 'modals/tour_view.php'; ?>
  </head>
  <main class="pt-5 mx-lg-5" style="padding-left: 10px;padding-right: 10px;">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/clientarea/">Dashboard</a>
            <span>/</span>
            <span>Fahrtenbuch</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <?php echo $info; ?>

      <!--Card-->
      <div class="card mb-4">

        <!--Card content-->
        <div class="card-body elegant-color white-text">

          <div class="card-header unique-color white-text text-center">
            Fahrtenbuch von <?php echo $username_cookie; ?>
          </div>
          <!-- List group links -->
          <div class="list-group list-group-flush">
            <div class="vertical-scroll">
              <table class="table white-text">
                <thead>
                  <tr>
                    <td>Fracht</td>
                    <td>Von</td>
                    <td>Nach</td>
                    <td>Verdienst</td>
                    <td>LKW</td>
                    <td>Datum</td>
                    <td>Status</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody class="white-text">
                  <?php include 'load_data.php'; //Lade Aufträge
                  ?>
                </tbody>
              </table>
              <div class="text-center">
                <?php
                $sql = "SELECT COUNT(tour_date) AS total FROM tour_table WHERE username='$username_cookie'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

                for ($i = 1; $i <= $total_pages; $i++) {  // print links for all pages
                  echo "<a href='index.php?page=" . $i . "'";
                  if ($i == $page)  echo " style='color:grey;'";
                  echo ">" . $i . "</a> ";
                };
                ?>
              </div>
            </div>
          </div>
          <!-- List group links -->

        </div>

      </div>
      <!--/.Card-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php
  include '../../php/footer.php'; ?>
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