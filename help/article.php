<?php 
//GET request parameters
$requested_article = $_POST['article'];

//connect to DB
$host = 'localhost:3306';
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{
	die("Can't connect to database");  
}  
$requested_article = $conn->real_escape_string($requested_article);


//hole Informationen der Stellenanzeige
$sql = "SELECT * FROM help_articles WHERE article_name='$requested_article'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$ID_article = $row["ID"];
		$clicks_article = $row["clicks"];
		(int)$clicks_article++;
		$sql = "UPDATE help_articles SET clicks=$clicks_article WHERE ID=$ID_article";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error updating record: " . $conn->error;
		}


		?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Hilfe - VTCManager</title>
		<?php include '../basis_header.php'; ?>  
	</head>
	<body>
		<?php include '../navbar.php'; ?>  
		<footer class="footer">
			<div class="container">
				<?php 
		//lade Beschreibung der Stellenanzeige
		$job_desc = file_get_contents("../media/articles/help_articles/".$ID_article.'.txt');
		//Ausgabe der gesamten Stellenanzeige
		echo <<<EOT
		<h2>$requested_article</h2>
		<p>$job_desc</p>
		EOT;
	}
}?>
				<hr>
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
