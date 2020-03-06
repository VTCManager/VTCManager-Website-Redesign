<?php
date_default_timezone_set('Europe/Berlin');
//hole alle Mitarbeiter der Firma
$sql = "SELECT * FROM user_data WHERE staff_role!='' ORDER BY staff_struct_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		//Daten
		$staff_userID = $row["userID"];
        $staff_username = $row["username"];
		$staff_avatar_url = $row["profile_pic_url"];
		$staff_rank = $row["staff_role"];
		$staff_time_online_raw = $row["last_seen"];
		$staff_last_client_update = $row["last_loc_update"];
		$staff_pos_x = $row["coordinate_x"];
		$staff_pos_y = $row["coordinate_y"];
		//check von Online Status
		if(strtotime($staff_time_online_raw) > strtotime("-2 minutes")) {
			if(strtotime($staff_last_client_update) > strtotime("-30 seconds")){
				$json_trucky = file_get_contents("https://api.truckyapp.com/v2/map/ets2/resolve?x=$staff_pos_x&y=$staff_pos_y");
				$obj_trucky = json_decode($json_trucky);
				$staff_online_status = "<i class='fas fa-truck' style='color:green;'></i> online in der Nähe von ".$obj_trucky->response->poi->realName;
				}else{
					$staff_online_status = "<i class='fas fa-signal' style='color:green;'></i> online";
					}
			}else{
				/*
				$employee_time_online = new DateTime($employee_time_online_raw);
				$since = $employee_time_online->diff(new DateTime());
				if($since->y == 0){
					if($since->m == 0){
						if($since->d == 0){
							if($since->h == 0){
								$since_conv = $since->i." Minuten";
								}else{
									$since_conv = $since->h." Stunden ".$since->i." Minuten";
									}
							}else{
								$since_conv = $since->d." Tage ".$since->h." Stunden ".$since->i." Minuten";
								}
						}else{
							$since_conv = $since->m." Monaten ".$since->d." Tage ".$since->h." Stunden ".$since->i." Minuten";
							}
					}else{
						$since_conv = $since->y." Jahren ".$since->m." Monaten ".$since->d." Tage ".$since->h." Stunden ".$since->i." Minuten";
						}*/
						$staff_time_online_raw = date('d.m.Y H:i', strtotime($staff_time_online_raw));
				$staff_online_status = "<i class='fas fa-bed'></i> zuletzt online ".$staff_time_online_raw;
				}
			//Ausgabe der Daten
		echo "<tr id='$staff_userID' >";
		?>
		<td><img class="profilePicture" src="<?php echo $staff_avatar_url;?>"> <?php echo $staff_username; ?></td>
		<td><?php echo $staff_rank; ?></td>
		<td><?php echo $staff_online_status; ?></td>
		<td><button class="btn btn-primary btn-sm" data-id="<?php echo $staff_userID; ?>" onclick="load_employee(this)" data-toggle="modal" data-target="#viewemployee" style="margin:.0rem;"><i class="fas fa-info-circle mr-1"></i> Informationen</button></td>
		</tr>
		<?php
    }
} else {
	//Keine Mitarbeiter Ausnahme
	echo "In deiner Firma befinden sich keine Mitarbeiter.";
}
?> 
