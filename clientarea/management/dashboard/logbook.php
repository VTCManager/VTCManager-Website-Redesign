<?php
$page_now = "management/dashboard";
$page_now_navbar = "management/dashboard/logbook";
include '../../../basis_files/php/get_user_data.php';
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
  <script>$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});</script>
  <script>
function delete_entry(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var res = save_val.split(",");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
			
	};
	xmlhttp.open("GET", "delete_entry.php?tour_id="+res[1]+"&username="+res[0], true);
	xmlhttp.send();
	window.location.reload();
}
</script>
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
  <style>.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(/clientarea/management/img/loader.gif) center no-repeat;
}
</style>
</head>

<body class="grey lighten-3">
  <div class="se-pre-con"></div>

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php
    include '../php/navbar.php';?>
    <!-- Navbar -->

    <!-- Sidebar -->
    <?php
    include '../php/sidebar.php';?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Dashboard</a>
            <span>/</span>
            <span>Fahrtenbuch</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <div class="card-header text-center">
                Fahrtenbuch von <?php echo $user_company_name; ?>
              </div>
              <!-- List group links -->
              <div class="list-group list-group-flush">
                <div class="vertical-scroll">
            <table class="table">
                <thead>
                    <tr>
						<td>Fahrer</td>
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
				<tbody>
					<?php include 'load_data.php'; ?>                  
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
    include '../php/footer.php';?>
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
