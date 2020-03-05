<?php  
//Zweck ausgewählte Tour löschen
//check GET request
if(!isset($_POST['username']) && !isset($_POST['tour_id'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//GET Variablen
$requested_tour_id= $_POST['tour_id'];
$requested_username= $_POST['username'];
//Connect and Check
include '../../get_user_data.php';
//mysql escape
$requested_tour_id = $conn->real_escape_string($requested_tour_id);
$requested_username = $conn->real_escape_string($requested_username);
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
echo "OK";
//close DB conn
$conn->close();
?>
