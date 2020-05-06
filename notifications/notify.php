<?php 
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'fu':
            $requested_foruser = $value;
            break;
        case 'evnt':
            $requested_event = $value;
            break;
		case 'evntid':
            $requested_eventid = $value;
            break;
		case 'evbyu':
            $requested_eventybauser = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';    
$con = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");
$sql = "SELECT id FROM notification WHERE username='$requested_foruser' ORDER BY id DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $last_ntf_id_rq = $row["id"];
    }
} else {
    echo "0 results";
}
(int)$last_ntf_id_rq++;
$sql = "UPDATE user_data SET last_notify_id=$last_ntf_id_rq WHERE username='$requested_foruser'";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "INSERT INTO notification( id, forUser, event, eventID, eventbyUser) VALUES($last_ntf_id_rq,'$requested_foruser','$requested_event','$requested_eventid','$requested_eventybauser');";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>
