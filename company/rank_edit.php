<?php  
$requested_rank= $_POST['rank'];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
$requested_rank = $conn->real_escape_string($requested_rank);

$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
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
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$navbar_userid = $row["userID"];
				$rank_user = $row["rank"];
				$profile_pic = $row["profile_pic_url"];
				$company = $row["userCompanyID"];
			}
		} else {
			setcookie("username", "", time() - 13600,'/');
			setcookie("authWebToken", "", time() - 13600,'/');
			header("Refresh:0; url=https://vtc.northwestvideo.de/");
			die("profile not found");
		}
$sql = "SELECT * FROM rank WHERE name='$requested_rank' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditProfile_se = $row["EditProfile"];
				$SeeLogbook_se = $row["SeeLogbook"];
				$EditLogbook_se = $row["EditLogbook"];
				$SeeBank_se = $row["SeeBank"];
				$UseBank_se = $row["UseBank"];
				$EditSalary_se = $row["EditSalary"];
				$EditEmployees_se = $row["EditEmployees"];
				$salary_se = $row["salary"];
				$struct_id_se = $row["struct_id"];
			}
		} else {
			die("rank not found");
		}
if($requested_rank == "driver"){
	$requested_rank_tra = "Fahrer";
}else if($requested_rank == "owner"){
	$requested_rank_tra = "Geschäftsführer";
}else{
	$requested_rank_tra = $requested_rank;
}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Rollenbearbeitung - VTCManager</title>
	  <?php include '../basis_header.php'; ?> 
  </head>
  <body>
	  <?php include '../navbar.php';
	  if ($EditEmployees != "1"){
	header("Status: 404 Not Found");
	die();
} ?>  
	  &nbsp;&nbsp;
	  <div class="container">
		  <h2>Rolle: <?php echo $requested_rank_tra;?></h2>
		  <form action="/company/save_ranks" method="post" enctype="multipart/form-data">
		  <input type='hidden' name='rank' value='<?php echo $requested_rank;?>' />
		  <?php if($requested_rank != "owner"){?>
		  <input type="checkbox" name="EditProfile" value="1" <?php if($EditProfile_se == "1"){echo "checked";}?>> Firmenprofil bearbeiten<br>
		  <input type="checkbox" name="SeeLogbook" value="1" <?php if($SeeLogbook_se == "1"){echo "checked";}?>> Fahrtenbuch einsehen<br>
		  <input type="checkbox" name="EditLogbook" value="1" <?php if($EditLogbook_se == "1"){echo "checked";}?>> Fahrtenbuch verwalten<br>
		  <input type="checkbox" name="SeeBank" value="1" <?php if($SeeBank_se == "1"){echo "checked";}?>> Firmenkonto einsehen<br>
		  <input type="checkbox" name="UseBank" value="1" <?php if($UseBank_se == "1"){echo "checked";}?>> Überweisungen tätigen<br>
		  <input type="checkbox" name="EditSalary" value="1" <?php if($EditSalary_se == "1"){echo "checked";}?>> Gehalt bearbeiten<br>
		  <input type="checkbox" name="EditEmployees" value="1" <?php if($EditEmployees_se == "1"){echo "checked";}?>> Mitarbeiter & Stellenanzeigen verwalten<br>
		  Gehalt: <input type="text" name="salary" id="salary" value="<?php echo $salary_se;?>">€<br>
		  StrukturierungsID: <input type="text" name="struct_id" id="struct_id" value="<?php echo $struct_id_se;?>"><br>
			  <?php }else{?>
			  Gehalt: <input type="text" name="salary" id="salary" value="<?php echo $salary_se;?>">€<br>
		  StrukturierungsID: <input type="text" name="struct_id" id="struct_id" value="<?php echo $struct_id_se;?>"><br>
			  <?php }?>
			  <button type="submit" name="submit" class="btn btn-primary" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
			  </form>
			  
	  </div>
	      <footer class="footer">
        <div class="container">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© © NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
