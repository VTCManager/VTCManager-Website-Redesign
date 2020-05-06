<?php  
foreach ($_POST as $key => $value) {
    switch ($key) {
		case 'email':
            $email = $value;
            break;
        default:
            break;
    }
}
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","psg_app");  
$sql = "SELECT email_address FROM psg_user WHERE email_address='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email_found = $row["email_address"];
	if ($email_found == $email) {
		echo $email_found;
	    exit;}
    }
} else {
	echo "nothingg";
}
if(! $conn )  
{  
  die("");  
}  
mysqli_close($conn); 
?> 