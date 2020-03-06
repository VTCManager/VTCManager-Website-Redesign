<?php
//hole alle Touren aus der DB der Firma
$sql = "SELECT * FROM tour_table WHERE companyID=$user_company_id ORDER BY `tour_date` DESC LIMIT $start_from, ".$results_per_page;
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
			//ist die Tour noch nicht bestätigt worden?
			if($tour_approved == "0"){
				//hat der Benutzer Rechte zur Prüfung?
				if ($EditLogbook=="1"){
					//dann setze den Prüfen Button
				$tour_approved_line = 
					'<a class="btn btn-primary" data-id="'.$found_tour_username.','.$found_tour.'" onclick="load_tourcheck(this)" data-toggle="modal" data-target="#tourcheck">Prüfung</a>';
				}
			}
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
		//Fahrer ID laden
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
		echo '<td><a class="tour_url"  data-id="'.$found_tour_username.','.$found_tour.'" onclick="load_tourview(this)" data-toggle="modal" data-target="#tourview">'.$found_tour_cargo.'</a></td>';
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
