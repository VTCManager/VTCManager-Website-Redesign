<?php
$sql = "SELECT * FROM application WHERE forCompanyID=$company ORDER BY time DESC LIMIT $start_from, ".$results_per_page;
		$result1 = $conn->query($sql);
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
				$appli_time = $row["time"];
				$appli_id = $row["applicationID"];
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
					$appli_status_tra = "Überprüfung ausstehend";
				}else if($appli_status == "declined"){
					$appli_status_tra = "Bewerbung abgelehnt";
				}else if($appli_status == "accepted"){
					$appli_status_tra = "Warte auf Bestätigung durch den Bewerber";
				}else if($appli_status == "acceptedbyuser"){
					$appli_status_tra = "Bewerber eingestellt";
				}
				?>
				<tr>
				<td><a href="https://vtc.northwestvideo.de/account/?userid=<?php echo $byUserID;?>"><?php echo $appli_username;?></a></td>
                <td><?php echo $forRank;?></td>
                <td><?php echo $appli_status_tra;?></td>
                <td><?php echo $appli_time;?></td>
				<td><form action="view" method="post" name="createnewrankForm" id="createnewrankForm">
					<button class="btn btn-info" name="id" value="<?php echo $appli_id;?>">Öffnen</button>
			</form></td>
		</tr>
				<?php
					}
		} else {
			echo("Keine Bewebungen gefunden!");
		}
		?>
