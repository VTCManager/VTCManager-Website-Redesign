<?php
//Zweck: Mitarbeiter kündigen
//check POST request
if(!isset($_POST['reason']) && !isset($_POST['employeeID']) && !empty($_POST['reason']) && !empty($_POST['employeeID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../../../basis_files/php/get_user_data.php';
//Überprüfe Berechtigung
if($EditEmployees != "1"){
    //redirect zurück zu Liste mit Fehler-Info
    echo "Keine Berechtigung";
    die();
    }
//POST Variablen
$reason_text = $_POST['reason'];
$employeeID = $_POST['employeeID'];

//
$sql = "UPDATE career_table SET fire_reason='$reason_text', end_date=NOW() WHERE userID=$employeeID AND end_date=0000-00-00";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
//close DB conn
$conn->close();
?>
