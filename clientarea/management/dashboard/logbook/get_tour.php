<?php
//Zweck: hole Daten für detaillierte Ansicht des Auftrages
//check GET request
if(!isset($_GET['username']) && !isset($_GET['tour_id'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';
//GET Variablen
$requested_tour_id= $_GET['tour_id'];
$requested_username= $_GET['username'];
//mysql escape
$requested_tour_id = $conn->real_escape_string($requested_tour_id);
$requested_username = $conn->real_escape_string($requested_username);
//lade Tour Daten aus DB
$sql = "SELECT * FROM tour_table WHERE tour_id=$requested_tour_id AND username='$requested_username'";
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
