
<?php
//es fehlt GET mit companyID
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  
$sql = "SELECT amount AS num FROM money_transfer WHERE sender='' OR receiver='VTCManager Beta Company' AND date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
AND date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
        $rows[]
    }
    $array = [
    "week" => "Current",
    "amount" => $current_amount = $,
];
    echo json_encode($rows);
} else {
    echo "0 results";
}

?>
