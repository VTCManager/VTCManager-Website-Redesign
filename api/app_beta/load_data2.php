<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'authcode':
            $authCode = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT User FROM authCode_table WHERE Token='a6c7d6c6cb708f096b94cbd22887f85cbb822bdcf779ea54da56d1a4eb5f2ec6349c1f621c9d2d6f6b841072774df8065c6dbb09a388e66387b2dbbcf9f475de'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user = $row["User"];
    }
} else {/*
    mysqli_close($conn); 
    $host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager_en");  
if(! $conn )  
{  
  die("2");  
}  

$sql = "SELECT User FROM authCode_table WHERE Token='$authCode'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user = $row["User"];
    }
} else {*/
    echo "Error: Token_Invalid";
	die();
//}
}
	$sql = "SELECT * FROM user_data WHERE username='$user'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$userCompanyID = $row["userCompanyID"];
			$userid = $row["userID"];
			$username = $row["username"];
			$profile_pic_url = $row["profile_pic_url"];
			$last_tour_id = $row["last_tour_id"];
			$bank_balance = $row["bank_balance"];
			$sql = "SELECT * FROM company_information_table WHERE id='$userCompanyID'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$userCompanyName = $row["name"];
				}
			} else {
				$userCompanyName = "0";
			}
			echo $userid. ",".$userCompanyName.",".$username.",".$profile_pic_url.",".$last_tour_id.",".$bank_balance;
		}
    }



mysqli_close($conn); 
?> 
