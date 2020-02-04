<?php  
$requested_tour_id= $_GET['tour_id'];
$requested_username= $_GET['username'];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
} 
// sql to delete a record
$sql = "DELETE FROM tour_table WHERE username='$requested_username' AND tour_id=$requested_tour_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>