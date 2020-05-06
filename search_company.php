<?php $host = 'localhost:3306';    
		$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
		if(! $conn )  
		{  
			die("2");  
		}  
		?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title>Arbeitsmarkt - VTCManager</title>
	  <?php include 'basis_header.php'; ?>  
	  <!-- jQuery library -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <!-- jQuery UI library -->
	  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	  <script>
		  $(function() {
    $("#skill_input").autocomplete({
        source: "/search_company_get.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#skill_input").val(ui.item.id);
        }
    });
});
</script>
  </head>
  <body>
	  <?php include 'navbar.php'; ?>  
	      <footer class="footer">
        <div class="container">
	  <form action="/company/" method="post" name="createnewrankForm" id="createnewrankForm">
			<input class="form-control" type="text" name="companyname" id="skill_input" placeholder="Suche..." aria-label="Search">
			<button type="submit" class="btn btn-primary" name="submit" id="submit">Öffnen</button>
			</form>
			<?php 
			if(isset($found_token_owner))
			{
			$sql = "SELECT * FROM job_market WHERE status='open' ORDER BY RAND() LIMIT 20";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$byCompanyID = $row["byCompanyID"];
				$AdID = $row["AdID"];
				$rank = $row["rank"];
				$sql2 = "SELECT * FROM company_information_table WHERE id=$byCompanyID";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row = $result2->fetch_assoc()) {
				$byCompanyname = $row["name"];
			}
		}
				$job_desc = file_get_contents("https://vtc.northwestvideo.de/media/articles/ad_description/".$AdID.'.txt');
				
				echo <<<EOT
				<h2>$byCompanyname - $rank gesucht!</h2>
				<span class="text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;"><a href="https://vtc.northwestvideo.de/job_ad?id=$AdID">$job_desc</a></span><hr>
				EOT;
			}
		} else {
		}?>
			
			<br>
			<p>Seite neu laden um weitere Ergebnisse zu sehen.</p>
			<br>
			<?php } ?>
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
