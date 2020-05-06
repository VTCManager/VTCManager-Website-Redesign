<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'username':
            $username = $value;
            break;
        case 'password':
            $passwd = $value;
            break;
		case 'email':
            $email = $value;
            break;
		case 'fullname':
            $full_name = $value;
            break;
        default:
            break;
    }
}
if ($username=="" or $passwd=="" or $email=="") {
	die("Error:1");
}
$activate_hash = md5( rand(0,1000) ); 
$passwdhsh = hash('sha256',$passwd);
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
$username = $conn->real_escape_string($username);
$passwd = $conn->real_escape_string($passwd);
$email = $conn->real_escape_string($email);
$full_name = $conn->real_escape_string($full_name);
$sql = "SELECT email_address FROM user_data WHERE email_address='$email'"; //check falls email schon registriert
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email_found = $row["email_address"];
	if ($email_found == $email) {
		echo "email already exist";
	    exit;}
    }
} else {
    echo "0 results";
}

if(! $conn )  
{  
  die("2");  
}  
$sql = "SELECT username FROM user_data WHERE username='$username'";//check falls username schon registriert
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $username_found = $row["username"];
	if ($username_found == $username) {
		echo "username already exist";
	    exit;}
    }
} else {
}
$sql = "SELECT * FROM data_service WHERE Name='total_user'";//letzte userid holen
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $old_num = $row["Value_int"];
    }
} else {
    echo "0 results";
}
(int)$old_num++;
$sql = "UPDATE data_service SET Value_int=$old_num WHERE Name='total_user'";//letzte userid aktualisieren

if ($conn->query($sql) === TRUE) {
} else {
    die("Error updating record: " . $conn->error);
}
$sql = "INSERT INTO user_data (user_id, username, full_name, email_address, password_hash, activate_hash, language)
VALUES ($old_num, '$username', '$full_name', '$email', '$passwdhsh', '$activate_hash', 'de')";//Nutzer registrieren
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	die("Error");
}
mysqli_close($conn); 
$to      = $email; // Send email to our user
$subject = 'Registrierung | Bestätigung'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
------------------------
 
Please click this link to activate your account:
http://www.vtc.northwestvideo.de/verify.php?email='.$email.'&hash='.$activate_hash.'
 
'; // Our message above including the link
                     
$headers = 'From:service@northwestvideo.de' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our emai
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$sql = "INSERT INTO user_data (userID, userCompanyID, username, profile_pic_url, last_tour_id, rank, lang)
VALUES ('$old_num', '0', '$username', 'https://vtc.northwestvideo.de/media/profile_pictures/default_avatar.png', '0', 'driver', 'de')";

if ($conn->query($sql) === TRUE) {
	$myfile = fopen("../../../media/articles/profil_about_me/$old_num.txt", "w") or die("Unable to open file!");
	fwrite($myfile, "");
	fclose($myfile);
    echo "New record created successfully";
	header("Location: https://vtc.northwestvideo.de/success/register_success"); /* Browser umleiten */

/* Stellen Sie sicher, dass der nachfolgende Code nicht ausgefuehrt wird, wenn
   eine Umleitung stattfindet. */
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?> 
