<?php 
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$job_scompanyID = "8";
$umsatz = 321381;
				$sql = "SELECT * FROM company_information_table WHERE id=$job_scompanyID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$tra_comp_bank_balance = $row["bank_balance"];
						$tra_comp_name = $row["name"];
					}
				} else {
					die("Fehler: Absender existiert nicht"); 
				}
				$tra_comp_bank_balance_conv = floatval($tra_comp_bank_balance);
				
				$tra_comp_bank_balance_new = $tra_comp_bank_balance_conv + $umsatz;
				
				$sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status)
VALUES ('VTCManager', '$tra_comp_name', 'Geldtransfer',$umsatz, 'sent')";
echo $sql;

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
$sql = "UPDATE company_information_table SET bank_balance=$tra_comp_bank_balance_new WHERE id='$job_scompanyID'";
echo $sql;
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
$sql = "SELECT * FROM user_data WHERE rank='owner' AND userCompanyID=$job_scompanyID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$username = $row["username"];
		// Your POST data
$data = http_build_query(array(
    'fu' => $username,
    'evnt' => 'money_tranfer',
	'evntid' => '0',
	'evbyu' => 'VTCManager'
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
		echo "notif send to $username";

		
	}
} else {
    echo "Error: no company owners";
	die();
}
mysqli_close($conn); 
?> 