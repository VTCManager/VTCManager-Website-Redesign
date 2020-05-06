<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'authcode':
            $authcode = $value;
            break;
        case 'cargo':
            $cargo = $value;
            break;
		case 'depature':
            $source = $value;
            break;
		case 'destination':
            $destination = $value;
            break;
		case 'truck_manufacturer':
            $truck_manu = $value;
            break;
		case 'truck_model':
            $truck_model = $value;
            break;
		case 'weight':
            $weight = $value;
            break;
		case 'depature_company':
            $depature_company = $value;
            break;
		case 'destination_company':
            $destination_company = $value;
            break;
        default:
            break;
    }
}
$passwdhsh = hash('sha256',$passwd);
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");
$authcode = $conn->real_escape_string($authcode);
$cargo = $conn->real_escape_string($cargo);
$source = $conn->real_escape_string($source);
$destination = $conn->real_escape_string($destination);
$truck_manu = $conn->real_escape_string($truck_manu);
$truck_model = $conn->real_escape_string($truck_model);
$weight = $conn->real_escape_string($weight);
$depature_company = $conn->real_escape_string($depature_company);
$destination_company = $conn->real_escape_string($destination_company);

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
$sql = "SELECT * FROM user_data WHERE username='$found_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $latest_tour = $row["last_tour_id"];
		$company = $row["userCompanyID"];
    }
} else {
}
(int)$latest_tour++;
$sql = "UPDATE user_data SET last_tour_id='$latest_tour' WHERE username='$found_user'";

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "INSERT INTO tour_table (username, departure, destination, truck_manufacturer, truck_model, cargo_weight, cargo, money_earned, tour_id, status, companyID, depature_company, destination_company)
VALUES ('$found_user', '$source', '$destination', '$truck_manu', '$truck_model', '$weight', '$cargo', '','$latest_tour', 'accepted by driver', $company, '$depature_company', '$destination_company')";
if ($conn->query($sql) === TRUE) {
    echo $latest_tour;
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn); 
?> 
