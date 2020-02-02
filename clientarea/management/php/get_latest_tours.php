<?php
//es fehlt GET mit companyID
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
$sql = "SELECT username, departure, destination, cargo FROM tour_table WHERE companyID=1 ORDER BY tour_date DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row['departure']."</td><td>".$row['destination']."</td><td>".$row['cargo']."</td><td>".$row['username']."</td></tr>";
    }
    }else{
        }
        ?>
