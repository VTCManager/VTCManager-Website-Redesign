<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'receiver':
            $receiver = $value;
            break;
        case 'amount':
            $amount = $value;
            break;
		case 'message':
            $message = $value;
            break;
        default:
            break;
    }
}

$amount_conv = floatval($amount);
if(!isset($_COOKIE['authWebToken'])) {
	die("404");
}
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$receiver = $conn->real_escape_string($receiver);
$amount = $conn->real_escape_string($amount);
$message = $conn->real_escape_string($message);


$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			echo "0 results2";
		}
		if ($found_token_owner != $username_cookie) {
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$tra_user_com_id =$row["userCompanyID"];
				$tra_user_rank =$row["rank"];
				if ($tra_user_rank != "owner"){
					die("unathorized");
				}
				
				$sql = "SELECT * FROM company_information_table WHERE id=$tra_user_com_id";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$tra_user_com_name = $row["name"];
						$tra_comp_bank_balance = $row["bank_balance"];
					}
				} else {
					die("Fehler: Absender existiert nicht"); 
				}
			}
		} else {
			die("Fehler: Dein Benutzeraccount existier nicht!"); 
		}
$sql = "SELECT * FROM user_data WHERE username='$receiver'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$receiver_comp = false;
				$tra_receiver_bb =$row["bank_balance"];
				}
			} else{
			$sql = "SELECT * FROM company_information_table WHERE name='$receiver'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$receiver_comp = true;
				$tra_receiver_bb =$row["bank_balance"];
				}
			}else  {
			die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");  
		}
		}
$amount_conv = floatval($amount);
$tra_receiver_bb_conv = floatval($tra_receiver_bb);
$tra_receiver_bb_new = $tra_receiver_bb_conv + $amount_conv;
$tra_comp_bank_balance_conv = floatval($tra_comp_bank_balance);
$tra_comp_bank_balance_new = $tra_comp_bank_balance_conv - $amount_conv;
if ($receiver_comp == true){
	$sql = "UPDATE company_information_table SET bank_balance=$tra_receiver_bb_new WHERE name='$receiver'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
} else {
	$sql = "UPDATE user_data SET bank_balance=$tra_receiver_bb_new WHERE username='$receiver'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
}


	$sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status)
VALUES ('$tra_user_com_name', '$receiver', '$message',$amount_conv, 'sent')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
$sql = "UPDATE company_information_table SET bank_balance=$tra_comp_bank_balance_new WHERE id='$tra_user_com_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
mysqli_close($conn); 
header("Location: /clientarea/management/bank");
exit;
?> 
