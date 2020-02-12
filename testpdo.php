<?php
$pdo = new PDO('mysql:host=localhost:3306;dbname=vtcmanager', 'system_user_vtc', '8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF');
$userid = '24';
$sql = "SELECT username FROM user_data WHERE userid=$userid";
foreach ($pdo->query($sql) as $row) {
   echo $row['username']."<br />";
}
?>