<?php
$authCode = $_POST["authcode"];
$payment = $_POST["payment"];
$tourid = $_POST["tourid"];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");


$sql = "SELECT User FROM authCode_table WHERE Token='$authCode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_user = $row["User"];
    }
} else {
    mysqli_close($conn); 
    /*'$host = 'localhost:3306';     
    $conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager_en");
    $sql = "SELECT User FROM authCode_table WHERE Token='$authcode'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $found_user = $row["User"];
        }
    } else {'*/
        echo "0 results";
        die();
    //}
}
$sql3 = "INSERT INTO tollgate (username, payment, tourid) VALUES ('$found_user', '$payment', '$tourid')";



if ($conn->query($sql3) === TRUE) {
    mysqli_close($conn);
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>