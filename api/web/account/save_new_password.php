<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'password':
            $passwd = $value;
            break;
		case 'email':
            $email = $value;
            break;
        default:
            break;
    }
}
if ($passwd=="" or $email=="") {
	die("Error:1");
}
$passwdhsh = hash('sha256',$passwd);
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  

if(! $conn )  
{  
  die("2");  
}  
$sql = "UPDATE user_data SET password_hash='$passwdhsh' WHERE email_address='$email'";//letzte userid aktualisieren

if ($conn->query($sql) === TRUE) {
} else {
    die("Error updating record: " . $conn->error);
}
	header("Location: https://vtc.northwestvideo.de/account/login"); /* Browser umleiten */

/* Stellen Sie sicher, dass der nachfolgende Code nicht ausgefuehrt wird, wenn
   eine Umleitung stattfindet. */
	exit;

mysqli_close($conn);
?> 
