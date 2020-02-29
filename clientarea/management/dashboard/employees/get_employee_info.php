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
//lade Mitarbeiter Daten
$sql = "SELECT username,userID,rank FROM user_data WHERE userID=$requested_userid AND userCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
		$found_employee_username = $row["username"];
	}
}else{
    //Mitarbeiter nicht gefunden
    //Expection fehlt
	}
//lade Anzahl erfolgreicher Touren
$sql = 'SELECT * FROM tour_table WHERE username="'.$found_employee_username.'" AND companyID=1 AND status="accepted"';
$result = $conn->query($sql);
$rows[0]["total_tours"] = $result->num_rows;
//Gesamteinahmen durch Fahrer berechnen
$sql = 'SELECT * FROM tour_table WHERE username="'.$found_employee_username.'" AND companyID=1 AND status="accepted"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //zähle Geld
	$current_income = (int)$row["money_earned"];
	$current_taxes = $current_income*0.20;
	$current_damage_cost = ((int)$row["income"])*100;
        $current_amount = $current_amount + ($current_income-$current_taxes-$current_damage_cost);
	$current_income = 0;
    }
}
$current_amount = number_format($current_amount, 2, ',', '.');
$rows[0]["income"] = $current_amount;
//Array in JSON umwandeln
echo json_encode($rows);
//close DB conn
$conn->close();
?>
