<?php
//Zweck: Mitarbeiter kündigen
//check POST request
if(!isset($_POST['rank']) && !isset($_POST['staffID']) && !empty($_POST['rank']) && !empty($_POST['staffID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';

//Überprüfe Berechtigung
if($EditEmployees != "1"){
    //redirect zurück zu Liste mit Fehler-Info
    echo "Keine Berechtigung";
    die();
    }
//POST Variablen
$employee_rank = $_POST['rank'];
$employeeID = $_POST['staffID'];
//mysql escape
$employee_rank = $conn->real_escape_string($employee_rank);
$employeeID = $conn->real_escape_string($employeeID);

//Lade StrukturID
$sql = "SELECT * FROM staff_roles WHERE name='$employee_rank'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$staff_struct_id = $row["struct_id"];
    }
}

//Benutzer Informationen anpassen
$sql = "UPDATE user_data SET staff_role='$employee_rank',staff_struct_id=$staff_struct_id WHERE userID=$employeeID";
echo $sql;

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
    die();
}

//close DB conn
$conn->close();

//redirect
header("Location: /staffarea/dashboard/staff_list");
exit;
?>

