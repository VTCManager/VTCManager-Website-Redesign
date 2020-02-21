<?php
//hole alle Touren aus der DB der Firma
$sql = "SELECT * FROM user_data WHERE userCompanyID=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$employee_userID = $row["userID"];
        $employee_username = $row["username"];
		$employee_avatar_url = $row["profile_pic_url"];
		$employee_rank = $row["rank"];
		$found_truck_mod = $row["truck_model"];
		$found_tour_cargo = $row["cargo"];
		$found_tour = $row["tour_id"];
		$money_earned = $row["money_earned"];
		$tour_date = $row["tour_date"];
		$tour_status = $row["status"];
		$tour_prog = $row["percentage"];
		$tour_approved = $row["tour_approved"];
		$sql2 = "SELECT * FROM tour_table WHERE username='$employee_username' AND companyID=1 AND status='accepted'";
		$result2 = $conn->query($sql2);
		$employee_tours = $result2->num_rows;
		$sql2 = "SELECT * FROM career_table WHERE username='$employee_username' AND atCompanyID=1 AND end_date=0000-00-00";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			while($row2 = $result2->fetch_assoc()) {
				$employee_joined_date = $row2["start_date"];
			}
		}else{
			$employee_joined_date = "nicht abrufbar";
			}
		echo "<tr data-id='$found_tour_username,$found_tour' id='$found_tour_username,$found_tour' >";
		?>
		<td><?php echo $employee_username; ?></td>
		<td><?php echo $employee_rank; ?></td>
		<td><?php echo $employee_joined_date; ?></td>
		<td><?php echo $employee_tours; ?></td>
		<td>$tour_status_tra</td>
		<td>$tour_prog %</td>
		<td>$tour_approved_line</td>
		<td>$delete_bt</td>
		</tr>
		<?php
    }
} else {
	echo "In deiner Firma befinden sich keine Mitarbeiter.";
}
?> 
