<?php  
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "nwv_api_user", "paswdmysqlllol29193093KK","nwv_api");  

if(! $conn )  
{  
  die("2");  
} 
             
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL); // Set email variable
    $hash = filter_input(INPUT_GET, "hash", FILTER_SANITIZE_STRING); // Set hash variable
    $email = $conn->real_escape_string($email);
    $hash = $conn->real_escape_string($hash);

                 
	$sql = "SELECT * FROM user_data WHERE email_address='$email' AND activate_hash='$hash'";
	$result = $conn->query($sql);
                 
    if($result->num_rows > 0){
        // We have a match, activate the account
        $sql = "UPDATE user_data SET activated=1,activate_hash='activated' WHERE email_address='$email' AND activate_hash='$hash'";

if ($conn->query($sql) === TRUE) {
	echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Dein Account wurde erfolgreich aktiviert!</strong></p>
</div></div>';
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="container"><div class="danger" style="background-color: #ffb5b5;
  border-left: 6px solid #ff0000;">
  <p><strong>&nbsp;The url is either invalid or you already have activated your account.</strong></p>
</div></div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
 
?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>E-Mail Bestätigung - VTCManager</title>
	  <?php include 'basis_header.php'; ?>  
  </head>
  <body>
	  <?php include 'navbar.php'; ?>  
	      <footer class="footer">
        <div class="container">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
