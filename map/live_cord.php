
<?php  
$requested_comp_id= $_GET['companyid'];
$host = 'localhost:3306';     
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
if(! $conn )  
{  
  die("2");  
}  
if ($requested_comp_id == "0") {
	$sql = "SELECT username, coordinate_x, coordinate_y, rotation, last_seen FROM user_data WHERE coordinate_x!=0 AND coordinate_y!=0";
} else {
	$sql = "SELECT username, coordinate_x, coordinate_y, rotation, last_seen FROM user_data WHERE userCompanyID=$requested_comp_id AND coordinate_x!=0 AND coordinate_y!=0";
}

$result = $conn->query($sql);
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
$rows = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$rows[] = $row;
    }
	echo json_encode(utf8ize($rows));
} else {
    echo "Error: Company not found";
	die();
}
mysqli_close($conn); 
?> 
