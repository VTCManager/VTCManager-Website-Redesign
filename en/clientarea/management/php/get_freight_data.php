
<?php
include '../../../basis_files/php/get_user_data.php';   
$sql = "SELECT cargo,COUNT(*) AS num FROM tour_table WHERE companyID=$user_company_id GROUP BY cargo ORDER BY COUNT(*) DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo "0 results";
}

?>
