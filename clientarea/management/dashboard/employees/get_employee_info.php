<?php
//Zweck: hole Daten für detaillierte Ansicht des Auftrages
//check GET request
if(!isset($_POST['userID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../../../basis_files/php/get_user_data.php';
//GET Variablen
$requested_userid = $_POST['userID'];
//lade Tour Daten aus DB
$sql = "SELECT username,userID,rank FROM user_data WHERE userID=$requested_userid AND userCompanyID=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
		$found_employee_username = $row["username"];
	}
}else{
	}
$sql = 'SELECT * FROM tour_table WHERE username="'.$found_employee_username.'" AND companyID=1 AND status="accepted"';
$result = $conn->query($sql);
$rows[0]["total_tours"] = $result->num_rows;
echo json_encode($rows);
//close DB conn
$conn->close();
?>
