
<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
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
$sql = "UPDATE user_data SET rank = 'driver', userCompanyID=0 WHERE username='$username_cookie'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	$conn->close();
    header("Location: https://vtc.northwestvideo.de/");
	exit();
} else {
    echo "Error updating record: " . $conn->error;
}

?>