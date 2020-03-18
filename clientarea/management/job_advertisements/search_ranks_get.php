<?php 
 $requested_ad_id = $_GET['comp_id'];
// Create database connection 
$host = 'localhost:3306';     
$db = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
$requested_ad_id = $db->real_escape_string($requested_ad_id);

 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT * FROM rank WHERE name LIKE '%".$searchTerm."%' AND forCompanyID = $requested_ad_id ORDER BY name ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['name']; 
        $data['value'] = $row['name']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>
