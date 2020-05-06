
<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'message':
            $message = $value;
            break;
		case 'rank':
            $rank = $value;
            break;
        default:
            break;
    }
}

if($message == null){
	die("message missing");
}
if($rank == null){
	die("rank missing");
}
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$rank = $conn->real_escape_string($rank);

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
		}
if($EditEmployees != "1"){
	die("no access");
}
$sql = "SELECT AdID FROM job_market ORDER BY AdID DESC LIMIT 1";//letzte userid holen
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $old_num = $row["AdID"];
    }
} else {
    echo "0 results";
}
(int)$old_num++;
$sql = "INSERT INTO `job_market`(`byCompanyID`, `rank`,`AdID`, `status`) VALUES ($userCompanyID, '$rank', $old_num,'open')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$myfile = fopen("../../media/articles/ad_description/$old_num.txt", "w");
fwrite($myfile, $message);
fclose($myfile);

$conn->close();
header("Refresh:0; url=https://vtc.northwestvideo.de/company/job_advertisements/");
			die();

?>
