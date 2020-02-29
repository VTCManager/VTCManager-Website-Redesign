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
        case 'distance':
            $distance_tour = $value;
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
$distance_tour = $conn->real_escape_string($distance_tour);

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
    if(! $conn )  
{  
  die("2");  
}
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
    echo $found_user;
    die("no user");
}

/*
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error updating record: " . $conn->error;
}
*/
$sql = "SELECT * FROM tour_table WHERE tour_id=$latest_tour AND username='$found_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $departure_compare = $row["departure"]; 
	$destination_compare = $row["destination"];
	$cargo_weight_compare = $row["cargo_weight"];
	$cargo_compare = $row["cargo"];
	$depature_company_compare = $row["depature_company"]; 
	$destination_company_compare = $row["destination_company"];
    }
} else {
}
if($departure_compare == $source && $destination_compare == $destination && $cargo_weight_compare == $weight && $cargo_compare == $cargo && $depature_company_compare == $depature_company && $destination_company_compare == $destination_company){
    $sql3 = "UPDATE tour_table SET username = '$found_user',
		departure = '$source',
		destination = '$destination', 
		truck_manufacturer = '$truck_manu', 
		truck_model = '$truck_model', 
		cargo_weight = '$weight', 
		cargo = '$cargo', 
		money_earned = '', 
		status = 'accepted by driver', 
		companyID = '$company', 
		depature_company = '$depature_company', 
		destination_company = '$destination_company', 
		distance = '$distance_tour' WHERE tour_id = '$latest_tour' AND username = '$found_user'";
	    }else{
		$latest_tour++;
	$sql = "UPDATE user_data SET last_tour_id='$latest_tour' WHERE username='$found_user'";

	
	$sql3 = "INSERT INTO tour_table (username, departure, destination, truck_manufacturer, truck_model, cargo_weight, cargo, money_earned, tour_id, status, companyID, depature_company, destination_company, distance)
VALUES ('$found_user', '$source', '$destination', '$truck_manu', '$truck_model', '$weight', '$cargo', '','$latest_tour', 'accepted by driver', $company, '$depature_company', '$destination_company', $distance_tour)";
		}



if ($conn->query($sql3) === TRUE) {
	$conn->query($sql);
    echo $latest_tour;
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn); 
?> 
