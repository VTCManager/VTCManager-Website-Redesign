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
			die("Deine Anmeldung ist ungültig. Neu anmelden!");
		}
		if ($found_token_owner != $username_cookie) {
			die("Fehler bei der Prüfung der Sitzung. Neu anmelden!");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$bank_balance_user =$row["bank_balance"];
			}
		} else {
			die("Fehler: Dein Benutzername existiert nicht in der Datenbank. Kontaktiere den Support!");
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
			} else {
			die("Fehler: Der Empfänger existiert nicht!"); 
		}
		}

$date = date('Y-m-d H:i:s');
$tra_receiver_bb_conv = floatval($tra_receiver_bb);
$tra_receiver_bb_new = $tra_receiver_bb_conv + $amount_conv;
$bank_balance_user_conv = floatval($bank_balance_user);
$bank_balance_new = $bank_balance_user_conv - $amount_conv;
if ($receiver_comp == true){
	$sql = "UPDATE company_information_table SET bank_balance='$tra_receiver_bb_new' WHERE name='$receiver'";

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
VALUES ('$username_cookie', '$receiver', '$message', $amount_conv, 'sent')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!"); 
}
$sql = "UPDATE user_data SET bank_balance=$bank_balance_new WHERE username='$username_cookie'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!"); 
}

mysqli_close($conn); 
header("Location: /clientarea/bank/?idc=tra_sc");
exit;
?> 
