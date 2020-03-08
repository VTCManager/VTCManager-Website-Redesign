<?php
include '../get_user_data.php';
$page_now = "management/settings";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>VTCMInterface</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>
<div class="modal fade" id="createnewrank" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <form action="/company/create_rank" method="post" name="createnewrankForm" id="createnewrankForm">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Neue Rolle erstellen</h4>
                                          </div>
                   <div class="modal-body">
                       <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off">
                       <div class="input-group">
                           <input type="number" class="form-control" name="salary" id="salary" min="1" max="3000" placeholder="Gehalt" required="">
                           <span class="input-group-addon">€</span>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" name="submit" id="submit">Erstellen</button>
                   </div>
               </form>
             </div>
        </div>
</div>

<body class="elegant-color-dark">

  <!--Main Navigation-->
  <header>

    <!-- Sidebar -->
    <?php 
    include '../php/sidebar.php';?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mx-lg-5">
    <div class="container-fluid">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard">Homepage</a>
            <span>/</span>
            <span>Einstellungen</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <!--Card-->
          <div class="card" >

            <!--Card content-->
            <div class="card-body elegant-color white-text">
              <img class="rounded float-left" src="<?php echo $user_company_avatar; ?>" style="height: 80px;width: 80px;height: auto;"> <h2 style="margin-left: 90px;"><?php echo $user_company_name;?> </h2>
              <br>
		  <?php if($_GET['idc'] == "sc"){
	echo '<div class="success black-text" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Profil erfolgreich aktualisiert!</strong></p>
</div>';} else if($_GET['idc'] == "pic_not_img"){
	echo '<div class="danger black-text" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist kein Bild!</strong></p>
</div>';}else if($_GET['idc'] == "pic_too_lg"){
	echo '<div class="danger black-text" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist zu groß (maximal 5MB)!</strong></p>
</div>';}else if($_GET['idc'] == "ic_format"){
	echo '<div class="danger black-text" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bildformat wird nicht unterstützt! (unterstützt: gif, jpg, png, jpeg)</strong></p>
</div>';}else if($_GET['idc'] == "server_fail"){
	echo '<div class="danger black-text" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Upload abgebrochen. Unbekannter Fehler.</strong></p>
</div>';} ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active"><a class="nav-link active" href="#profil" data-toggle="tab"><i class="fa fa-info"></i> Profil</a></li>
	<li class="nav-item"><a class="nav-link" href="#rank" data-toggle="tab"><i class="fas fa-cogs"></i> Rollen</a></li>
	<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-cogs"></i> Einstellungen</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="profil">
									<form action="save_data"  method="post" enctype="multipart/form-data">
                    <div class="md-form">
										<textarea class="md-textarea form-control white-text" name="exampleFormControlTextarea1" rows="10"><?php $breaks = array("<br />"); echo (str_ireplace($breaks, "", file_get_contents("https://vtc.northwestvideo.de/media/articles/company_about_us/".$user_company_id.'.txt'))); ?></textarea>
                    <label for="exampleFormControlTextarea1">Über uns</label>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input elegant-color white-text" name="fileToUpload" id="fileToUpload" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label elegant-color white-text" for="fileToUpload">Profilbild ändern</label>
                    </div>
                    <div class="md-form">
                      <i class="fab fa-discord prefix"></i>
                      <input type="text" name="discordurl" id="discordurl" class="form-control white-text" value="<?php echo $discord_url;?>">
                      <label for="discordurl">Discord</label>
                    </div>
                    <div class="md-form">
                      <i class="fab fa-teamspeak prefix"></i>
                      <input type="text" name="teamspeakurl" id="teamspeakurl" class="form-control white-text" value="<?php echo $teamspeak_url;?>">
                      <label for="teamspeakurl">TeamSpeak</label>
                    </div>
                    <div class="md-form">
                      <i class="fas fa-desktop prefix"></i>
                      <input type="text" name="websiteurl" id="websiteurl" class="form-control white-text" value="<?php echo $website_url;?>">
                      <label for="websiteurl">Webseite</label>
                    </div>
										<button type="submit" class="btn btn-primary" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
										</form>
            </div>
	<div class="tab-pane" id="settings">
		<?php if($rank_search == "owner"){?>
		<button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo "https://vtc.northwestvideo.de/company/delete";?>';">Firma auflösen</button>
		<?php }?>
            </div>
	<div class="tab-pane" id="rank">
		<div class="vertical-scroll">
		    <div class="pull-rigt">
				<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#createnewrank">Neue Rolle erstellen</a>
			</div>
            <table class="table white-text">
                <thead>
                    <tr>
						<td>Rolle</td>
						<td>Gehalt</td>
                        <td>Bearbeitung</td>
			<td></td>
                    </tr>
                </thead>
				<tbody class="white-text">
					<?php include 'load_ranks.php'; ?>                  
                </tbody>
            </table>
        </div>
            </div>
                    </div>
            </div>

          </div>
          <!--/.Card-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php 
    include '../php/footer.php';?>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/clientarea/management/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/clientarea/management/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/clientarea/management/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/clientarea/management/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
