<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
		case 'salary':
            $salary = $value;
            break;
		case 'name':
            $requested_rank = $value;
            break;
        default:
            break;
    }
}
//hole Cookie Daten
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
//zu DB connecten
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$salary = $conn->real_escape_string($salary);
$requested_rank = $conn->real_escape_string($requested_rank);

//authCode prüfen
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
//prüfen ob Token Owner mit Username Cookie übereinstimmen
if ($found_token_owner != $username_cookie) {
	die("wrong user");
}
//Benutzerdaten holen
$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$userid_edit_prof = $row["userID"];
		$userCompanyID = $row["userCompanyID"];
		$userRank = $row["rank"];		
	}
}else{
	die("user not in db");
}
//hole Daten über seine Rechte
$sql = "SELECT * FROM rank WHERE name='$userRank' AND forCompanyID=$userCompanyID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditEmployees = $row["EditEmployees"];
				
			}
		} else {
		}
//hat User berechtigung zum erstellen neuer Ränge?
if($EditEmployees != "1"){
	die("no permission");
}
(int)$salary;
$sql = "INSERT INTO rank (name, forCompanyID, EditProfile, SeeLogbook, EditLogbook, SeeBank, UseBank, EditEmployees, EditSalary, salary, struct_id) VALUES ('$requested_rank',$userCompanyID,0,0,0,0,0,0,0,$salary,0)";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
header("Location: https://vtc.northwestvideo.de/company/edit");
	exit();
?>
