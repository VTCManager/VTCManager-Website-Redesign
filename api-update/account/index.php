<?php
$username_cookie = $_COOKIE["username"];
$authCode_cookie = $_COOKIE["authWebToken"];
date_default_timezone_set('Europe/Berlin');
$requested_user_id= $_GET['userid'];
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

}
if ($found_token_owner != $username_cookie) {
	$not_the_user = true;
}

$sql = "SELECT * FROM user_data WHERE userID=$requested_user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		date_default_timezone_set("+1");
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
					if ($rank_search != "owner") {
						if ($rank_search == "driver"){
							$rank_tr = "Fahrer";
						}else{
							$rank_tr = $rank_search;
						}

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
		  <p><?php echo $last_seen_search ?></p>
		  <div class="pull-right"><?php if($found_token_owner == $username_search) {
	$url_on_click_redi = "https://vtc.northwestvideo.de/account/edit";
	echo <<<EOT
	<button type="button" class="btn btn-primary" onclick="window.location.href = '$url_on_click_redi';"><i class="fas fa-user-edit"></i> Bearbeiten</button>
	EOT;
}
			  ?>
		  </div>
<ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#profil" data-toggle="tab"><i class="fa fa-info"></i> Profil</a></li>
            <li class=""><a href="#career" data-toggle="tab"><i class="fa fa-briefcase"></i> Verlauf</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="profil">
                <?php
echo file_get_contents("https://vtc.northwestvideo.de/media/articles/profil_about_me/".$requested_user_id.'.txt');
?>
                <hr>
									<h3>Informationen</h3>
                <p>
                    <i class="fa fa-briefcase"></i> <?php echo $company_txt_search;?> <br>
					<i class="fas fa-calendar-check"></i> registriert seit <?php echo $created_date_search;?> <br>
                </p>
            </div>

            <div class="tab-pane" id="career">
                <table class="table" style="max-height: 150px !important; overflow: auto !important;">
                    <thead>
                    <tr>
                        <td>von</td>
                        <td>bis</td>
						<td></td>
                    </tr>
                    </thead>

                    <tbody>
						<?php
$sql = "SELECT * FROM career_table WHERE userID=$requested_user_id ORDER BY start_date DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$atCompanyID_search = $row["atCompanyID"];
					$career_job_search = $row["job"];
					$start_date_search = $row["start_date"];
					$end_date_search = $row["end_date"];
					$sql = "SELECT name FROM company_information_table WHERE id=$atCompanyID_search";
					$result2 = $conn->query($sql);
					if ($result2->num_rows > 0) {
						// output data of each row
						while($row = $result2->fetch_assoc()) {
							$atCompanyname_search_2 = $row["name"];
						}
					}
					if ($career_job_search == "owner"){
						$career_job_search = "selbstständig bei $atCompanyname_search_2";
					} else if ($career_job_search == "driver"){
						$career_job_search = "Fahrer bei $atCompanyname_search_2";
					}else {
						$career_job_search = "$career_job_search bei $atCompanyname_search_2";
					}
					$start_date_search = date('d.m.Y', strtotime($start_date_search));
					if ($end_date_search == "0000-00-00"){
						$end_date_search = "heute";
					}else{
						$end_date_search = date('d.m.Y', strtotime($end_date_search));
					}

					echo '<tr><td>'.$start_date_search.'</td><td>'.$end_date_search.'</td><td>'.$career_job_search.'</td></tr>';
				}
			}
						$conn->close();
 ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="contact">

                                                                </div>
                    </div>
	  </div>
	     <?php include '../footer.php';?>
  </body>
</html>
