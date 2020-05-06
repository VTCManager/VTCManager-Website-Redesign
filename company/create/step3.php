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
?>
<!DOCTYPE html>
<html lang="de" class="gr__vtcmanager_de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/x-icon" href="https://vtc.northwestvideo.de/media/images/favicon.png">
        <link rel="apple-touch-icon" href="https://vtc.northwestvideo.de/media/images/apple-icon.png">
        
        <link rel="stylesheet" type="text/css" href="./Registrieren - VTCManager_files/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./Registrieren - VTCManager_files/main.css">
	<script type="text/javascript" src="./Registrieren - VTCManager_files/jquery.min.js.Download"></script>
	

	<style>
	meter {

  margin: 0 auto 1em;
  width: 100%;
  height: 0.5em;

  /* Applicable only to Firefox */
  background: none;
  background-color: rgba(0, 0, 0, 0.1);
}

meter::-webkit-meter-bar {
  background: none;
  background-color: rgba(0, 0, 0, 0.1);
	
}
	/* Webkit based browsers */
meter[value="1"]::-webkit-meter-optimum-value { background: blue; }
meter[value="2"]::-webkit-meter-optimum-value { background: blue; }
meter[value="3"]::-webkit-meter-optimum-value { background: blue; }
meter[value="4"]::-webkit-meter-optimum-value { background: blue; }

/* Gecko based browsers */
meter[value="1"]::-moz-meter-bar { background: blue; }
meter[value="2"]::-moz-meter-bar { background: blue; }
meter[value="3"]::-moz-meter-bar { background: blue; }
meter[value="4"]::-moz-meter-bar { background: blue; }</style>

        <title>Registrieren - VTCManager</title>
    </head>
<body class="account-login-page" data-gr-c-s-loaded="true">
<div class="loginFormWrapper">
        <div class="loginForm">
            <h1 style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Spedition anmelden</h1>
			<meter max="3" value="3"id="password-strength"style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></meter>
			
            
            <form action="https://vtc.northwestvideo.de/company/create/finish_exist_comp" method="post" name="registerform" id="account-register-form" enctype="multipart/form-data">
                <label for="input-file-now-custom-1">Bitte lade hier nun Bilder hoch, aus denen wir erkennen können, dass es sich hier um dieselbe Spedition handelt und wie hoch der Kontostand ist</label>
				<input type="file" name="file[]" id="file" multiple>
                <input type="submit" name="submit" id="submitbtn" class="btn btn-default btn-block" value="Erstellen">
            </form>
        </div>
	</div>

    <script type="text/javascript" src="./Registrieren - VTCManager_files/bootstrap.min.js.Download"></script>
    <script type="text/javascript" src="./Registrieren - VTCManager_files/tweenmax.min.js.Download"></script>
    
    <script async="" src="./Registrieren - VTCManager_files/js"></script>
</body></html>