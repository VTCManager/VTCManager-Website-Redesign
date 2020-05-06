<?php
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
if (!isset($_COOKIE["authWebToken"])&&!isset($_COOKIE["username"])) {
    header("Status: 404 Not Found");
	die();
}
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_token_owner = $row["User"];
    }
} else {
    echo "0 results";
}
if ($found_token_owner != $username_cookie) {
	die("wrong owner detected");
}
$sql = "SELECT * FROM tour_table WHERE username='$found_token_owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_tour_depature = $row["departure"];
		$found_tour_destination = $row["destination"];
		$found_truck_manu = $row["truck_manufacturer"];
		$found_truck_mod = $row["truck_model"];
		$found_tour_cargo = $row["cargo"];
		$found_tour = $row["tour_id"];
		$money_earned = $row["money_earned"];
		$tour_date = $row["tour_date"];
		$tour_status = $row["status"];
		$tour_date = str_replace('-', '.', $tour_date );
		echo <<<EOT
		<tr data-id='$found_tour'>
		<td>$found_tour_cargo</td>
		<td>$found_tour_depature</td>
		<td>$found_tour_destination</td>
		<td>$money_earned €</td>
		<td>$found_truck_manu $found_truck_mod</td>
		<td>$tour_date</td>
		<td>$tour_status</td>
		</tr>
		EOT;
    }
} else {
    echo "0 results";
}
?> 