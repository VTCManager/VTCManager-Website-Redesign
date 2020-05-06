<?php  
$requested_comp_id= $_GET['companyid'];
$requested_comp_name= $_POST['companyname'];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
if(isset($_GET['msg'])){
  if($_GET['msg'] == "1"){
    $info = '<div class="alert alert-success" role="alert">
    Deine Bewerbung wurde erfolgreich übermittelt!
    </div>';
    }
}
if($requested_comp_name == "M&D%20Transporte"){
	$requested_comp_name == "M&D Transporte";
}
if(isset($_POST['companyname'])) {
    $requested_comp_name = $conn->real_escape_string($requested_comp_name);
    $sql = "SELECT * FROM company_information_table WHERE name='$requested_comp_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$requested_comp_id = $row["id"];
        $name = $row["name"];
		$founded_date = $row["founded_date"];
		$driven_km = $row["driven_km"];
		$rank_route = $row["rank_route"];
		$rank_money = $row["rank_money"];
		$Company_avatar = $row["company_pic_url"];
		$discord_url = $row["discord_url"];
		$website_url = $row["website_url"];
		$teamspeak_url = $row["teamspeak_url"];
    }
} else {
    echo "Error: Company not found2";
	die();
}
} else {
        $requested_comp_id = $conn->real_escape_string($requested_comp_id);

$sql = "SELECT * FROM company_information_table WHERE id=$requested_comp_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
		$founded_date = $row["founded_date"];
		$driven_km = $row["driven_km"];
		$rank_route = $row["rank_route"];
		$rank_money = $row["rank_money"];
		$Company_avatar = $row["company_pic_url"];
		$discord_url = $row["discord_url"];
		$website_url = $row["website_url"];
		$teamspeak_url = $row["teamspeak_url"];
    }
} else {
    echo "Error: Company not found";
	die();
}
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$employees = $result->num_rows;
} else {
}
$sql = "SELECT * FROM tour_table WHERE companyID=$requested_comp_id AND status='accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$tours_done = $result->num_rows;
} else {
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id AND rank='owner'";
$result = $conn->query($sql);
$owners=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name_owner_comp = $row["username"];
		array_push($owners,$name_owner_comp);
    }
} else {
}
$founded_date = date('d.m.Y', strtotime($founded_date));
?> 
<!DOCTYPE html>
<html lang="de">
  <head>
	  <title><?php echo $name;?> - VTCManager</title>
	  <?php include '../basis_header.php'; ?> 
	  <script>
function delete_entry(elmnt) {
	var save_val = $(elmnt).attr("data-id");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
			
	};
	xmlhttp.open("GET", "remove_employee.php?username="+save_val, true);
	xmlhttp.send();
	window.location.reload();
}
</script>
<script>
function change_rank(elmnt) {
	var username_val = $(elmnt).attr("data-id");
	var rank_val = elmnt.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		console.log(xmlhttp.response);
		window.location.reload();
			
	};
	xmlhttp.open("GET", "change_employee_rank.php?username="+username_val+"&rank="+rank_val, true);
	xmlhttp.send();
}
</script>
  </head>
  <body>
	  <?php include '../navbar.php'; ?>  
	  <?php echo $info; ?>
	  &nbsp;&nbsp;
	  <div class="container">
		  <h1><img src="<?php echo $Company_avatar; ?>" class="profileViewAvatar"> <?php echo $name;?> </h1>
		  <?php if($requested_comp_id == $company and $rank_user != "owner") {?>
		  <div class="pull-right">
		  <button type="button" class="btn btn-danger" onclick="location.href = 'https://vtc.northwestvideo.de/company/leave';">Kündigen</button>
		  </div>
		  <?php } ?>
<ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-info"></i> Über uns</a></li>
            <li class=""><a href="#employees" data-toggle="tab"><i class="fa fa-users"></i> Mitarbeiter</a></li>
	    <li class=""><a href="#jobs" data-toggle="tab"><i class="fa fa-id-card"></i> Jobs</a></li>
            <li class=""><a href="#contact" data-toggle="tab"><i class="fa fa-id-card"></i> Kontakt</a></li>
                    </ul>
<div id="myTabContent" class="tab-content">
                                <div class="tab-pane active in" id="about">
                <?php
echo file_get_contents("https://vtc.northwestvideo.de/media/articles/company_about_us/".$requested_comp_id.'.txt');
?>
                <hr>
									<h3><i class="fas fa-info-circle"></i> Informationen</h3>
                <p>
                    <i class="fas fa-calendar-alt"></i> Gegründet am: <?php echo $founded_date;?> <br>
					<i class="fas fa-user"></i> Geschäftsführung: <?php foreach($owners as $value){
    $owners_string = $owners_string.$value.", ";
}
					$owners_string = substr($owners_string, 0, -2);
					echo $owners_string;
