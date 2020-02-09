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
//Passwort verschlüsseln
$passwdhsh = hash('sha256',$passwd);

//Verbindung zu DB aufbauen
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
}  


// hole Passwort
$sql = "SELECT * FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hash = $row["password_hash"];
	$email_active = $row["activate_hash"];
    }
} else {
    mysqli_close($conn); 
    die("Can't find user");
}
//stimmen Passwörter überein?
if ($passwdhsh==$hash) {
	mysqli_close($conn); 
	// Erstelle Random AuthCode
	$token = bin2hex(random_bytes(64)); 
	// und macht sie hier wieder auf ??
	//Antwort: Es sind unterschiedliche Datenbanken
	//Verbindung zu 2.DB aufbauen
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
	$sql = "SELECT * FROM authCode_table WHERE Token='$token'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	        //AuthCode bereits vergeben
		mysqli_close($conn); 
		die("Error: Serverside2");
	}
	//setze AuthCode in Table
	$date = date('Y-m-d H:i:s');
	$date = strtotime($date . ' +1 day');
	$sql = "INSERT INTO authCode_table (User, Token, Expires) VALUES ('$user', '$token', NOW())";
	if ($conn->query($sql) === TRUE) {
	} else {
	        mysqli_close($conn); 
		die("authCode creat failed");
	}
	//hole Benutzersprache
	$sql = "SELECT * FROM user_data WHERE username='$user'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		    $userCompanyID = $row["userCompanyID"];
		    $userLangID = $row["lang"];
		}
	}
	if($userLangID != "de"){
	    mysqli_close($conn); 
	    die("you're accessing this website on the wrong translation. Your language code is: "+$userLangID);
	    // Eventuell statt Bescheid sagen, gleich auf EN umleiten
	}
	mysqli_close($conn); 
	//setze Cookies
	setcookie("authWebToken",$token,time() + 86400,'/');
	setcookie("username",$user,time() + 86400, '/');
	header("Location: /clientarea/management/dashboard"); 
	exit;
} else {
    //Passwort stimmt nicht
    mysqli_close($conn); 
    die('Invalid password.');
}
?> 
