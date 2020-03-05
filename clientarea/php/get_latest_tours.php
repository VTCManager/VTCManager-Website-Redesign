<?php
include '../get_user_data.php'; 
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
$sql = "SELECT status, departure, destination, cargo FROM tour_table WHERE username='$username_cookie' ORDER BY tour_date DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $tour_status = $row['status'];
        if ($tour_status== "finished") {
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> abgeschlossen';
			//wird die Tour noch gefahren?
		} else if ($tour_status== "accepted by driver"){
			$tour_status_tra = '<i class="fas fa-business-time"></i> Auslieferung';
		}else if ($tour_status== "canceled"){
			//Tour abgebrochen
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgebrochen';
		}else if ($tour_status== "declined"){
			//Tour angelehnt
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgelehnt';
		}else if ($tour_status== "accepted"){
			//Tour angenommen
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> akzeptiert';
		}
		echo "<tr><td>".$row['departure']."</td><td>".$row['destination']."</td><td>".$row['cargo']."</td><td>".$tour_status_tra."</td></tr>";
    }
    }else{
        }
        ?>
