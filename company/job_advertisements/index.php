<?php  
if(!isset($_COOKIE['authWebToken'])) {
	die("404");
}
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
			echo "0 results2";
		}
		if ($found_token_owner != $username_cookie) {
			die("wrong owner detected");
		}
		$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$rank_user = $row["rank"];
				$company_id = $row["userCompanyID"];
				$bank_balance_user =$row["bank_balance"];
			}
		} else {
			die("0 results3");
		}
$sql = "SELECT * FROM company_information_table WHERE id=$company_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$found_company_name = $row["name"];
				$found_company_bank_balance = $row["bank_balance"];
			}
		} else {
		}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <title>Stellenanzeigen - VTCManager</title>
	  <link rel="icon" href="https://vtc.northwestvideo.de/media/images/favicon.png" type="image/x-icon">
	  <link rel="apple-touch-icon" href="https://vtc.northwestvideo.de/media/images/apple-icon.png">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/main.css">
	  <link rel="stylesheet" type="text/css" href="https://vtc.northwestvideo.de/basis_files/vs.css">
	  <script type="text/javascript" src="https://vtc.northwestvideo.de/basis_files/jquery.min.js"></script>
	  <script type="text/javascript" src="https://vtc.northwestvideo.de/basis_files/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
  </head>
  <body>
	  <?php include '../../navbar.php'; ?>  
	  &nbsp;&nbsp;
	  <?php if($_GET['idc'] == "tra_sc"){
	echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Transaktion erfolgreich gesendet!</strong></p>
</div></div>';}?>
	  <div class="modal fade" id="new_ad" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="https://vtc.northwestvideo.de/company/job_advertisements/create" method="post" name="new_ad" id="new_ad">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Neue Stellenanzeige erstellen</h4>
                                          </div>
                   <div class="modal-body">
                       <input type="text" class="form-control" name="rank" id="rank" placeholder="Rolle (muss bereits existieren)">
                       <textarea class="form-control" name="message" id="message"placeholder="Stellenbeschreibung" rows="10"></textarea>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Erstellen</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
	  <div class="container">
		  <h1>Stellenanzeigen</h1>
		  <table class="table" style="max-height: 150px !important; overflow: auto !important;">
					<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#new_ad">Erstellen</a>
                    <thead>
                    <tr>
                        <td>Rolle</td>
                        <td>Erstellt am</td>
						<td>Status</td>
						<td></td>
						<td></td>
                    </tr>
                    </thead>

                    <tbody>
						<?php
						$sql = "SELECT * FROM job_market WHERE byCompanyID=$company_id ORDER by created_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $jm_rank = $row["rank"];
		$jm_date = $row["created_date"];
		$jm_status = $row["status"];
		$jm_id = $row["AdID"];
		echo '<tr><td>'.$jm_rank.'</td><td>'.$jm_date.'</td><td>'.$jm_status.'</td>';
		echo <<<EOT
		<td><button type="button" onclick="window.location='http://vtc.northwestvideo.de/company/job_advertisements/edit?id=$jm_id';" class="btn btn-info">Bearbeiten</button></td><td><a href="/job_ad?id=$jm_id" ><i class="fas fa-share-square"></i>Link</a></td></tr> 
		EOT;
    }
} else {
}
?>
                    </tbody>
                </table>
</div>
	      <?php include '../../footer.php'; ?>
  </body>
</html>
