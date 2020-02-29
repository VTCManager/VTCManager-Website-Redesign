<?php
include '../get_user_data.php'; 
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
$sql = "SELECT * FROM money_transfer WHERE sender='$user_company_name' OR receiver='$user_company_name' ORDER BY date_sent DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row['sender']."</td><td>".$row['receiver']."</td><td>".$row['amount']."</td><td>".$row['message']."</td></tr>";
    }
    }else{
        }
        ?>
