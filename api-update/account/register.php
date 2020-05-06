<!DOCTYPE html>
<html lang="de" class="gr__vtcmanager_de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="theme-color" content="#ff8000">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">

        <meta property="og:site_name" content="VTCManager">
        <meta property="og:title" content="Registrieren - VTCManager">
        <meta property="og:url" content="https://vtc.northwestvideo.de/account/register">
        <meta property="og:type" content="website">

        <link rel="icon" type="image/x-icon" href="https://vtc.northwestvideo.de/media/images/favicon.png">
        <link rel="apple-touch-icon" href="https://vtc.northwestvideo.de/media/images/apple-icon.png">
        
        <link rel="stylesheet" type="text/css" href="./Registrieren - VTCManager_files/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./Registrieren - VTCManager_files/main.css">
	<script type="text/javascript" src="./Registrieren - VTCManager_files/jquery.min.js.Download"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
	

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
meter[value="1"]::-webkit-meter-optimum-value { background: red; }
meter[value="2"]::-webkit-meter-optimum-value { background: yellow; }
meter[value="3"]::-webkit-meter-optimum-value { background: orange; }
meter[value="4"]::-webkit-meter-optimum-value { background: green; }

/* Gecko based browsers */
meter[value="1"]::-moz-meter-bar { background: red; }
meter[value="2"]::-moz-meter-bar { background: yellow; }
meter[value="3"]::-moz-meter-bar { background: orange; }
meter[value="4"]::-moz-meter-bar { background: green; }</style>

        <title>Registrieren - VTCManager</title>
    </head>
<body class="account-login-page" data-gr-c-s-loaded="true">
<div class="loginFormWrapper">
        <div class="loginForm">
            <h1 style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Registrieren</h1>
            <hr class="underline" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
			
            
            <form action="https://vtc.northwestvideo.de/api/web/account/register.php" method="post" name="registerform" id="account-register-form" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                <input type="text" name="username" id="username" class="form-control" placeholder="Benutzername" maxlength="15" value="" required="" autofocus="">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="" required="">
				<p><span id="emailinfo" style="color: black;"></span></p>
                <input type="password" name="password" id="password" class="form-control" placeholder="Passwort" maxlength="150" required="">
				<meter max="4" id="password-strength"></meter>
				<p id="password-strength-text"></p>
				<p><input type="checkbox" onclick="showpass()">Zeige Passwort</p>
				<script>function showpass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
                
                <input type="checkbox" name="privacy_policy" required=""> Ich stimme den <a target="_blank" href="https://vtc.northwestvideo.de/datenschutz">Nutzungsbedingungen und der Datenschutzerklärung</a> zu.
                <input type="submit" name="submit" id="submitbtn" class="btn btn-default btn-block" value="Registrieren">
                <hr style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                <p>Du bist bereits ein VTC-Trucker? <a href="https://vtc.northwestvideo.de/account/login">Anmelden</a>.</p>
            </form>
        </div>
	</div>
	<script type="text/javascript">
	var strength = {
              0: "Sehr schwach",
              1: "Schwach",
              2: "OK",
              3: "Gut",
              4: "Sicher"
            }
             
            var password = document.getElementById('password');
            var meter = document.getElementById('password-strength');
            var text = document.getElementById('password-strength-text');
 
            password.addEventListener('input', function() {
                var val = password.value;
                var result = zxcvbn(val);
 
                // This updates the password strength meter
                meter.value = result.score;
 
                // This updates the password meter text
                if (val !== "") {
                    text.innerHTML = strength[result.score]; 
                } else {
                    text.innerHTML = "";
                }
            });
$(function() {
    $('#username').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});
	</script>

    <script type="text/javascript" src="./Registrieren - VTCManager_files/bootstrap.min.js.Download"></script>
    <script type="text/javascript" src="./Registrieren - VTCManager_files/tweenmax.min.js.Download"></script>
    
    <script async="" src="./Registrieren - VTCManager_files/js"></script>
</body></html>
