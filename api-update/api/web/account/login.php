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
$user = $conn->real_escape_string($user);
$passwd = $conn->real_escape_string($passwd);
 
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
if ($lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de") {
	header("Location: /account/logbook/"); 
	exit;
}else{
	header("Location: /en/account/logbook/"); 
	exit;
}


mysqli_close($conn); 
?> 
