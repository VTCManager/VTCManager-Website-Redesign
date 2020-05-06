<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'exampleFormControlTextarea1':
            $user_about = $value;
            break;
        default:
            break;
    }
}
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
	}
}
$myfile = fopen("../media/articles/profil_about_me/$userid_edit_prof.txt", "w") or die("Unable to open file!");
fwrite($myfile, nl2br($user_about));
fclose($myfile);
if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
	$conn->close();
    header("Location: https://vtc.northwestvideo.de/account/edit?idc=sc");
	exit();
}
$target_dir = "../media/profile_pictures/";
$nameofile = $_FILES["fileToUpload"]["name"];
$ext = end((explode(".", $nameofile)));
$target_file = $target_dir . basename($username_cookie.'.'.$ext);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
		$conn->close();
        header("Location: https://vtc.northwestvideo.de/account/edit?idc=pic_not_img");
	exit();
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
	$conn->close();
    header("Location: https://vtc.northwestvideo.de/account/edit?idc=pic_too_lg");
	exit();
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$conn->close();
    header("Location: https://vtc.northwestvideo.de/account/edit?idc=ic_format");
	exit();
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
		$conn->close();
        header("Location: https://vtc.northwestvideo.de/account/edit?idc=server_fail");
	exit();
    }
}
$sql = "UPDATE user_data SET profile_pic_url='https://vtc.northwestvideo.de/media/profile_pictures/$username_cookie.$ext' WHERE userID=$userid_edit_prof";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
$conn->close();
header("Location: https://vtc.northwestvideo.de/account/edit?idc=sc");
	exit();
?>
