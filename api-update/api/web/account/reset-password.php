<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
		case 'email':
            $email = $value;
            break;
        default:
            break;
    }
}
if ($email=="") {
	die("Error:1");
}
$reset_hash = md5( rand(0,1000) ); 
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
$email = $conn->real_escape_string($email);

$sql = "SELECT * FROM user_data WHERE email_address='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email_found = $row["email_address"];
	    $username_found = $row["username"];
    }
} else {
    echo "0 results";
}

if(! $conn )  
{  
  die("2");  
}  


$sql = "UPDATE user_data SET reset_hash='$reset_hash' WHERE email_address='$email'";

if ($conn->query($sql) === TRUE) {
} else {
    die("Error updating record: " . $conn->error);
}
mysqli_close($conn); 
$to      = $email; // Send email to our user
$subject = 'Passwort zurücksetzen'; // Give the email a subject 
$message = '
 
------------------------
Username: '.$username_found.'
------------------------
 
Please click this link to reset you password:
http://www.vtc.northwestvideo.de/account/password_reset.php?email='.$email.'&hash='.$reset_hash.'
 
'; // Our message above including the link
                     
$headers = 'From:service@northwestvideo.de' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our emai

	header("Location: https://vtc.northwestvideo.de/"); /* Browser umleiten */

/* Stellen Sie sicher, dass der nachfolgende Code nicht ausgefuehrt wird, wenn
   eine Umleitung stattfindet. */
	exit;
?> 
