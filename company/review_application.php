<?php $host = 'localhost:3306';    
$requested_appli_id = $_GET['id'];
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  
		$requested_appli_id = $conn->real_escape_string($requested_appli_id);

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
				$EditEmployees = $row["EditEmployees"];
			}
		} else {
		die("no res 1");
		}
if($EditEmployees != "1"){
	die("no permission");
}
$sql = "SELECT * FROM application WHERE applicationID=$requested_appli_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forCompanyID = $row["forCompanyID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
					}
		} else {
			die("cant find appli");
		}
$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$appli_username = $row["username"];
			}
		} else {
		die("no res 2");
		}
if($forCompanyID != $company){
					die("not the same company".$forCompanyID.$company."!");
				}
if($appli_status != "sent"){
	die("you already reviewed this application");
}
if(isset($_GET['cmd'])) {
	$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		} else {
			die("cant find company2");
		}
    //do something
	if ($_GET['cmd'] == "acc"){
		$sql = "UPDATE application SET status='accepted' WHERE applicationID=$requested_appli_id";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		// Your POST data
$data = http_build_query(array(
    'fu' => $appli_username,
    'evnt' => 'application.accepted',
	'evntid' => $requested_appli_id,
	'evbyu' => $company_name
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
		header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("");
	}else if ($_GET['cmd'] == "dec"){
		$sql = "UPDATE application SET status='declined' WHERE applicationID=$requested_appli_id";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		// Your POST data
$data = http_build_query(array(
    'fu' => $appli_username,
    'evnt' => 'application.declined',
	'evntid' => '0',
	'evbyu' => $company_name
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
		header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die();
	}
}

		?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Bewerbung Nr.<?php echo $requested_appli_id; ?> - VTCManager</title>
	  <?php include '../basis_header.php'; ?>  
  </head>
  <body>
	  <?php include '../navbar.php'; ?>  
	      <footer class="footer">
        <div class="container">
			<?php 
				echo <<<EOT
				<h2>Bewerbung von <a href="https://vtc.northwestvideo.de/account/?userid=$byUserID">$appli_username</a></h2>
				<p>Rolle: $forRank</p>
				EOT;
	?>
			<button type="button" class="btn btn-success" onclick="location.href = 'https://vtc.northwestvideo.de/company/review_application?id=<?php echo $requested_appli_id;?>&cmd=acc';">Annehmen</button>
			<button type="button" class="btn btn-danger" onclick="location.href = 'https://vtc.northwestvideo.de/company/review_application?id=<?php echo $requested_appli_id;?>&cmd=dec';">Ablehnen</button>
			<hr>
			<br>
			<p>Seite neu laden um weitere Ergebnisse zu sehen.</p>
			<br>
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
