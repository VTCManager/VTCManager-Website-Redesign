<?php  
$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
date_default_timezone_set('Europe/Berlin');
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
    echo "0 results";
}
if ($found_token_owner != $username_cookie) {
	die();
}

$sql = "SELECT * FROM user_data WHERE username='$found_token_owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		date_default_timezone_set("+1");
		$userCompanyID_search = $row["userCompanyID"];
		$rank_search = $row["rank"];
		
	}
} else {
    echo "Error: User not found";
	die();
}
$sql = "SELECT * FROM rank WHERE name='$rank_search' AND forCompanyID=$userCompanyID_search";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$EditProfile = $row["EditProfile"];
			}
		} else {
		}
if ($EditProfile != "1"){
	header("Status: 404 Not Found");
	die();
}
$sql = "SELECT * FROM company_information_table WHERE id=$userCompanyID_search";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		date_default_timezone_set("+1");
		$Company_name = $row["name"];
		$Company_avatar = $row["company_pic_url"];
		$discord_url = $row["discord_url"];
		$website_url = $row["website_url"];
		$teamspeak_url = $row["teamspeak_url"];
	}
} else {
    echo "Error: Company not found";
	die();
}
mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title><?php echo $Company_name;?> - VTCManager</title>
	  <?php include '../basis_header.php'; ?> 
  </head>
  <body>
	  <?php include '../navbar.php'; ?>  
	  &nbsp;&nbsp;
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
	  <div class="container">
		  <h2><img src="<?php echo $Company_avatar; ?>" class="profileViewAvatar"> <?php echo $Company_name;?> </h2>
		  <?php if($_GET['idc'] == "sc"){
	echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Profil erfolgreich aktualisiert!</strong></p>
</div></div>';} else if($_GET['idc'] == "pic_not_img"){
	echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist kein Bild!</strong></p>
</div></div>';}else if($_GET['idc'] == "pic_too_lg"){
	echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist zu groß (maximal 5MB)!</strong></p>
</div></div>';}else if($_GET['idc'] == "ic_format"){
	echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bildformat wird nicht unterstützt! (unterstützt: gif, jpg, png, jpeg)</strong></p>
</div></div>';}else if($_GET['idc'] == "server_fail"){
	echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Upload abgebrochen. Unbekannter Fehler.</strong></p>
</div></div>';} ?>
<ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#profil" data-toggle="tab"><i class="fa fa-info"></i> Profil</a></li>
	<li class=""><a href="#rank" data-toggle="tab"><i class="fas fa-cogs"></i> Rollen</a></li>
	<li class=""><a href="#settings" data-toggle="tab"><i class="fas fa-cogs"></i> Einstellungen</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="profil">
									<form action="/company/save_data"  method="post" enctype="multipart/form-data">
										<label for="exampleFormControlTextarea1">Über uns</label>
										<textarea class="form-control rounded-0" name="exampleFormControlTextarea1" rows="10"><?php $breaks = array("<br />"); echo (str_ireplace($breaks, "", file_get_contents("https://vtc.northwestvideo.de/media/articles/company_about_us/".$userCompanyID_search.'.txt'))); ?></textarea>
										<label for="input-file-now-custom-1">Profilbild ändern</label>
										<input type="file" name="fileToUpload" id="fileToUpload">
										<label for="discordurl">Discord-URL</label>
										<input type="text" name= "discordurl" id="discordurl" class="form-control" value="<?php echo $discord_url;?>">
										<label for="teamspeakurl">TeamSpeak-URL</label>
										<input type="text" name= "teamspeakurl" id="teamspeakurl" class="form-control" value="<?php echo $teamspeak_url;?>">
										<label for="websiteurl">Website-URL</label>
										<input type="text" name= "websiteurl" id="websiteurl" class="form-control" value="<?php echo $website_url;?>">
										<button type="submit" class="btn btn-primary" onclick="window.location.href = '$url_on_click_redi';" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
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
            <table class="table">
                <thead>
                    <tr>
						<td>Rolle</td>
						<td>Gehalt</td>
                        <td>Bearbeitung</td>
			<td></td>
                    </tr>
                </thead>
				<tbody>
					<?php include 'load_ranks.php'; ?>                  
                </tbody>
            </table>
        </div>
            </div>
                    </div>
		  
	  </div>
	      <?php include '../footer.php'; ?>
  </body>
</html>
