<?php
foreach ($_POST as $key => $value) {
    switch ($key) {
		case 'salary':
            $salary = $value;
            break;
		case 'name':
            $requested_rank = $value;
            break;
        default:
            break;
    }
}
include '../get_user_data.php';
//hat User berechtigung zum erstellen neuer Ränge?
if($EditEmployees != "1"){
	die("no permission");
}
(int)$salary;
$sql = "INSERT INTO rank (name, forCompanyID, EditProfile, SeeLogbook, EditLogbook, SeeBank, UseBank, EditEmployees, EditSalary, salary, struct_id) VALUES ('$requested_rank',$userCompanyID,0,0,0,0,0,0,0,$salary,0)";

if ($conn->query($sql) === TRUE) {
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
header("Location: /clientarea/management/settings/");
	exit();
