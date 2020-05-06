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
if($appli_status != "accepted"){
	die("application not accepted yet");
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
$sql = "UPDATE application SET status='acceptedbyuser' WHERE applicationID=$requested_appli_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE user_data SET userCompanyID=$forCompanyID, rank='$forRank' WHERE userID=$navbar_userid";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "INSERT INTO career_table (username, userID, atCompanyID, job)
VALUES ('$appli_username',$navbar_userid,$forCompanyID,'$forRank')";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
header("Location: https://vtc.northwestvideo.de/company/?companyid=$forCompanyID"); 
    exit;

		?>
