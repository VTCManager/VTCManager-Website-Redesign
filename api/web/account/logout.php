<?php
if (isset($_COOKIE['authWebToken'])) {
    unset($_COOKIE['authWebToken']); 
    setcookie('authWebToken', null, -1, '/'); 
} else {
}
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']); 
    setcookie('username', null, -1, '/'); 
} else {
}
if ($lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "de") {
	header("Location: https://vtc.northwestvideo.de"); 
	exit;
}else{
	header("Location: https://vtc.northwestvideo.de/en"); 
	exit;
}
?>