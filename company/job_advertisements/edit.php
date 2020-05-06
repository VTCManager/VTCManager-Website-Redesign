<?php  
$requested_ad_id = $_GET['id'];
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
$requested_ad_id = $conn->real_escape_string($requested_ad_id);


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
			die("no company");
		}
$sql = "SELECT * FROM job_market WHERE AdID=$requested_ad_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$ad_byCompanyID = $row["byCompanyID"];
				$ad_rank = $row["rank"];
				$ad_created_date = $row["created_date"];
				$ad_status = $row["status"];
			}
		} else {
		}
if($ad_byCompanyID != $company_id){
	die("unauthorized");
}
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <title>Stellenanzeigen Nr.<?php echo $requested_ad_id; ?> - VTCManager</title>
	  <link rel="icon" href="https://vtc.northwestvideo.de/media/images/favicon.png" type="image/x-icon">
	  <link rel="apple-touch-icon" href="https://vtc.northwestvideo.de/media/images/apple-icon.png">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/main.css">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/vs.css">
	  <script type="text/javascript" src="https://vtc.northwestvideo.de/basis_files/jquery.min.js"></script>
	  <script type="text/javascript" src="https://vtc.northwestvideo.de/basis_files/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
	  &nbsp;&nbsp;
	  <div class="container">
		  <h1>Stellenanzeigen Nr.<?php echo $requested_ad_id; ?></h1>
		  <p>Suche nach: <?php echo $ad_rank; ?> </p>
		  <p>Erstellt am: <?php echo $ad_created_date; ?> </p>
		  <form action="https://vtc.northwestvideo.de/company/job_advertisements/save_edit" method="post" name="registerform" id="account-register-form" enctype="multipart/form-data">
			  <input type='hidden' name='AdID' value='<?php echo $requested_ad_id;?>' />
			  <textarea class="form-control" name="message" id="message" placeholder="Stellenbeschreibung" rows="10"><?php echo file_get_contents("https://vtc.northwestvideo.de/media/articles/ad_description/".$requested_ad_id.'.txt'); ?></textarea>
			  <select name="status" id="status">
  <option value="open">Offen</option>
  <option value="closed">Geschlossen</option>
</select>
                <input type="submit" name="submit" id="submitbtn" class="btn btn-default btn-block" value="Speichern">
            </form>
</div>
	      <?php include '../../footer.php'; ?>
  </body>
</html>
