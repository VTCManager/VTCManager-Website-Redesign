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

$sql = "SELECT * FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hash = $row["password_hash"];
	$lang = $row["language"];
    }
} else {
    echo "Error: User_Invalid";
	die();
}
if ($passwd==$hash) {
	mysqli_close($conn); 
    $token = bin2hex(random_bytes(64));
    if($lang == "de"){
	$conn2 = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
	}else{
	    $conn2 = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager_en");  
	    }
	if(! $conn2 )  
	{  
		die("2");  
	}  
	$sql2 = "SELECT * FROM authCode_table WHERE Token='$token'";
	$result = $conn2->query($sql2);
	if ($result->num_rows > 0) {
    // output data of each row
		die("Error: Serverside2");
    }
	$sql3 = "INSERT INTO authCode_table (User, Token, Expires)
VALUES ('$user', '$token', '')";
	if ($conn2->query($sql3) === TRUE) {
	    echo str_replace("+%0a","",$token);
	} else {
		
		die();
	}
	
} else {
    echo "Error: PIN_Invalid";
	die();
} 
mysqli_close($conn2); 
die();
?> 
