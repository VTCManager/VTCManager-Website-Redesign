<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
if (!isset($_COOKIE["authWebToken"])&&!isset($_COOKIE["username"])) {
    header("Status: 404 Not Found");
	die();
}
?> 

<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Fahrtenbuch - VTCManager</title>
	  <?php include '../../basis_header.php'; ?> 
  </head>
  <body>
	  <script>
function delete_entry(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var username = "<?php echo $username_cookie;?>";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
			
	};
	var url = "delete_entry.php?tour_id="+save_val+"&username="+username;
	console.log(url);
	xmlhttp.open("GET", "delete_entry.php?tour_id="+save_val+"&username="+username, true);
	xmlhttp.send();
	window.location.replace("https://vtc.northwestvideo.de/account/logbook/?idc=tour_del_sc");
}
</script>
	  <?php include '../../navbar.php'; ?>  
	  		<div class="container">
        <div class="page-header">
            <h1>Deine Fahrtenbucheinträge</h1>
        </div>
				<?php if($_GET['idc'] == "tour_del_sc"){
	echo '<div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Tour erfolgreich gelöscht!</strong></p>
</div>';
}?>

        <div class="vertical-scroll">
            <table class="table">
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
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_data.php'; ?>                  
                </tbody>
            </table>
        </div>
	  </div>
	      <footer class="footer">
        <div class="container">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
