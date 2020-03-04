<?php
//lade Anzahl aller Benutzer
$sql = "SELECT * FROM user_data";
$result = $conn->query($sql);
$stats_total_user = $result->num_rows;

//lade Anzahl aller Mitglieder
$sql = "SELECT * FROM user_data WHERE staff_role !=''";
$result = $conn->query($sql);
$stats_total_staff = $result->num_rows;

//lade Anzahl aller Firmen
$sql = "SELECT * FROM company_information_table";
$result = $conn->query($sql);
$stats_total_company = $result->num_rows;

//lade Anzahl aller abgeschlossenen Touren
$sql = "SELECT * FROM tour_table WHERE status='accepted'";
$result = $conn->query($sql);
$stats_total_tours_done = $result->num_rows;
?>
