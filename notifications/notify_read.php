<?php  
$notify_id= $_GET['notify_id'];
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");
$notify_id = $conn->real_escape_string($notify_id);

$username = $username_cookie;
$sql = "Update `notification` SET read_status=1 WHERE `id`='" . $notify_id . "'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
