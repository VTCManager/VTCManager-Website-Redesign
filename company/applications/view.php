<?php 
if(!isset($_POST['id'])) {
	die("Keine Bewerbungsdaten abrufbar. Öffne die Bewerbungsliste erneut");
}
$application_id = $_POST['id'];
$host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  

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
	die("Berechtigung fehlt.");
}
if(isset($_POST['cmd'])) {
			$sql = "SELECT * FROM application WHERE applicationID=$application_id";
		$result1 = $conn->query($sql);
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
				$appli_time = $row["time"];
			}
		}
		$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$appli_username = $row["username"];
						}
				} else {
					$appli_username = "Unbekannt";
				}
				$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		} else {
		die("no res 1");
		}
	if($_POST['cmd'] == "accept"){
		$sql = "UPDATE application SET status='accepted' WHERE applicationID=$application_id";
		if ($conn->query($sql) === TRUE) {
		} else {
			die("Error updating record: " . $conn->error);
		}
		// Your POST data
$data = http_build_query(array(
    'fu' => $appli_username,
    'evnt' => 'application.accepted',
	'evntid' => $application_id,
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
$info = '<div class="alert alert-success" role="alert">
  Bewerbung wurde angenommen! Warte auf Bestätigung durch Bewerber...
</div>';
if ($result === FALSE) { /* Handle error */ }
		
	}else if($_POST['cmd'] == "decline") {
			$sql = "UPDATE application SET status='declined' WHERE applicationID=$application_id";
		if ($conn->query($sql) === TRUE) {
		} else {
			die("Error updating record: " . $conn->error);
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
$info = '<div class="alert alert-danger" role="alert">
  Die Bewerbung wurde abgelehnt!
</div>';
	}
}
		$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		} else {
		die("no res 1");
		}
		$sql = "SELECT * FROM application WHERE applicationID=$application_id";
		$result1 = $conn->query($sql);
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
				$appli_time = $row["time"];
			}
		}
		$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$appli_username = $row["username"];
						}
				} else {
					$appli_username = "Unbekannt";
				}
				if($appli_status == "sent"){
					$appli_status_tra = "Überprüfung ausstehend";
				}else if($appli_status == "declined"){
					$appli_status_tra = "Bewerbung abgelehnt";
				}else if($appli_status == "accepted"){
					$appli_status_tra = "Warte auf Bestätigung durch den Bewerber";
				}else if($appli_status == "acceptedbyuser"){
					$appli_status_tra = "Bewerber eingestellt";
				}
		?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Bewerbungen - VTCManager</title>
	  <?php include '../../basis_header.php'; ?>  
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
	  <div class="container">
		  <?php echo $info;?>
			<h1>Bewerbungen von <?php echo $appli_username;?></h1>
			<p>Rolle: <?php echo $forRank;?><br>
			   Abgesendet um <?php echo $appli_time;?><br>
			   Status: <?php echo $appli_status_tra;?></p>
			   <p><?php
$content = @file_get_contents("../../media/articles/application_text/".$application_id.'.txt');
if($content === FALSE) {
	echo "Der Bewerbungstext ist nicht abrufbar";
	}else{
		echo $content;
		}
?></p>
			   <?php if($appli_status == "sent") {?>
			   <form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="accept" name="cmd" /><button class="btn btn-success" name="id" value="<?php echo $application_id;?>">Akzeptieren</button></form>
			   <form action="" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" value="decline" name="cmd" /><button class="btn btn-danger" name="id" value="<?php echo $application_id;?>">Ablehnen</button></form>
			   <?php } ?>
            <footer class="footer">
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
