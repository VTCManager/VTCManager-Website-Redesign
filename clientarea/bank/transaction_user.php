<?php
//THIS IS THE OLD SCRIPT WITHOUT A TAN SYSTEM












//ONLY USE THIS SKRIPT IF THE OLD ONE MAKES PROBLEMS OR THE COMMUNTIY DOESN'T LIKE IT
require '../get_user_data.php';
//check approach data
if (!isset($_POST["iban"]) || empty($_POST["iban"]) || !isset($_POST["amount"]) || empty($_POST["amount"]) || !isset($_POST["message"]) || empty($_POST["message"])) {
	//incorrect approach
	header("Location: /clientarea/bank/?idc=err_invalid_appr");
	exit;
}
//get and filter the data
//iban
$iban = filter_var($_POST["iban"], FILTER_SANITIZE_STRING);
$iban = filter_var($_POST["iban"], FILTER_SANITIZE_SPECIAL_CHARS);
$iban = $conn->real_escape_string($iban);
//message
$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
$message = filter_var($_POST["message"], FILTER_SANITIZE_SPECIAL_CHARS);
$message = $conn->real_escape_string($message);
//amount
$amount = floatval(filter_var($_POST["amount"], FILTER_SANITIZE_NUMBER_FLOAT));
$amount = $conn->real_escape_string($amount);

//GET THE IMPORTANT TRANSACTION INFORMATION
//RECEIVER INFORMATION
$sql = "SELECT * FROM user_data WHERE iban='$iban'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//if we found it's a user
	while ($row = $result->fetch_assoc()) {
		$receiver_comp = false;
		$tra_receiver_bb = $row["bank_balance"];
		$receiver = $row["username"];
	}
} else {
	//else check if a company exist with this iban code
	$sql = "SELECT * FROM company_information_table WHERE iban='$iban'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$receiver_comp = true;
			$tra_receiver_bb = $row["bank_balance"];
			$receiver = $row["name"];
		}
	} else {
		//else receiver doesn't exist
		header("Location: /clientarea/bank/?idc=err_unknown_receiver");
		exit;
	}
}
//get current transaction time
$date = date('Y-m-d H:i:s');
//convert the sql results and add or increase the account balance
$tra_receiver_bb_conv = floatval($tra_receiver_bb);
$tra_receiver_bb_new = $tra_receiver_bb_conv + $amount;
$bank_balance_user_conv = floatval($bank_balance_user);
$bank_balance_new = $bank_balance_user_conv - $amount;
//update the receiver account balance
if ($receiver_comp == true) {
	$sql = "UPDATE company_information_table SET bank_balance='$tra_receiver_bb_new' WHERE iban='$iban'";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
		die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
	}
} else {
	$sql = "UPDATE user_data SET bank_balance=$tra_receiver_bb_new WHERE iban='$iban'";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
		die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
	}
}
//insert the transaction data
$sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status)
VALUES ('$username_cookie', '$receiver', '$message', $amount, 'sent')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
//update user account balance
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