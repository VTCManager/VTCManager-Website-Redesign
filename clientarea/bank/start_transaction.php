<?php
require '../get_user_data.php';
//check approach data
if (!isset($_POST["iban"]) || empty($_POST["iban"]) || !isset($_POST["amount"]) || empty($_POST["amount"]) || !isset($_POST["message"]) || empty($_POST["message"])) {
	//incorrect approach
	header("Location: /clientarea/bank/");
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
//generate tan
$tan_code = "";
while (strlen($tan_code) < 6) {
	$tan_code .= strval(rand(0, 9));
}
//send mail
$to      = $user_email_address; // Send email to our user
$subject = 'VTCManager | TAN-Bestätigung'; // Give the email a subject 
$message_email = '
 
Hallo ' . $username . ',
Eine Überweisung wurde soeben auf deinem Konto gestartet. Bitte bestätige die Überweisung nur noch mit der
Eingabe der TAN-Nummer.
 
------------------------
Username: ' . $tan_code . '
------------------------
 
';

$headers = 'From: NorthWestVideo.de <service@northwestvideo.de>';
mail($to, $subject, $message_email, $headers);
//get current transaction time
$date = date('Y-m-d H:i:s');
//insert the transaction data
$sql = "INSERT INTO money_transfer (sender, receiver, message, amount, status, tan)
VALUES ('$user_iban', '$iban', '$message', $amount, 'wait_for_tan', $tan_code)";

if ($conn->query($sql) === TRUE) {
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
}
?>
<form id="myForm" action="verify_tan" method="post">
	<?php
	echo '<input type="hidden" name="tra_id" value="' . $conn->insert_id . '">';
	mysqli_close($conn);
	?>
</form>
<script type="text/javascript">
	document.getElementById('myForm').submit();
</script>