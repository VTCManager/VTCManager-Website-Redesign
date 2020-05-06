
<?php
$email = "joschua.hass.sh@gmail.com";
$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
------------------------
 
Please click this link to activate your account:
http://www.vtc.northwestvideo.de/verify.php?email='.$email.'&hash='.$activate_hash.'
 
'; // Our message above including the link
                     
$headers = 'From:service@northwestvideo.de' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our emai
?>
