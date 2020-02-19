<?php  
//Zweck ausgewählte Tour löschen
//check GET request
if(!isset($_GET['username']) && !isset($_GET['tour_id'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//GET Variablen
$requested_tour_id= $_GET['tour_id'];
$requested_username= $_GET['username'];
//Connect and Check
include '../../../../basis_files/php/get_user_data.php';
// sql to delete a record
$sql = "DELETE FROM tour_table WHERE username='$requested_username' AND tour_id=$requested_tour_id";

if ($conn->query($sql) === TRUE) {
    //Erfolg
} else {
    //Error
    echo "Error deleting record: " . $conn->error;
    header("Status: 500 Internal Server Error");
    die();
}
//close DB conn
$conn->close();
?>
