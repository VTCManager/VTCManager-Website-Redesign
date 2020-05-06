<?php
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
			header("Refresh:0; url=/");
			die("wrong owner detected");
		}
		if ($found_token_owner != $username_cookie) {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=/");
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$navbar_userid = $row["userID"];
				$rank_user = $row["rank"];
				$profile_pic = $row["profile_pic_url"];
				$profile_pic = str_replace(' ', '%20', $profile_pic);
				$company = $row["userCompanyID"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=/");
			die("profile not found");
		}
$sql = "SELECT * FROM rank WHERE name='$rank_user' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$SeeBank = $row["SeeBank"];
				$EditProfile = $row["EditProfile"];
				$SeeLogbook = $row["SeeLogbook"];
				$EditLogbook = $row["EditLogbook"];
				$UseBank = $row["UseBank"];
				$EditEmployees = $row["EditEmployees"];
				$EditSalary = $row["EditSalary"];
				
			}
		} else {
		}
	$sql = "UPDATE user_data SET `last_seen`=NOW()  WHERE username='$username_cookie'";

if ($conn->query($sql) === TRUE) {
	echo $rotation;
} else {
    echo "Error updating record: " . $conn->error;
	die();
}
	if($company != "0"){
	if($rank_user == "owner") {
?> 
<!DOCTYPE html>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="https://vtc.northwestvideo.de/">
				<img src="https://vtc.northwestvideo.de/media/images/favicon.png" height="30" alt="mdb logo" >
			</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			  <li><a href="/account/logbook/"><i class="fa fa-book"></i> Fahrtenbuch</a></li>
                                    <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building"></i> Spedition<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/company/?companyid=<?php echo $company; ?>">Profil</a></li>
				  <li><a href="https://vtc.northwestvideo.de/map/?companyid=<?php echo $company; ?>">Livemap</a></li>
                <li><a href="https://vtc.northwestvideo.de/company/logbook/">Fahrtenbuch</a></li>
				  <li><a href="https://vtc.northwestvideo.de/company/job_advertisements/">Stellenanzeigen</a></li>
				  <li><a href="/company/applications/">Bewerbungen</a></li>
                                <li><a href="https://vtc.northwestvideo.de/company/edit">Einstellungen</a></li>
                                                              </ul>
            </li>
			  <li><a href="https://vtc.northwestvideo.de/bank/"><i class="fa fa-bank"></i> Bank</a></li>
                        <li><a href="https://vtc.northwestvideo.de/map"><i class="fas fa-map-marker-alt"></i> Karte</a></li>
                            <!--<li><a href="#"><i class="fa fa-calendar"></i> Events </a></li>-->
            
                       
                      </ul>

          <ul class="nav navbar-nav navbar-right">
					<?php include 'notifications/getNotifications.php'; ?>  

            <li class="dropdown">
              <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $profile_pic; ?>" class="profilePicture">
                  <?php echo $found_token_owner; ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="https://vtc.northwestvideo.de/account/?userid=<?php echo $navbar_userid; ?>">Mein Profil</a></li>
		<li><a href="/account/applications/">Meine Bewerbungen</a></li>
                <li><a href="/download">Download</a></li>
                <li><a href="/help">Hilfe &amp; Support</a></li>
                <li><a href="/api/web/account/logout.php">Ausloggen</a></li>
              </ul>
            </li>
                                              </ul>
        </div>
      </div>
    </nav>
<script>
function notify_read(elmnt) {
	var save_val = elmnt.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			elmnt.className = "read";
	};
	xmlhttp.open("GET", "/notifications/notify_read.php?notify_id="+save_val, true);
	xmlhttp.send();
}
</script>
<?php
		}else{?>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="https://vtc.northwestvideo.de/">
				<img src="https://vtc.northwestvideo.de/media/images/favicon.png" height="30" alt="mdb logo">
			</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			  <li><a href="https://vtc.northwestvideo.de/account/logbook/"><i class="fa fa-book"></i> Fahrtenbuch</a></li>
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building"></i> Meine Spedition<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://vtc.northwestvideo.de/company/?companyid=<?php echo $company; ?>">Profil</a></li>
                <li><a href="https://vtc.northwestvideo.de/map/?companyid=<?php echo $company; ?>">Livemap</a></li>
				  <?php if($SeeLogbook == "1"){echo '<li><a href="https://vtc.northwestvideo.de/company/logbook/">Fahrtenbuch</a></li>';} ?>
				  <?php if($EditEmployees == "1"){echo '<li><a href="/company/applications/">Bewerbungen</a></li>';} ?>
				  <?php if($EditProfile == "1" || $EditEmployees == "1"){echo '<li><a href="https://vtc.northwestvideo.de/company/edit">Einstellungen</a></li>';} ?>
                                                              </ul>
            </li>
			  <li><a href="https://vtc.northwestvideo.de/bank/"><i class="fa fa-bank"></i> Bank</a></li>
                        <li><a href="https://vtc.northwestvideo.de/map/"><i class="fas fa-map-marker-alt"></i> Karte</a></li>
                            <!--<li><a href="#"><i class="fa fa-calendar"></i> Events </a></li>-->
            
                       
                      </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php include 'notifications/getNotifications.php'; ?> 

            <li class="dropdown">
              <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $profile_pic; ?>" class="profilePicture">
                  <?php echo $found_token_owner; ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="https://vtc.northwestvideo.de/account/?userid=<?php echo $navbar_userid; ?>">Mein Profil</a></li>
		<li><a href="/account/applications/">Meine Bewerbungen</a></li>
                <li><a href="/download">Download</a></li>
                <li><a href="/help">Hilfe &amp; Support</a></li>
                <li><a href="https://vtc.northwestvideo.de/api/web/account/logout.php">Ausloggen</a></li>
              </ul>
            </li>
                                              </ul>
        </div>
      </div>
    </nav>
<script>
function notify_read(elmnt) {
	var save_val = elmnt.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			elmnt.className = "read";
	};
	xmlhttp.open("GET", "notifications/notify_read.php?notify_id="+save_val, true);
	xmlhttp.send();
}
</script>
<?php	}
	}else{ //eingeloggt aber nicht in einer Firma
?>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="https://vtc.northwestvideo.de/">
				<img src="https://vtc.northwestvideo.de/media/images/favicon.png" height="30" alt="mdb logo">
			</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			  <li><a href="https://vtc.northwestvideo.de/account/logbook/"><i class="fa fa-book"></i> Fahrtenbuch</a></li>
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building"></i> Arbeitsmarkt<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://vtc.northwestvideo.de/search_company">Spedition finden</a></li>
                <li><a href="https://vtc.northwestvideo.de/company/create">Spedition erstellen</a></li>
                                                              </ul>
            </li>
			  <li><a href="https://vtc.northwestvideo.de/bank/"><i class="fa fa-bank"></i> Bank</a></li>
                        <li><a href="https://vtc.northwestvideo.de/map/"><i class="fas fa-map-marker-alt"></i> Karte</a></li>
                            <!--<li><a href="#"><i class="fa fa-calendar"></i> Events </a></li>-->
            
                       
                      </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php include 'notifications/getNotifications.php'; ?> 

            <li class="dropdown">
              <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $profile_pic; ?>" class="profilePicture">
                  <?php echo $found_token_owner; ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="https://vtc.northwestvideo.de/account/?userid=<?php echo $navbar_userid; ?>">Mein Profil</a></li>
		<li><a href="/account/applications/">Meine Bewerbungen</a></li>
                <li><a href="/download">Download</a></li>
                <li><a href="/help">Hilfe &amp; Support</a></li>
                <li><a href="https://vtc.northwestvideo.de/api/web/account/logout.php">Ausloggen</a></li>
              </ul>
            </li>
                                              </ul>
        </div>
      </div>
    </nav>
<script>
function notify_read(elmnt) {
	var save_val = elmnt.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			elmnt.className = "read";
	};
	xmlhttp.open("GET", "notifications/notify_read.php?notify_id="+save_val, true);
	xmlhttp.send();
}
</script>
<?php
	}
}else{
?> 
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="https://vtc.northwestvideo.de/">
				<img src="https://vtc.northwestvideo.de/media/images/favicon.png" height="30" alt="mdb logo">
			</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
			  <li><a href="https://vtc.northwestvideo.de/"> Home</a></li>
			  <li><a href="#"> Team</a></li>                   
                      </ul>
			<ul class="nav navbar-nav navbar-right">
                                    <li><a class="highlighted" href="https://vtc.northwestvideo.de/account/register">Registrieren</a></li>
            <li><a href="https://vtc.northwestvideo.de/account/login">Einloggen</a></li>

                      </ul>
        </div>
      </div>
    </nav>
<?php
	 }
?> 
