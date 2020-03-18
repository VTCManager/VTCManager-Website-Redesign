<?php  
if(!isset($_COOKIE['authWebToken'])) {
	die("404");
}
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			echo "0 results2";
		}
		if ($found_token_owner != $username_cookie) {
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$rank_user = $row["rank"];
				$company_id = $row["userCompanyID"];
				$bank_balance_user =$row["bank_balance"];
			}
		} else {
			die("0 results3");
		}
$sql = "SELECT * FROM company_information_table WHERE id=$company_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_company_name = $row["name"];
				$found_company_bank_balance = $row["bank_balance"];
			}
		} else {
		}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <title>Stellenanzeigen - VTCManager</title>
	  <?php include '../../basis_header.php'; ?> 
	  <!-- jQuery library -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <!-- jQuery UI library -->
	  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	  <script>
		  $(function() {
    $("#rank").autocomplete({
        source: "https://vtc.northwestvideo.de/company/job_advertisements/search_ranks_get.php?comp_id=<?php echo $company_id; ?>",
        select: function( event, ui ) {
            event.preventDefault();
            $("#rank").val(ui.item.id);
        }
    });
});
</script>
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
	  &nbsp;&nbsp;
	  <?php if($_GET['idc'] == "tra_sc"){
	echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Transaktion erfolgreich gesendet!</strong></p>
</div></div>';}?>
           <div class="container">
               <form action="https://vtc.northwestvideo.de/company/job_advertisements/create" method="post" name="new_ad" id="new_ad">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Neue Stellenanzeige erstellen</h4>
                                          </div>
                   <div class="modal-body">
                       <input class="form-control" type="text" id="rank" placeholder="Rolle (muss bereits existieren)" aria-label="Rolle">
                       <textarea class="form-control" name="message" id="message"placeholder="Stellenbeschreibung" rows="10"></textarea>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Erstellen</button>
                   </div>
               </form>
</div>
	      <?php include '../../footer.php'; ?>  
  </body>
</html>
