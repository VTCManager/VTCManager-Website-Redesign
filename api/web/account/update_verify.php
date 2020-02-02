<?php  
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
} 
$sql = "SELECT email_address FROM user_data WHERE username='CorHard'"; //check falls email schon registriert
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$activate_hash = md5( rand(0,1000) ); 
        $email_found = $row["email_address"];
		$username_found = $row["username"];
		$sql2 = "UPDATE user_data SET activate_hash='$activate_hash' WHERE email_address='$email_found'";//letzte userid aktualisieren
		if ($conn->query($sql2) === TRUE) {
		} else {
			die("Error updating record: " . $conn->error);
		}
		$to      = $email_found; // Send email to our user
$subject = 'Registrierung | Bestätigung'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
------------------------
 
Please click this link to activate your account:
http://www.vtc.northwestvideo.de/verify.php?email='.$email_found.'&hash='.$activate_hash.'
 
'; // Our message above including the link
                     
$headers = 'From:service@northwestvideo.de' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our emai
		echo "mail send to $to  ";
	}
} else {
    echo "0 results";
} 
mysqli_close($conn); 
?> 