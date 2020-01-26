<?php
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  
$sql = "SELECT cargo,COUNT(*) FROM tour_table GROUP BY cargo ORDER BY COUNT(*) DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $found_token_owner = $row["cargo"];
        $found_token_owner2 = $row["COUNT(*)"];
        echo $found_token_owner;
        echo $found_token_owner2;
    }
} else {
    echo "0 results";
}

?>
