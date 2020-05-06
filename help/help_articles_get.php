<?php 
 
// Create database connection 
$host = 'localhost:3306';     
$db = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager");  
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT * FROM help_articles WHERE article_name LIKE '%".$searchTerm."%' ORDER BY article_name ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['article_name']; 
        $data['value'] = $row['article_name']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>
