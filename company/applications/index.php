<?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$results_per_page = 20;
$start_from = ($page-1) * $results_per_page;
$host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  

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
$sql = "SELECT * FROM rank WHERE name='$rank_user' AND forCompanyID=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditEmployees = $row["EditEmployees"];
			}
		} else {
		die("no res 1");
		}
		$sql = "SELECT * FROM company_information_table WHERE id=$company";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$company_name = $row["name"];
			}
		} else {
		die("no res 1");
		}
if($EditEmployees != "1"){
	die("Berechtigung fehlt.");
}

		?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Bewerbungen - VTCManager</title>
	  <?php include '../../basis_header.php'; ?>  
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
        <div class="container">
			<h1>Bewerbungen von <?php echo $company_name;?></h1>
			<div class="vertical-scroll">
            <table class="table">
                <thead>
                    <tr>
						<td>Bewerber</td>
                        <td>Rolle</td>
                        <td>Status</td>
                        <td>Datum</td>
						<td></td>
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_applications.php'; ?>                  
                </tbody>
            </table>
	    <?php 
$sql = "SELECT COUNT(applicationID) AS total FROM application WHERE forCompanyID=$company";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='index.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 
?>
            </div>
            <footer class="footer">
            <div class="col-md-9 social-media">
                <p class="pull-left">
                    <a href="https://vtc.northwestvideo.de/impressum">Impressum</a>|
                    <a href="https://vtc.northwestvideo.de/datenschutz">Datenschutz &amp; Nutzungsbedingungen</a>
                </p>
            </div>
            <div class="col-md-3">
                <p class="pull-right">© NorthWestMedia 2019-2020</p>
            </div>
                    </div>
    </footer>
  </body>
</html>
