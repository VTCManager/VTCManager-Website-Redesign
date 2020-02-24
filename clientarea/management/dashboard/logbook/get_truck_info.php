<?php
//Zweck: hole Daten für detaillierte Ansicht des LKW
//check GET request
if(!isset($_GET['manufacturer']) && !isset($_GET['model'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';
//GET Variablen
$requested_manufacturer = $_GET['manufacturer'];
$requested_model = $_GET['model'];
//lade LKW Daten
$sql = "SELECT * FROM truck_info WHERE manufacturer='$requested_manufacturer' AND model='$requested_model'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	echo json_encode($rows);
}else{
	}
//close DB conn
$conn->close();
?>
