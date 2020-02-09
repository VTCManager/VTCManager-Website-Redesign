<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'username':
            $user = $value;
            break;
        case 'password':
            $passwd = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
}  

$passwdhsh = hash('sha256',$passwd);


// 1. Abfrage aus der user_data
$sql = "SELECT * FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hash = $row["password_hash"];
		$email_active = $row["activate_hash"];
    }
} else {
    die("Can't find user");
}
//if($email_active != "activated"){
//	die("your mail adress isn't activated yet");
//}

if ($passwdhsh==$hash) {
	mysqli_close($conn); 
    // Warum schliesst ihr hier die Verbindung...
	$token = bin2hex(random_bytes(64)); 
    // und macht sie hier wieder auf ??
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
	$sql = "SELECT * FROM authCode_table WHERE Token='$token'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		die("Error: Serverside2");
    }
	$date = date('Y-m-d H:i:s');
	$date = strtotime($date . ' +1 day');
	$sql = "INSERT INTO authCode_table (User, Token, Expires) VALUES ('$user', '$token', NOW())";
	if ($conn->query($sql) === TRUE) {
	} else {
		die("authCode creat failed");
	}
} else {
    die('Invalid password.');
}

// Hier greift ihr das 2. mal auf die gleiche Tabelle wie oben zu ! $userCompanyID oben speichern, dann könnt ihr euch das schenken
$sql = "SELECT * FROM user_data WHERE username='$user'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
        $userCompanyID = $row["userCompanyID"];
	$userLangID = $row["lang"];
    }
    }
if($userLangID != "de"){
    die("you're accessing this website on the wrong translation. Your language code is: "+$userLangID);
    // Eventuell statt Bescheid sagen, gleich auf EN umleiten
    }
setcookie("authWebToken",$token,time() + 86400,'/');
setcookie("username",$user,time() + 86400, '/');
header("Location: /clientarea/management/dashboard"); 
exit;


mysqli_close($conn); 
?> 
