<?php
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
		$tour_date_nw = date('d.m.Y', strtotime($tour_date));
		$sql2 = "SELECT * FROM user_data WHERE username='$found_tour_username'";
		$result2 = $conn->query($sql2);
		echo "<tr data-id='$found_tour_username,$found_tour'>";
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row2 = $result2->fetch_assoc()) {
				$found_job_user_id = $row2["userID"];
				echo '<td><a href="/account/?userid='.$found_job_user_id.'">'.$found_tour_username.'</a></td>';
			}
		} else {
			echo '<td>'.$found_tour_username.'</td>';
		}
		echo <<<EOT
		<td><a href="../job_report?username=$found_tour_username&jobid=$found_tour">$found_tour_cargo</a></td>
		<td>$found_tour_depature</td>
		EOT;
		$tour_approved_line = "";
		$delete_bt = "";
    }
} else {
}
?> 