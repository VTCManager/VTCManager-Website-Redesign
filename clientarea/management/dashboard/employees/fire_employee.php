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

//Eintrag im Lebenslauf anpassen und Grund setzen
$sql = "UPDATE career_table SET fire_reason='$reason_text', end_date=NOW() WHERE userID=$employeeID AND end_date=0000-00-00";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
    die();
}
include 'emails/fire_employee/fire_employee.php';
$to = 'joschua.hass.sh@gmail.com';

$subject = 'Du wurdest aus deiner Spedition entlassen|VTCManager';

$headers = "From: service@northwestvideo.de\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = $fire_employee_email_content;


mail($to, $subject, $message, $headers);
//close DB conn
$conn->close();
?>
