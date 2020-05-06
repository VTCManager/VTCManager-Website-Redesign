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
$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_userid_loadd = $row["userID"];
    }
} else {
    echo "0 results";
}
if ($found_token_owner != $username_cookie) {
	die("wrong owner detected");
}
$sql = "SELECT * FROM tour_table WHERE username='$found_token_owner' ORDER BY `tour_id` DESC";
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
		$tour_prog = $row["percentage"];
		$tour_date_nw = date('d.m.Y', strtotime($tour_date));
		if ($tour_status== "finished") {
			$tour_prog = "100";
		}
		if ($tour_status == "finished"){
			$tour_status = '<i class="fas fa-check-circle" style="color: green !important;"></i> abgeschlossen';
		}else if ($tour_status == "accepted by driver"){
			$tour_status = '<i class="fas fa-business-time"></i> Auslieferung';
		}else if ($tour_status== "declined"){
			$tour_status = '<i class="fas fa-ban" style="color: red !important;"></i> abgelehnt';
		}else if ($tour_status== "accepted"){
			$tour_status = '<i class="fas fa-check-circle" style="color: green !important;"></i> akzeptiert';
		}
		if ($tour_status != "canceled"){
		echo <<<EOT
		<tr data-id='$found_tour'>
		<td><a href="http://vtc.northwestvideo.de/job_report?username=$username_cookie&jobid=$found_tour">$found_tour_cargo</a></td>
		<td>$found_tour_depature</td>
		<td>$found_tour_destination</td>
		<td>$money_earned €</td>
		<td>$found_truck_manu $found_truck_mod</td>
		<td>$tour_date_nw</td>
		<td>$tour_status</td>
		<td>$tour_prog %</td>
		</tr>
		EOT;
			} else {
			echo <<<EOT
		<tr data-id='$found_tour'>
		<td><a href="http://vtc.northwestvideo.de/job_report?username=$username_cookie&jobid=$found_tour">$found_tour_cargo</a></td>
		<td>$found_tour_depature</td>
		<td>$found_tour_destination</td>
		<td>$money_earned €</td>
		<td>$found_truck_manu $found_truck_mod</td>
		<td>$tour_date_nw</td>
		<td><i class="fas fa-ban" style="color: red !important;"></i> abgebrochen</td>
		<td>$tour_prog %</td>
		<td><i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="$found_tour" style="cursor: pointer;"></i></td>
		</tr>
		EOT;
		}
    }
} else {
}
?> 