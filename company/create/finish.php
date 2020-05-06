<?php 
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'message':
            $rg_company_about_us = $value;
            break;
        default:
            break;
    }
}
if(isset($_COOKIE['authWebToken'])) {
		$username_cookie = $_COOKIE["username"]; 
		$authCode_cookie = $_COOKIE["authWebToken"]; 
		$host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  
		$sql = "SELECT * FROM authCode_table WHERE Token='$authCode_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_token_owner = $row["User"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
		if ($found_token_owner != $username_cookie) {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("wrong owner detected");
		}
}else{
	setcookie("username", "", time() - 13600,'/');
	setcookie("authWebToken", "", time() - 13600,'/');
	header("Refresh:0; url=https://vtc.northwestvideo.de/");
	die("wrong owner detected");
}
$sql = "SELECT * FROM user_data WHERE username='$found_token_owner'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_comp_id = $row["userCompanyID"];
			}
		}
$myfile = fopen("../../media/articles/company_about_us/$found_comp_id.txt", "w");
fwrite($myfile, $rg_company_about_us);
fclose($myfile);
$conn->close();
header("Refresh:0; url=https://vtc.northwestvideo.de/company/?companyid=$found_comp_id");
	die();
?>