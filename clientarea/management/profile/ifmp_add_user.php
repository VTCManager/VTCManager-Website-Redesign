<?php
include '../get_user_data.php';
if(!isset($_GET['ifmpID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Einreihung in whitelist für CoolDown
$sql = "INSERT INTO process_whitelist (event, value1, userID, created_date)
VALUES ('connectToIFMP', '$_POST['ifmpID']', $userID,NOW())";

if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
