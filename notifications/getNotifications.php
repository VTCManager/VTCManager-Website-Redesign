<?php 
$username_cookie = $_COOKIE["username"]; 
$host = 'localhost:3306';    
$con = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");
$username = $username_cookie;
$sql = "SELECT * FROM `notification` WHERE `forUser`='" . $username . "' AND read_status=0 ORDER BY `time` DESC LIMIT 10;";
$result = $con->query( $sql );
if( $result->num_rows > 0 ){
	echo '<li class="dropdown">';
    echo '<a href="" class="dropdown-toggle notification-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"><span class="fa fa-comment"></span></i><span class="visible-xs">Benachrichtigungen</span></a>';
	echo '<ul class="dropdown-menu notification-dropdown" id="notifications">';
}else{
	echo '<li class="dropdown">';
    echo '<a href="" class="dropdown-toggle notification-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-slash"></i><span class="visible-xs">Keine Benachrichtigungen</span></a>';
	echo '<ul class="dropdown-menu notification-dropdown" id="notifications">';
} 
$sql = "SELECT * FROM `notification` WHERE `forUser`='" . $username . "' ORDER BY `time` DESC LIMIT 10;";
$result = $con->query( $sql );
if( $result->num_rows > 0 ){
	while($row = $result->fetch_assoc())
	{
		$id = $row["id"];
		if ($row["read_status"] == "0") {
			$class_type = "unread";
		} else {
			$class_type = "read";
		}
		switch( $row["event"] ){
		case "newtransaction":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="https://vtc.northwestvideo.de/bank/">Neue Überweisung von '.$row["eventbyUser"].'</a></li>';
			break;
		case "welcomemsg":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="#">Willkommen bei VTCManager</a></li>';
			break;
		case "newapplication":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="/company/applications/">Neue Bewerbung von '.$row["eventbyUser"].'</a></li>';
			break;
		case "application.accepted":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="/company/accept_application?id='.$row["eventID"].'">Klick um Firma beizutreten: '.$row["eventbyUser"].'</a></li>';
			break;
		case "application.declined":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="#">Bewerbung abgelehnt bei '.$row["eventbyUser"].'</a></li>';
			break;
		case "new.salary":
			echo '<li class="'.$class_type.'" onclick="notify_read(this);" value="'.$id.'"><a href="https://vtc.northwestvideo.de/bank/">Dein Gehalt ist da!</a></li>';
			break;
	}
	}
}else{
}  
echo '</ul></li>';
$con->close();
?>
