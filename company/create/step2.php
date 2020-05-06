<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'company_name':
            $rg_company_name = $value;
            break;
        case 'comp_a_exist':
            $rg_comp_a_exist = $value;
            break;
        default:
            break;
    }
}
if ($rg_comp_a_exist == "true"){
	$rg_comp_a_exist = 1;
}else{
	$rg_comp_a_exist = 0;
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
		$rg_company_name = $conn->real_escape_string($rg_company_name);
		$rg_comp_a_exist = $conn->real_escape_string($rg_comp_a_exist);
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
$sql = "SELECT name FROM company_information_table WHERE name='$rg_company_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		die("Company already exist");
    }
} else {
}
$sql = "SELECT id FROM company_information_table ORDER BY id DESC LIMIT 0, 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rg_last_found_id = $row["id"];
    }
} else {
    die( "Error: Logical issue no:1");
}
(int)$rg_last_found_id++;
$sql = "INSERT INTO company_information_table (id, name, employees, tours_done, driven_km, bank_balance, exist_another_client)
VALUES ($rg_last_found_id, '$rg_company_name', 1, 0, 0, 0, $rg_comp_a_exist)";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
$sql = "SELECT userID FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rg_found_userid = $row["userID"];
    }
} else {
    die( "Error: Logical issue no:1");
}
$sql = "UPDATE user_data SET userCompanyID=$rg_last_found_id, rank='owner' WHERE userID=$rg_found_userid";
if ($conn->query($sql) === TRUE) {
} else {
    die("Error updating record: " . $conn->error);
}
$sql = "INSERT INTO career_table (username, userID, atCompanyID, job)
VALUES ('$username_cookie',$rg_found_userid,$rg_last_found_id,'owner')";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
$sql = "INSERT INTO rank (name, forCompanyID, EditProfile, SeeLogbook, EditLogbook, SeeBank, UseBank, EditEmployees, EditSalary, salary, struct_id) VALUES ('owner',$rg_last_found_id,1,1,1,1,1,1,1,1000,0)";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
$sql = "INSERT INTO rank (name, forCompanyID, EditProfile, SeeLogbook, EditLogbook, SeeBank, UseBank, EditEmployees, EditSalary, salary, struct_id) VALUES ('driver',$rg_last_found_id,0,0,0,0,0,0,0,500,0)";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();
?>
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
			<?php if ($rg_comp_a_exist == 1){
	echo '<meter max="3" value="2"id="password-strength"style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></meter>';
	echo '<form action="https://vtc.northwestvideo.de/company/create/step3" method="post" name="registerform" id="account-register-form">';
}else{
		echo '<meter max="2" value="2"id="password-strength"style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></meter>';
	echo '<form action="https://vtc.northwestvideo.de/company/create/finish" method="post" name="registerform" id="account-register-form">';
}?>
                <textarea name="message" placeholder="Speditionsbeschreibung (optional)" rows="10" cols="40"></textarea>
                <input type="submit" name="submit" id="submitbtn" class="btn btn-default btn-block" value="Weiter">
            </form>
        </div>
	</div>

    <script type="text/javascript" src="./Registrieren - VTCManager_files/bootstrap.min.js.Download"></script>
    <script type="text/javascript" src="./Registrieren - VTCManager_files/tweenmax.min.js.Download"></script>
    
    <script async="" src="./Registrieren - VTCManager_files/js"></script>
</body></html>
