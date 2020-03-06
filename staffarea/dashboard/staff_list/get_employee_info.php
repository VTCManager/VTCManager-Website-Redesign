<?php
//Zweck: hole Daten für detaillierte Ansicht des Mitarbeiter
//check POST request
if(!isset($_POST['userID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';
//POST Variablen
$requested_userid = $_POST['userID'];

//mysql escape
$requested_userid = $conn->real_escape_string($requested_userid);
//lade Mitarbeiter Daten
$sql = "SELECT username,userID,staff_role,userCompanyID FROM user_data WHERE userID=$requested_userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
		$found_staff_username = $row["username"];
		$found_staff_companyID = $row["userCompanyID"];
	}
}else{
    //Mitarbeiter nicht gefunden
    //Expection fehlt
	}
//Lade den Namen der Firma
$sql = "SELECT * FROM company_information_table WHERE id=$found_staff_companyID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$staff_company_name = $row["name"];
    }
}
$rows[0]["company"] = $staff_company_name;
//Array in JSON umwandeln
echo json_encode($rows);
//close DB conn
$conn->close();
?>
