<?php  
$requested_user_name= $_GET['username'];
$requested_job_id= $_GET['jobid'];
$requested_accept = $_GET['accpt'];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$requested_user_name = $conn->real_escape_string($requested_user_name);
$requested_job_id = $conn->real_escape_string($requested_job_id);
$requested_accept = $conn->real_escape_string($requested_accept);

$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
		$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
		if ($found_token_owner != $username_cookie) {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$navbar_userid = $row["userID"];
				$rank_user = $row["rank"];
				$profile_pic = $row["profile_pic_url"];
				$company = $row["userCompanyID"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("profile not found");
		}
$sql = "SELECT * FROM rank WHERE name='$rank_user' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditLogbook = $row["EditLogbook"];
			}
		} else {
		}

$sql = "SELECT * FROM tour_table WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
$result2 = $conn->query($sql) or die($conn->error);
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $departure = $row["departure"];
		$departure_comp = $row["depature_company"];
		$destination = $row["destination"];
		$destination_comp = $row["destination_company"];
		$truck_manufacturer = $row["truck_manufacturer"];
		$truck_model = $row["truck_model"];
		$trailer_damage = $row["trailer_damage"];
		$cargo_weight = $row["cargo_weight"];
		$cargo = $row["cargo"];
		$money_earned = $row["money_earned"];
		$tour_date = $row["tour_date"];
		$status = $row["status"];
		$percentage = $row["percentage"];
		$job_scompanyID = $row["companyID"];
		$income = $row["money_earned"];
		$tour_approved_int = $row["tour_approved"];

		if ($status == "finished"){
			$status = "abgeschlossen";
		}else if ($status == "canceled"){
			$status = "abgebrochen";
		}else if ($status == "accepted by driver"){
			$status = "wird gefahren";
		}else if ($status == "accepted"){
			$status = "von Spedition bestätigt";
		}else if ($status == "declined"){
			$status = "von Spedition abgelehnt";
		}
		$sql = "SELECT * FROM company_information_table WHERE id=$job_scompanyID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$job_s_found_comp_name = $row["name"];
			}
		}
		if ($EditLogbook == "1"){
		if($tour_approved_int == "0"){
		if ($requested_accept == "1") {
			$sql = "UPDATE tour_table SET tour_approved=1, status='accepted' WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
			if ($conn->query($sql) === TRUE) {
				$status = "von Spedition angenommen";
				$info = '<div class="alert alert-success" role="alert">
  Auftrag erfolgreich bestätigt!
</div>';//TRA begins
				$sql = "SELECT * FROM company_information_table WHERE id=$job_scompanyID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$tra_comp_bank_balance = $row["bank_balance"];
					}
				} else {
					die("Fehler: Absender existiert nicht"); 
				}
				$tra_comp_bank_balance_conv = floatval($tra_comp_bank_balance);
				$umsatz = (int)$income - ((int)$income*0.19 )-((int)$trailer_damage*100 );
				$tra_comp_bank_balance_new = $tra_comp_bank_balance_conv + $umsatz;
				
				$sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status)
VALUES ('$departure_comp', '$job_s_found_comp_name', '$message',$umsatz, 'sent')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
$sql = "UPDATE company_information_table SET bank_balance=$tra_comp_bank_balance_new WHERE id='$job_scompanyID'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
// Your POST data
$data = http_build_query(array(
    'fu' => $username_cookie,
    'evnt' => 'newtransaction',
	'evntid' => '0',
	'evbyu' => $departure_comp
));

// Create HTTP stream context
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    )
));

// Make POST request
$response = file_get_contents('http://vtc.northwestvideo.de/notifications/notify.php', false, $context);
if ($result === FALSE) { /* Handle error */ }
				
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}else if ($requested_accept == "2") {
			$sql = "UPDATE tour_table SET tour_approved=2, status='declined' WHERE tour_id=$requested_job_id AND username='$requested_user_name'";
			if ($conn->query($sql) === TRUE) {
				$status = "von Spedition abgelehnt";
				$info = '<div class="alert alert-danger" role="alert">
  Auftrag erfolgreich abgelehnt!
</div>';
				
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
		}
		}
	}
}else {
    echo "Error: Job not found";
	die();
}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Tour <?php echo $requested_job_id;?> - VTCManager</title>
	  <?php include 'basis_header.php'; ?> 
  </head>
  <body>
	  <?php include 'navbar.php'; ?>  
	  &nbsp;&nbsp;
	  <div class="container">
		  <?php echo $info;?>
		  <h2>Tour-Nr.: <?php echo $requested_job_id;?> | Benutzer: <?php echo $requested_user_name;?> </h2>
		  <p>Startort: <?php echo $departure;?> | <?php echo $departure_comp;?><br>
			  Zielort: <?php echo $destination;?> | <?php echo $destination_comp;?><br>
			  Fracht: <?php echo $cargo;?> <br>
			  Frachtgewicht: <?php echo $cargo_weight;?>t <br>
			  LKW: <?php echo $truck_manufacturer;?> <?php echo $truck_model;?><br>
			  Aufliegerschaden: <?php echo $trailer_damage;?>%<br>
			  Datum: <?php echo $tour_date;?> <br>
			  Spedition: <a href="https://vtc.northwestvideo.de/company/?companyid=<?php echo $job_scompanyID;?>"> <?php echo $job_s_found_comp_name;?> </a> <br>
			  <?php if ($status == "wird gefahren"){
echo "Status: wird gefahren($percentage%)<br>";
	echo '<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: '.$percentage.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
}else{ echo "Status: $status<br>";
	  } if ($EditLogbook == "1"){
			  if($status == "abgeschlossen"){?>
			  <hr>
			  Frachtwert: <?php echo $income;?>€ <br>
		      Steuern: <?php echo ((int)$income*0.19 );?>€ <br>
		      Schaden: <?php echo ((int)$trailer_damage*100 );?>€<br>
		      Umsatz: <?php $umsatz = (int)$income - ((int)$income*0.19 )-((int)$trailer_damage*100 ); echo $umsatz; ?>€
			  <div class="row d-flex justify-content-center">
	<div class="col-md-12 mb-4">
	<button type="button" onclick="window.location='http://vtc.northwestvideo.de/job_report?username=<?php echo $requested_user_name;?>&jobid=<?php echo $requested_job_id;?>&accpt=1';" class="btn btn-success"><i class="fas fa-check" aria-hidden="true"></i>Akzeptieren</button>
	<button type="button" onclick="window.location='http://vtc.northwestvideo.de/job_report?username=<?php echo $requested_user_name;?>&jobid=<?php echo $requested_job_id;?>&accpt=2';" class="btn btn-danger"><i class="fas fa-ban" aria-hidden="true"></i>Ablehnen</button>
	</div>
				  </div>
<?php }} ?>
			  
		  </p>
			  
	  </div>
	      <?php include 'footer.php'; ?>  
  </body>
</html>
