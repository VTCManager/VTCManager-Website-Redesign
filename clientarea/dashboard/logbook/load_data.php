<?php
//hole alle Touren aus der DB der Firma
$sql = "SELECT * FROM tour_table WHERE username='$username_cookie' ORDER BY `tour_date` DESC LIMIT $start_from, ".$results_per_page;
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
		$trailer_damage = $row["trailer_damage"];
		$umsatz = (int)$money_earned - ((int)$money_earned*0.19 )-((int)$trailer_damage*100);
		//Konvertierung des Fahrtdatums
		$tour_date_nw = date('d.m.Y', strtotime($tour_date));
		//ist die Tour abgeschlossen?
		if ($tour_status== "finished") {
			$tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> abgeschlossen';
			//wird die Tour noch gefahren?
		} else if ($tour_status== "accepted by driver"){
		    //Tour älter als 2 Tage?
			if (strtotime($tour_date) < strtotime("-2 days")){
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
			}
			$tour_status_tra = '<i class="fas fa-business-time"></i> Auslieferung';
		}else if ($tour_status== "canceled"){
			//Tour abgebrochen
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgebrochen';
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
		}else if ($tour_status== "declined"){
			//Tour angelehnt
		    $tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-ban" style="color: red !important;"></i> abgelehnt';
			$delete_bt = '<i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$found_tour_username.','.$found_tour.'" style="cursor: pointer;"></i>';
		}else if ($tour_status== "accepted"){
			//Tour angenommen
	     	$tour_prog = "100";
			$tour_status_tra = '<i class="fas fa-check-circle" style="color: green !important;"></i> akzeptiert';
		}
		echo "<tr data-id='$found_tour_username,$found_tour' id='$found_tour_username,$found_tour' >";
		echo '<td><a class="tour_url" href="../job_report?username='.$found_tour_username.'&jobid='.$found_tour.'">'.$found_tour_cargo.'</a></td>';
		echo '<td>'.$found_tour_depature.'</td>';
		echo '<td>'.$found_tour_destination.'</td>';
		//soll Einkommen angezeigt werden?
		if($tour_status == "accepted"){
			//wenn bestätigt
		echo "<td>$umsatz €</td>";
		}else if($tour_status == "finished"){
			//wenn Tour abgeschlossen
		echo "<td>ausstehend</td>";
		}else{
		echo "<td></td>";
		}
		echo '<td>'.$found_truck_manu.' '.$found_truck_mod.'</td>';
		echo '<td>'.$tour_date_nw.'</td>';
		echo '<td>'.$tour_status_tra.'</td>';
		echo '<td>'.$tour_prog.' %</td>';
		echo '<td>'.$tour_approved_line.'</td>';
		echo '<td>'.$delete_bt.'</td>';
		echo '</tr>';
		//Werte zurücksetzen
		$tour_approved_line = "";
		$delete_bt = "";
    }
} else {
}
?> 
