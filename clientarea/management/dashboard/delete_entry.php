<?php  
$requested_tour_id= $_GET['tour_id'];
$requested_username= $_GET['username'];
include '../../../basis_files/php/get_user_data.php';
// sql to delete a record
$sql = "DELETE FROM tour_table WHERE username='$requested_username' AND tour_id=$requested_tour_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
