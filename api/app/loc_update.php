<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'authcode':
            $authcode = $value;
            break;
        case 'coordinate_x':
            $coordinate_x = $value;
            break;
		case 'coordinate_y':
            $coordinate_y = $value;
            break;
		case 'rotation':
            $rotation = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");
$authCode = $conn->real_escape_string($authCode);
$coordinate_x = $conn->real_escape_string($coordinate_x);
$coordinate_y = $conn->real_escape_string($coordinate_y);
$rotation = $conn->real_escape_string($rotation);

$sql = "SELECT User FROM authCode_table WHERE Token='$authcode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_user = $row["User"];
    }
} else {
    mysqli_close($conn); 
    $host = 'localhost:3306';     
    $conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager_en");
    $sql = "SELECT User FROM authCode_table WHERE Token='$authcode'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $found_user = $row["User"];
        }
    } else {
        echo "0 results";
        die();
    }
}
$sql = "UPDATE user_data SET coordinate_x='$coordinate_x',coordinate_y='$coordinate_y',rotation='$rotation',`last_seen`=NOW()  WHERE username='$found_user'";

if ($conn->query($sql) === TRUE) {
	echo $rotation;
} else {
    echo "Error updating record: " . $conn->error;
	die();
}
mysqli_close($conn); 
?> 
