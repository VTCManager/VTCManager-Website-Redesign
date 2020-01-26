<?php
if ($lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de") {
}else{
	header("Location: https://vtc.northwestvideo.de/en/account/login");
die();
}

?>
<!DOCTYPE html>
<html lang="de" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <?php include '../basis_header.php'; ?> 
	<link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/interface_main.css">

        <title>Anmelden - VTCManager</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<script>$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});</script>
    </head>
	<style>.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://vtc.northwestvideo.de/media/loading_spinner.gif) center no-repeat #fff;
}</style>
<body class="account-login-page">
<div class="se-pre-con"></div>
    <div class="loginFormWrapper">
        <div class="loginForm">
            <h1 style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Anmelden</h1>
            <hr class="underline" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
            
            <form action="/api/web/account/login.php" method="post" name="loginform" id="account-login-form" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                <input type="text" name="username" id="username" class="form-control" placeholder="Benutzername" value="" required="">
                <input type="password" name="password" id="password" class="form-control" placeholder="Passwort" maxlength="150" required="">
                <p><a href="https://vtc.northwestvideo.de/account/reset-password">Passwort vergessen?</a></p>
                                <input type="submit" name="submit" class="btn btn-default btn-block" value="Anmelden">
                <p>Neu bei VTCManager? <br>Jetzt <a href="https://vtc.northwestvideo.de/account/register">registrieren</a>!</p>
            </form>
        </div>
    </div>
	<script type="text/javascript" async="" defer="" src="./Anmelden - VTCManager_files/piwik.js.Download"></script><script type="text/javascript" src="./Anmelden - VTCManager_files/jquery.min.js.Download"></script>
    <script type="text/javascript" src="./Anmelden - VTCManager_files/bootstrap.min.js.Download"></script>
    <script type="text/javascript" src="./Anmelden - VTCManager_files/account.js.Download"></script>
    <script async="" src="./Anmelden - VTCManager_files/js"></script>
</body>
</html>