?><br>
					<i class="fas fa-users"></i> Mitarbeiter: <?php echo $employees;?> <br>
					<i class="fas fa-truck-loading"></i> abgeschlossene Touren: <?php echo $tours_done;?> <br>
					<!--<i class="fas fa-road"></i> zurückgelegte Strecke: <?php echo $driven_km;?> km<br>-->
					<!--<i class="fas fa-trophy"></i> Rang(Strecke): <?php echo $rank_route;?> <br>-->
					<!--<i class="fas fa-trophy"></i> Rang(Kapital): <?php echo $rank_money;?> <br>-->
                </p>
            </div>

            <div class="tab-pane" id="employees">
                <table class="table" style="max-height: 150px !important; overflow: auto !important;">
                    <thead>
                    <tr>
                        <td>Mitarbeiter</td>
                        <td>aktuelle Rolle</td>
						<?php if($EditEmployees == "1" && $requested_comp_id == $company){ ?>
						<td>Neue Rolle zuweisen</td>
						<?php }?>
						<td></td>
                    </tr>
                    </thead>

                    <tbody>
						<?php
						
						$sql2 = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id ORDER BY rank DESC";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $username = utf8_encode($row["username"]);
		$userid = $row["userID"];
		$user_rank = $row["rank"];
		$profile_pic_url = $row["profile_pic_url"];
		if ($user_rank == "owner") {
			$user_rank_translation = "Geschäftsführung";}
		else{
			$user_rank_translation = $user_rank;
		}
		if($EditEmployees == "1" && $requested_comp_id == $company && $username != $found_token_owner){
			
		    $delete_bt = '<td><i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="'.$username.'" style="cursor: pointer;"></i></td>';
		    echo '<tr data-id="'.$username.'"><td><a href="/account/?userid='.$userid.'"><img class="profilePicture" src="'.$profile_pic_url.'">'.$username.'</a></td><td>'.$user_rank_translation.'</td>';
			?>
						<td>

<select onchange="change_rank(this)" data-id="<?php echo $username;?>">
	<?php 
			$sql = "SELECT * FROM rank WHERE forCompanyID=$requested_comp_id AND name NOT IN ('$user_rank')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name_rank_comp = $row["name"];
		echo '<option value="'.$name_rank_comp.'">'.$name_rank_comp.'</option>';
    }
} else {
}
	?>
</select></td><td><?php echo $delete_bt; ?></td></tr>
				
				<?php
		    }else{
			echo '<tr><td><a href="/account/?userid='.$userid.'"><img class="profilePicture" src="'.$profile_pic_url.'"> '.$username.'</a></td><td>'.$user_rank_translation.'</td><td></td><td></td><td></td></tr>';
			}
		
    }
} else {
    echo "No Employees";
} ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="contact">
				<?php if ($discord_url != ""){?>
				<button type="button" class="btn btn-info"onclick="window.location='<?php echo $discord_url;?>';" style="width:100px"><i class="fab fa-discord pr-2" aria-hidden="true"></i> Discord </button>
				<?php }if ($teamspeak_url != ""){?>
				<button type="button" class="btn btn-info"onclick="window.location='<?php echo $teamspeak_url;?>';" style="width:120px"><i class="fab fa-teamspeak pr-2" aria-hidden="true"></i> Teamspeak </button>
				<?php }if ($website_url != ""){?>
				<button type="button" class="btn btn-info"onclick="window.location='<?php echo $website_url;?>';" style="width:100px"><i class="fas fa-desktop pr-2" aria-hidden="true"></i> Webseite </button>
				<?php }?>
				

                                                                </div>
								<div class="tab-pane" id="jobs">
			<?php 
			$sql2 = "SELECT * FROM job_market WHERE status='open' AND byCompanyID=$requested_comp_id";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row = $result2->fetch_assoc()) {
				$byCompanyID = $row["byCompanyID"];
				$AdID = $row["AdID"];
				$rank = $row["rank"];
				$sql2 = "SELECT * FROM company_information_table WHERE id=$requested_comp_id";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row = $result2->fetch_assoc()) {
				$byCompanyname = $row["name"];
			}
		}
				$job_desc = file_get_contents("../media/articles/ad_description/".$AdID.'.txt');
				
				echo <<<EOT
				<h2>$byCompanyname - $rank gesucht!</h2>
				<span class="text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;"><a href="/job_ad?id=$AdID">$job_desc</a></span><hr>
				EOT;
		}}else{
		echo "No active job offers were found";
		}
		?>
			
			<br>
				

                                                                </div>
                    </div>
	  </div>
	      <?php include '../footer.php'; ?>  
  </body>
</html>
<?php mysqli_close($conn);?> 
