<?php
//ist Cookie gesetzt?
if(isset($_COOKIE['authWebToken'])) {
	//hole Cookie Daten
		$username_cookie = $_COOKIE["username"]; 
		$authCode_cookie = $_COOKIE["authWebToken"]; 
		
		//Verbindung zur DB
		$host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  
		
		//suche nach exakt gleichen AuthCode Token
		$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			//reset der Cookies und redirect zur Homepage
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=/");
			die("wrong owner detected");
		}
		//Prüfung ober der in der DB für den AuthCode Token hinterlegte Username mit Username Cookie übereinstimmt
		if ($found_token_owner != $username_cookie) {
			//reset der Cookies und redirect zur Homepage
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=/");
			die("wrong owner detected");
		}
		//hole Daten
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$navbar_userid = $row["userID"];
				$rank_user = $row["rank"];
				$profile_pic = $row["profile_pic_url"];
				$company = $row["userCompanyID"];
			}
		} else {
			//reset der Cookies und redirect zur Homepage
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=/");
			die("profile not found");
		}
$sql = "SELECT * FROM rank WHERE name='$rank_user' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//hole Berechtigungen des Benutzers
				$SeeBank = $row["SeeBank"];
				$EditProfile = $row["EditProfile"];
				$SeeLogbook = $row["SeeLogbook"];
				$EditLogbook = $row["EditLogbook"];
				$UseBank = $row["UseBank"];
				$EditEmployees = $row["EditEmployees"];
				$EditSalary = $row["EditSalary"];
				
			}
		} else {
		}
		//aktualisiere zuletzt online
	$sql = "UPDATE user_data SET `last_seen`=NOW()  WHERE username='$username_cookie'";

if ($conn->query($sql) === TRUE) {
	echo $rotation;
} else {
    echo "Error updating record: " . $conn->error;
	die();
}
$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		}
}
		?>
