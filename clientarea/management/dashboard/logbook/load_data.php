<?php
//hole alle Touren aus der DB der Firma
$sql = "SELECT * FROM tour_table WHERE companyID=$user_company_id ORDER BY `tour_date` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$found_tour_username = $row["username"];
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
		$tour_approved = $row["tour_approved"];
		//Konvertierung des Fahrtdatums
		$tour_date_nw = date('d.m.Y', strtotime($tour_date));
		//ist die Tour abgeschlossen?
		if ($tour_status== "finished") {
			//ist die Tour noch nicht bestätigt worden?
			if($tour_approved == "0"){
				//hat der Benutzer Rechte zur Prüfung?
				if ($EditLogbook=="1"){
					//dann setze den Prüfen Button
				$tour_approved_line = 
					<<<EOT
					<a class="btn btn-primary" data-id="$found_tour_username,$found_tour" onclick="load_tourcheck(this)" data-toggle="modal" data-target="#tourcheck">Prüfung</a>
					EOT;
				}
			}
			$tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> abgeschlossen';
			//wird die Tour noch gefahren?
		} else if ($tour_status== "accepted by driver"){
		    
			if (strtotime($tour_date) < strtotime("-1 day")){
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
			}
			$tour_status_tra = '<i class="fas fa-business-time"></i> Auslieferung';
		}else if ($tour_status== "canceled"){
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgebrochen';
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
		}else if ($tour_status== "declined"){
		    $tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgelehnt';
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
		}else if ($tour_status== "accepted"){
	     	$tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> akzeptiert';
		}
		$sql2 = "SELECT * FROM user_data WHERE username='$found_tour_username'";
		$result2 = $conn->query($sql2);
		echo "<tr data-id='$found_tour_username,$found_tour' id='$found_tour_username,$found_tour' >";
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row2 = $result2->fetch_assoc()) {
				$found_job_user_id = $row2["userID"];
				echo '<td><a class="tour_url" href="/account/?userid='.$found_job_user_id.'">'.$found_tour_username.'</a></td>';
			}
		} else {
			echo '<td>'.$found_tour_username.'</td>';
		}
		echo <<<EOT
		<td><a class="tour_url" href="../job_report?username=$found_tour_username&jobid=$found_tour">$found_tour_cargo</a></td>
		<td>$found_tour_depature</td>
		<td>$found_tour_destination</td>
		EOT;
		if($tour_status == "finished" || $tour_status == "accepted"){
		echo "<td>$money_earned €</td>";
		}else{
		echo "<td></td>";
		}
		echo <<<EOT
		<td>$found_truck_manu $found_truck_mod</td>
		<td>$tour_date_nw</td>
		<td>$tour_status_tra</td>
		<td>$tour_prog %</td>
		<td>$tour_approved_line</td>
		<td>$delete_bt</td>
		</tr>
		EOT;
		$tour_approved_line = "";
		$delete_bt = "";
    }
} else {
}
?> 
