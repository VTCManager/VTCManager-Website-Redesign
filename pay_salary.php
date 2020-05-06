<?php
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn ){  
	die("2");  
}  
$sql3 = "SELECT * FROM company_information_table";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
	while($row3 = $result3->fetch_assoc()) {
		$company_name = $row3["name"];
		echo "Sending salary for $company_name";
		$company_id = $row3["id"];
		$company_bb = (int)$row3["bank_balance"];
		$sql4 = "SELECT * FROM rank WHERE forCompanyID=$company_id";
		$result4 = $conn->query($sql4);
		if ($result4->num_rows > 0) {
			while($row4 = $result4->fetch_assoc()) {
				$rank_salary = (int)$row4["salary"];
				$rank_name = $row4["name"];
				$sql5 = "SELECT * FROM user_data WHERE userCompanyID=$company_id AND rank='$rank_name'";
				$result5 = $conn->query($sql5);
				if ($result5->num_rows > 0) {
					while($row5 = $result5->fetch_assoc()) {
						$user_name = $row5["username"];
						$user_bb = (int)$row5["bank_balance"];
						$user_bb = $user_bb + $rank_salary;
						$company_bb = $company_bb - $rank_salary;
						$sql6 = "UPDATE user_data SET bank_balance=$user_bb WHERE username='$user_name'";
						if ($conn->query($sql6) === TRUE) {
						} else {
							echo "Error updating record: " . $conn->error;
							die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
						}
						$sql7 = "INSERT INTO money_transfer (sender, receiver, message, amount, status) VALUES ('$company_name', '$user_name', 'Gehalt',$rank_salary, 'sent')";
						if ($conn->query($sql7) === TRUE) {
						} else {
							echo "Error: " . $sql7 . "<br>" . $conn->error;
							die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
						}
						// Your POST data
						$data = http_build_query(array(
						'fu' => $user_name,
						'evnt' => 'new.salary',
						'evntid' => '0',
						'evbyu' => $company_name
						));
						// Create HTTP stream context
						$context = stream_context_create(array(
						'http' => array(
						'method' => 'POST',
						'header' => 'Content-Type: application/x-www-form-urlencoded',
						'content' => $data
						)
						));
						// Make POST request
						$response = file_get_contents('http://vtc.northwestvideo.de/notifications/notify.php', false, $context);
						if ($result === FALSE) { /* Handle error */ }
					}
					$sql8 = "UPDATE company_information_table SET bank_balance=$company_bb WHERE id=$company_id";
						if ($conn->query($sql8) === TRUE) {
						} else {
							echo "Error updating record: " . $conn->error;
							die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
						}
				}
			}
		}
	}
} else {
		echo "done!";
}
?>
