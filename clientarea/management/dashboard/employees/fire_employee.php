<?php
//Zweck: Mitarbeiter kündigen
//check POST request
if(!isset($_POST['reason'])){
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

//close DB conn
$conn->close();
?>
