<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'username':
            $user = $value;
            break;
        case 'password':
            $passwd = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
$user = $conn->real_escape_string($user);
$passwd = $conn->real_escape_string($passwd);
if(! $conn )  
{  
  die("2");  
}  
$passwdhsh = hash('sha256',$passwd);

$sql = "SELECT * FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hash = $row["password_hash"];
    }
} else {
    die("0 results");
}
echo $user;

if ($passwdhsh==$hash) {
	$sql = "DELETE FROM user_data WHERE username='$user'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		die("Error deleting record: " . $conn->error);
	}
	mysqli_close($conn); 
	$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
	$sql = "SELECT userID FROM user_data WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $del_userID = $row["userID"];
    }
} else {
    echo "0 results";
}
	$sql = "DELETE FROM user_data WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    die("Error deleting record: " . $conn->error);
}
} else {
    die('Invalid password.');
}
$file = "../../../media/articles/profil_about_me/$del_userID.txt";

if (!unlink($file)) {
  echo ("Error deleting $file");
} else {
  echo ("Deleted $file");
}
$file_pattern = "../../../media/profile_pictures/$user.*"; // Assuming your files are named like profiles/bb-x62.foo, profiles/bb-x62.bar, etc.
array_map( "unlink", glob( $file_pattern ) );
if (!unlink($file)) {
  echo ("Error deleting $file");
} else {
  echo ("Deleted $file");
}
if ($lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de") {
	header("Location: https://vtc.northwestvideo.de/"); 
	exit;
}else{
	header("Location: https://vtc.northwestvideo.de/"); 
	exit;
}

mysqli_close($conn); 
?> 
