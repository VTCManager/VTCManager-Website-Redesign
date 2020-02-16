<?php
include '../../../basis_files/php/get_user_data.php';
$requested_tour_id= $_GET['tour_id'];
$requested_username= $_GET['username'];
//hole alle Touren aus der DB
$sql = "SELECT * FROM tour_table WHERE tour_id=$requested_tour_id AND username='$requested_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	echo json_encode($rows);
}
