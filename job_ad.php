<?php 
//GET request parameters
$requested_ad_id = $_GET['id'];

//connect to DB
$host = 'localhost:3306';
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{
	die("Can't connect to database");  
}  
$requested_ad_id = $conn->real_escape_string($requested_ad_id);


//hole Informationen der Stellenanzeige
$sql = "SELECT * FROM job_market WHERE AdID=$requested_ad_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$byCompanyID = $row["byCompanyID"];
		$AdID = $row["AdID"];
		$rank = $row["rank"];
		
		//hole Firmenname der Stellenanzeige
		$sql2 = "SELECT * FROM company_information_table WHERE id=$byCompanyID";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			while($row = $result2->fetch_assoc()) {
				$byCompanyname = $row["name"];
			}
		}?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<title><?php echo $byCompanyname; ?> - VTCManager</title>
		<?php include 'basis_header.php'; ?>  
	</head>
	<body>
		<div class="modal fade" id="apply" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="/company/apply" method="post" name="transactForm" id="transact_form">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Bewerbung als <?php echo $rank;?></h4>
                                          </div>
                   <div class="modal-body">
			   <input type="hidden" value="<?php echo $AdID; ?>" name="ad_id" />
                       <textarea name="text" class="form-control" aria-label="Bewerbungstext" placeholder="Bewerbungstext"></textarea>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-success" name="submit" id="submit">Bewerben</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
		<?php include 'navbar.php'; ?>  
		<footer class="footer">
			<div class="container">
				<?php 
		//lade Beschreibung der Stellenanzeige
		$job_desc = file_get_contents("https://vtc.northwestvideo.de/media/articles/ad_description/".$AdID.'.txt');
		//Ausgabe der gesamten Stellenanzeige
		echo <<<EOT
		<h2>$byCompanyname - $rank gesucht!</h2>
		<p>$job_desc</p>
		EOT;
	}
}?>
				<a class="btn btn-default pull-right" data-toggle="modal" data-target="#apply">Bewerben</a>
				<hr>
				<br>
				<p>Seite neu laden um weitere Ergebnisse zu sehen.</p>
				<br>
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
