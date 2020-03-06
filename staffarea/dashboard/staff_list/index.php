<?php
//aktuelle Seite für Nav und Sidebar
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/employees";
//Connect and Check
include '../../get_user_data.php';
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
  <script>
function delete_entry(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var res = save_val.split(",");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    if(xmlhttp.response=="OK"){
      document.getElementById(save_val).style.display="none";
      }
	};
	xmlhttp.open("POST", "delete_entry.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("tour_id="+res[1]+"&username="+res[0]);
}
</script>
  <style>
.tour_url:hover {
color: #007bff;
}
</style>
<style>
	    .profilePicture {
    height: auto;
    border-radius: 50%;
	height: 30px;
	width: 30px;
	object-fit: contain;
}
	  </style>

<body class="elegant-color-dark">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php
    include '../../php/navbar.php';?>
    <!-- Navbar -->

    <!-- Sidebar -->
    <?php
    include '../../php/sidebar.php';?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <?php //Lade Tour Prüfungs Fenster nur wenn User Berechtigung zum Bearbeiten des Logbuches hat
  if($EditLogbook == "1") { ?>
  <div class="modal fade" id="viewemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content elegant-color white-text">
      <div class="modal-header text-center unique-color white-text">
        <h4 class="modal-title w-100 font-weight-bold" id="Employee_details_Title">Daten werden abgerufen...</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 elegant-color white-text" style="display:none;" id="TourCheckContent">
        <div class="md-form mb-5">
          <ul class="nav nav-tabs elegant-color white-text" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab" aria-controls="Allgemein"
      aria-selected="true">Allgemein</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="Allgemein"
      aria-selected="true">Bearbeiten</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#fire" role="tab" aria-controls="Allgemein"
      aria-selected="true">Kündigen</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
    <i class="fas fa-user"></i> <span id="employee_name">Name:</span><br>
    <i class="fas fa-calendar-day"></i> <span id="">Alter:</span><br>
    <i class="fas fa-user-tag"></i> <span id="employee_rank">Posten:</span><br>
    <i class="fas fa-truck-loading"></i> <span id="staff_company">Firma:</span><br>
    <hr>
  </div>
  <div class="tab-pane fade" id="fire" role="tabpanel" aria-labelledby="home-tab">
    <form action="fire_employee" method="post">
      <div class="md-form">
        <input type="hidden" id="fire_employeeID" value="" name="employeeID" />
  <textarea id="form7" name="reason" class="md-textarea form-control" rows="3" maxlength="250" required></textarea>
  <label for="form7">Kündigungsgrund</label>
</div>
<div class="d-flex justify-content-center">
        <button class="btn btn-danger">Kündigen</button>
      </div>
      </form>
  </div>
  <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="home-tab">
    <form action="change_staff_rank" method="post">
      <input type="hidden" id="change_role_employeeID" value="" name="staffID" />
      <br>
    <select name="rank" class="browser-default custom-select">
  <option disabled selected>Neue Rolle zuweisen</option>
  <?php include 'load_ranks.php';?>
</select>
<div class="d-flex justify-content-center">
        <button class="btn btn-success">Speichern</button>
      </div>
</form>
    <hr>
  </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</head>
<script>
function load_employee(elmnt) {
	var save_val = $(elmnt).attr("data-id");
    //get Truck Info
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    console.log(xmlhttp.response);
    var response = this.responseText;
    var myObj = JSON.parse(response);
    if(myObj != "") {
    user_count = myObj.length;
    }
    document.getElementById("Employee_details_Title").innerHTML=myObj[0]["username"];
    document.getElementById("employee_name").innerHTML="Name: "+myObj[0]["username"];
    document.getElementById("employee_rank").innerHTML="Posten: "+myObj[0]["staff_role"];
    document.getElementById("staff_company").innerHTML="Firma: "+myObj[0]["company"];
    document.getElementById("fire_employeeID").value=myObj[0]["userID"];
    document.getElementById("change_role_employeeID").value=myObj[0]["userID"];
	};
	xmlhttp.open("POST", "get_employee_info.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("userID="+save_val);
  document.getElementById("TourCheckContent").style.display="block";
}
</script>
<?php }?>
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body elegant-color white-text">

              <div class="card-header unique-color white-text text-center">
                Team-Mitglieder von VTCManager
              </div>
              <!-- List group links -->
              <div class="list-group list-group-flush">
                <div class="vertical-scroll">
            <table class="table elegant-color white-text">
                <thead>
                    <tr>
                        <td>Mitarbeiter</td>
                        <td>Posten</td>
						<td></td>
            <td></td>
                    </tr>
                </thead>
				<tbody class="white-text">
					<?php include 'load_data.php'; //Lade Aufträge?>                  
                </tbody>
            </table>
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
    include '../../php/footer.php';?>
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
