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
header("Location: /"); 
exit;
?>
