<?php if(isset($_POST['submit'])){
	$username_cookie = $_COOKIE["username"]; 
$authCode_cookie = $_COOKIE["authWebToken"]; 
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
	$not_the_user = true;
}

$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$userid_edit_prof = $row["userID"];
		$rg_company_verify_id = $row["userCompanyID"];
		$userrank_rg = $row["rank"];
	}
}
	if ($userrank_rg != "owner"){
		die();
	}
	$target_dir = "../../media/images/company_verification/";
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
	 $nameofile = $_FILES['file']['name'][$i];
	 $ext = end((explode(".", $nameofile)));
	 $target_file = $target_dir . basename($rg_company_verify_id.'_'.$i.'.'.$ext);
	 echo $target_file;
	 $uploadOk = 1;
	 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	 // Check if image file is a actual image or fake image
	 if(isset($_POST["submit"])) {
		 $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
		 if($check !== false) {
			 echo "File is an image - " . $check["mime"][$i] . ".";
			 $uploadOk = 1;
		 } else {
			 $conn->close();
			 header("Location: https://vtc.northwestvideo.de/account/edit?idc=pic_not_img");
			 exit();
		 }
	 }
	 // Allow certain file formats
	 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		 $conn->close();
		 echo $imageFileType;
		 header("Location: https://vtc.northwestvideo.de/account/edit?idc=ic_format");
		 exit();
	 }
	 // Check if $uploadOk is set to 0 by an error
	 if ($uploadOk == 0) {
		 echo "Sorry, your file was not uploaded.";
		 // if everything is ok, try to upload file
	 } else {
		 if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
			 echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		 } else {
			 $conn->close();
			 header("Location: https://vtc.northwestvideo.de/account/edit?idc=server_fail");
			 exit();
		 }
	 }
    

 }
}

$conn->close();
$conn->close();
echo("Firme erfolgreich registriert");
header("Location: https://vtc.northwestvideo.de/");
	exit();?>