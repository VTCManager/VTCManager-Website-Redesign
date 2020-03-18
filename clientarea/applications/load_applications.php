<?php
$sql = "SELECT * FROM application WHERE byUserID=$userID ORDER BY time DESC LIMIT $start_from, ".$results_per_page;
		$result1 = $conn->query($sql);
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
				$appli_time = $row["time"];
		$appli_id = $row["applicationID"];
				$appli_forCompanyID = $row["forCompanyID"];
		$sql = "SELECT * FROM company_information_table WHERE id=$appli_forCompanyID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$appli_comp_name = $row["name"];
			}
		} else {
			$appli_comp_name = "Unbekannt";
		}
				
				$sql = "SELECT * FROM user_data WHERE userID=$byUserID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$appli_username = $row["username"];
						}
				} else {
					$appli_username = "Unbekannt";
				}
				if($appli_status == "sent"){
					$appli_status_tra = "Überprüfung durch Firma ausstehend";
				}else if($appli_status == "declined"){
					$appli_status_tra = "Bewerbung abgelehnt";
				}else if($appli_status == "accepted"){
					$appli_status_tra = "Warte auf Bestätigung durch den Bewerber";
					$appli_button = '<a href="accept_application?id='.$appli_id.'" type="button" class="btn btn-success">Annehmen</a>';
				}else if($appli_status == "acceptedbyuser"){
					$appli_status_tra = "Bewerber eingestellt";
				}
				?>
				<tr>
				<td><a href="https://vtc.northwestvideo.de/account/?userid=<?php echo $byUserID;?>" style="color:white;"><?php echo $appli_username;?></a></td>
				<td><?php echo $appli_comp_name;?></td>
                <td><?php echo $forRank;?></td>
                <td><?php echo $appli_status_tra;?></td>
				<td><?php echo $appli_time;?></td>
				<td><?php echo $appli_button;?></td>
		</tr>
				<?php
				$appli_button = "";
					}
		} else {
			echo("Keine Bewebungen gefunden!");
		}
		?>
