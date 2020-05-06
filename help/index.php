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
	  <title>FAQ - VTCManager</title>
	  <?php include '../basis_header.php'; ?>  
	  <!-- jQuery library -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <!-- jQuery UI library -->
	  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	  <script>
		  $(function() {
    $("#skill_input").autocomplete({
        source: "help_articles_get.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#skill_input").val(ui.item.id);
        }
    });
});
</script>
  </head>
  <body>
	  <?php include '../navbar.php'; ?>  
	      <footer class="footer">
        <div class="container">
	  <?php if($found_token_owner == "joschi_service"){ ?>
	  <div class="modal fade" id="newhelparticle" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="new_article" method="post" name="newhelparticle" id="newhelparticle">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Neuen Hilfe-Artikel anlegen</h4>
                                          </div>  
                       <div class="modal-body">
                       <input class="form-control" type="text" id="title" name="title" placeholder="Titel" aria-label="Rolle">
                       <textarea class="form-control" name="message" id="message"placeholder="Inhalt (HTML-Code möglich)" rows="10"></textarea>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Überweisen</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#newhelparticle">Neuen Artikel erstellen</a>
   <?php } ?>
	  <form action="article" method="post" name="createnewrankForm" id="createnewrankForm">
			<input class="form-control" type="text" name="article" id="skill_input" placeholder="Nach Einträgen suchen..." aria-label="Search">
			<button type="submit" class="btn btn-primary" name="submit" id="submit">Öffnen</button>
			</form>
			<hr>
			<h1>Meistgelesene Themen</h1>
			<hr>
			<?php 
			$sql = "SELECT * FROM help_articles ORDER BY clicks DESC LIMIT 20";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$article_name_search = $row["article_name"];
				$article_id_search = $row["ID"];
				$article_name_desc = file_get_contents("https://vtc.northwestvideo.de/media/articles/help_articles/".$article_id_search.'.txt');
				
				echo '<h2>'.$article_name_search.'</h2><br><form action="article" method="post" name="createnewrankForm" id="createnewrankForm"><input type="hidden" name="article" value="'.$article_name_search.'"><button type="submit" class="btn btn-primary" name="submit" id="submit">Öffnen</button></form><hr>';
			}
		} else {
		}?>
			<iframe src="https://discordapp.com/widget?id=657886971514978306&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
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
