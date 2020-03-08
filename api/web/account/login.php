<?php
if(isset($_COOKIE['authWebToken']) && isset($_COOKIE['username'])) {
	//lade die Cookie-Daten
	$username_cookie = $_COOKIE["username"]; 
	$authCode_cookie = $_COOKIE["authWebToken"]; 
		
	//Verbindung mit DB herstellen
	$host = 'localhost:3306';    
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
	if(! $conn ){  
		die("2");  
	}  
		
	//Suche nach dem gleichen AuthCode
	$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$found_token_owner = $row["User"];
			}
	} else {
		//AuthCode nicht gefunden
		//Reset der Cookies und redirect zur Homepage
		setcookie("username", "", time() - 13600,'/');
		setcookie("authWebToken", "", time() - 13600,'/');
		header("Refresh:0; url=/");
		die("We couldn't find your session in our database. Redirecting to our homepage...");
	}
	//Prüfung ober der in der DB für den AuthCode Token hinterlegte Username mit Username Cookie übereinstimmt
	//Sicherheitsprüfung für unbrechtigten Zugang
	if ($found_token_owner != $username_cookie) {
		//Reset der Cookies und redirect zur Homepage
		setcookie("username", "", time() - 13600,'/');
		setcookie("authWebToken", "", time() - 13600,'/');
		header("Refresh:0; url=/");
		die("wrong owner detected");
	}
	//Lade Benutzerdaten aus der DB
	$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$userID = $row["userID"];
			$user_rank = $row["rank"];
			$user_avatar_url = $row["profile_pic_url"];
			$user_company_id = $row["userCompanyID"];
		}
	} else {
		//Der Benutzer konnte in der DB nicht gefunden werden
		die("We're sorry but we couldn't find your profile");
	}
	//load data and redirect to specific interface
	header("Location: /clientarea");
	die();
}
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
$conn = mysqli_connect($host, "nwv_api_user", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
}  
$passwdhsh = hash('sha256',$passwd);

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
	$token = bin2hex(random_bytes(64)); 
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
	$sql = "SELECT * FROM authCode_table WHERE Token='$token'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		die("Error: Serverside2");
    }
	$date = date('Y-m-d H:i:s');
	$date = strtotime($date . ' +1 day');
	$sql = "INSERT INTO authCode_table (User, Token, Expires)
VALUES ('$user', '$token', NOW())";
	if ($conn->query($sql) === TRUE) {
	} else {
		
		die("authCode creat failed");
	}
} else {
    die('Invalid password.');
}
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
    }
setcookie("authWebToken",$token,time() + 86400,'/');
setcookie("username",$user,time() + 86400, '/');
header("Location: /clientarea"); 
exit;


mysqli_close($conn); 
?> 
