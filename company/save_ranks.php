
<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'SeeLogbook':
            $SeeLogbook = $value;
            break;
		case 'EditLogbook':
            $EditLogbook = $value;
            break;
		case 'SeeBank':
            $SeeBank = $value;
            break;
		case 'UseBank':
            $UseBank = $value;
            break;
		case 'EditSalary':
            $EditSalary = $value;
            break;
		case 'EditEmployees':
            $EditEmployees = $value;
            break;
		case 'salary':
            $salary = $value;
            break;
		case 'struct_id':
            $struct_id = $value;
            break;
		case 'EditProfile':
            $EditProfile = $value;
            break;
		case 'rank':
            $requested_rank = $value;
            break;
        default:
            break;
    }
}
if($requested_rank != "owner"){
if($SeeLogbook != "1"){
	$SeeLogbook = "0";
}
if($EditLogbook != "1"){
	$EditLogbook = "0";
}
if($SeeBank != "1"){
	$SeeBank = "0";
}
if($UseBank != "1"){
	$UseBank = "0";
}
if($EditSalary != "1"){
	$EditSalary = "0";
}
if($EditEmployees != "1"){
	$EditEmployees = "0";
}

if($EditProfile != "1"){
	$EditProfile = "0";
}
}else{
    $EditProfile = "1";
    $EditEmployees = "1";
    $EditSalary = "1";
    $UseBank = "1";
    $SeeBank = "1";
    $EditLogbook = "1";
    $SeeLogbook = "1";
    }
if($salary == null){
	$salary = "0";
}
if($struct_id == null){
	$struct_id = "0";
}
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$SeeLogbook = $conn->real_escape_string($SeeLogbook);
$EditLogbook = $conn->real_escape_string($EditLogbook);
$SeeBank = $conn->real_escape_string($SeeBank);
$UseBank = $conn->real_escape_string($UseBank);
$EditSalary = $conn->real_escape_string($EditSalary);
$EditEmployees = $conn->real_escape_string($EditEmployees);
$salary = $conn->real_escape_string($salary);
$struct_id = $conn->real_escape_string($struct_id);
$EditProfile = $conn->real_escape_string($EditProfile);
$requested_rank = $conn->real_escape_string($requested_rank);
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
if($userRank != "owner"){
	die("no permission");
}
$sql = "UPDATE rank SET SeeLogbook = $SeeLogbook, EditLogbook = $EditLogbook, SeeBank = $SeeBank, UseBank=$UseBank, EditSalary=$EditSalary, EditEmployees=$EditEmployees, salary=$salary,struct_id=$struct_id,EditProfile=$EditProfile WHERE forCompanyID=$userCompanyID AND name='$requested_rank'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	$conn->close();
    header("Location: https://vtc.northwestvideo.de/company/edit");
	exit();
} else {
    echo "Error updating record: " . $conn->error;
}

?>
