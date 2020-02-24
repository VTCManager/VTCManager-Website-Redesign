<?php
//Zweck: Mitarbeiter kündigen
//check POST request
if(!isset($_POST['rank']) && !isset($_POST['employeeID']) && !empty($_POST['rank']) && !empty($_POST['employeeID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';

//Überprüfe Berechtigung
if($EditEmployees != "1"){
    //redirect zurück zu Liste mit Fehler-Info
    echo "Keine Berechtigung";
    die();
    }
//POST Variablen
$employee_rank = $_POST['rank'];
$employeeID = $_POST['employeeID'];

//Benutzer Informationen anpassen
$sql = "UPDATE user_data SET rank='$employee_rank' WHERE userID=$employeeID";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
    die();
}

//close DB conn
$conn->close();

//redirect
header("Location: /clientarea/management/dashboard/employees/");
exit;
?>

