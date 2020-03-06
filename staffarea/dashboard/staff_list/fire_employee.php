<?php
//Zweck: Mitarbeiter kündigen
//check POST request
if(!isset($_POST['reason']) && !isset($_POST['employeeID']) && !empty($_POST['reason']) && !empty($_POST['employeeID'])){
    //bad request
    header("Status: 400 Bad Request");
    die();
    }
//Connect and Check
include '../../get_user_data.php';

//Überprüfe Berechtigung

//POST Variablen
$reason_text = $_POST['reason'];
$employeeID = $_POST['employeeID'];
//mysql escape
$reason_text = $conn->real_escape_string($reason_text);
$employeeID = $conn->real_escape_string($employeeID);
//hole username des Mitarbeiter
$sql = "SELECT * FROM user_data WHERE userID=$employeeID AND userCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $employee_username = $row["username"];
    }
} else {
    echo "0 results";
    die();
}
//close DB conn
$conn->close();

//Verbindung zu User Data DB
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "root", "paswdmysqlllol29193093KK","nwv_api");  
if(! $conn )  
{  
  die("2");  
}  

//hole Mitarbeiter E-Mail
$sql = "SELECT * FROM user_data WHERE username='$employee_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $employee_email_address = $row["email_address"];
    }
} else {
    die("Can't find user");
}
//close DB conn
$conn->close();

//Connect and Check
include '../../get_user_data.php';

//Eintrag im Lebenslauf anpassen und Grund setzen
//fehlt

//Benutzer Informationen anpassen
$sql = "UPDATE user_data SET staff_role='', staff_struct_id=0 WHERE userID=$employeeID";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
    die();
}
//include email Inhalt
include 'emails/fire_employee/fire_employee.php';

//Email erstellen
$to = $employee_email_address;
$subject = 'Du wurdest aus dem Team entlassen|VTCManager';
$headers = "From: service@northwestvideo.de\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = $fire_employee_email_content;

//EMAIL senden
mail($to, $subject, $message, $headers);

//close DB conn
$conn->close();

//redirect
header("Location: /clientarea/management/dashboard/employees/");
exit;
?>
