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
		$userid_search = $row["userID"];
        $username_search = $row["username"];
		$userCompanyID_search = $row["userCompanyID"];
		$profile_pic_url_search = $row["profile_pic_url"];
		$rank_search = $row["rank"];
		$last_seen_search = $row["last_seen"];
		$last_seen_search = date('d.m.Y H:i', strtotime($last_seen_search));
		$last_seen_search = "zuletzt online am $last_seen_search";
		//if (strtotime($last_seen_search) > strtotime("-5 minutes")){
		//	$last_seen_search = "zuletzt online am $last_seen_search";
		//	}else{
		//	$last_seen_search = "online";
		//}
		$created_date_search = $row["created_date"];

		$created_date_search = date('d.m.Y', strtotime($created_date_search));
		if ($userCompanyID_search == "0") {
			$company_txt_search = "arbeitslos";
		}else{
			$sql = "SELECT * FROM company_information_table WHERE id=$userCompanyID_search";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$compname = $row["name"];
					if ($rank != "owner") {
						$rank_tr = "Fahrer";
						$company_txt_search = "angestellt bei $compname als $rank_tr";
					} else {
						$company_txt_search = "selbstständig bei ".$compname;;
					}
				}
			}
		}
	}
} else {
    echo "Error: User not found";
	die();
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title><?php echo $username_search;?> - VTCManager</title>
	  <?php include '../basis_header.php'; ?>
  </head>
  <body>
	  <?php include '../navbar.php'; ?>
	  &nbsp;&nbsp;
	  <div class="container">
		  <h2><img src="<?php echo $profile_pic_url_search; ?>" class="profileViewAvatar"> <?php echo $username_search;?> </h2>
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
	<li class=""><a href="#settings" data-toggle="tab"><i class="fas fa-cogs"></i> Einstellungen</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="profil">
									<form action="/account/save_data"  method="post" enctype="multipart/form-data">
										<label for="exampleFormControlTextarea1">Über mich</label>
										<textarea class="form-control rounded-0" name="exampleFormControlTextarea1" rows="10"><?php $breaks = array("<br />"); echo (str_ireplace($breaks, "", file_get_contents("https://vtc.northwestvideo.de/media/articles/profil_about_me/".$userid_search.'.txt'))); ?></textarea>
										<label for="input-file-now-custom-1">Profilbild hochladen</label>
										<input type="file" name="fileToUpload" id="fileToUpload">
										<button type="submit" class="btn btn-primary" onclick="window.location.href = '$url_on_click_redi';" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
										</form>
                <hr>
									<h3>Informationen</h3>
                <p>
                    <i class="fa fa-briefcase"></i> <?php echo $company_txt_search;?> <br>
					<i class="fas fa-calendar-check"></i> registriert seit <?php echo $created_date_search;?> <br>
                </p>
            </div>
	<div class="tab-pane" id="settings">
		<button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo "https://vtc.northwestvideo.de/account/delete";?>';">Account löschen</button>
            </div>
                    </div>

	  </div>
	   <?php include '../footer.php';?>
  </body>
</html>
