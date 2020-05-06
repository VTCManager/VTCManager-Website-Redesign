<?php 
 
// Create database connection 
$host = 'localhost:3306';     
$db = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['iban']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT * FROM user_data WHERE iban ='".$searchTerm."' ORDER BY username DESC LIMIT 1"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){
    $skillData['status'] = "success"; 
    while($row = $query->fetch_assoc()){
        $skillData['receiver'] = $row['username']; 
    } 
}else{
    $skillData['status'] = "no result"; 
}
 
// Return results as json encoded array 
echo json_encode($skillData);
