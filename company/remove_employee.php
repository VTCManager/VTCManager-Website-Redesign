
<?php
$username= $_GET['username'];
if($username == null){
	die("username not set");
}
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$username = $conn->real_escape_string($username);

$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_token_owner = $row["User"];
    }
} else {
    $conn->close();
    header("Location: https://vtc.northwestvideo.de/");
	exit();
}
if ($found_token_owner != $username_cookie) {
	die("wrong user");
}

$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$userid_edit_prof = $row["userID"];
		$userCompanyID = $row["userCompanyID"];
		$userRank = $row["rank"];		
	}
}else{
	die("user not in db");
}
$sql = "SELECT * FROM rank WHERE name='$userRank' AND forCompanyID=$userCompanyID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditEmployees = $row["EditEmployees"];
				
			}
		} else {
			die("no permission");
		}
if($EditEmployees!="1"){
	die("no permission");
}
$sql = "SELECT * FROM career_table WHERE username='$username' AND atCompanyID=$userCompanyID ORDER BY start_date DESC LIMIT 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$start_date = $row["start_date"];
				
			}
		} else {
			echo $sql;
			die("no start_date");
		}

$sql = "UPDATE user_data SET userCompanyID = 0, rank='driver' WHERE username='$username'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE career_table SET end_date=NOW() WHERE username='$username' AND start_date='$start_date' AND atCompanyID=$userCompanyID";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	$conn->close();
	exit();
} else {
    echo "Error updating record: " . $conn->error;
}

?>
