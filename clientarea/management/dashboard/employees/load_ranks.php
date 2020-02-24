<?php
//Rollen für Rollenvergabe in der Mitarbeiterliste laden
$sql = "SELECT * FROM rank WHERE forCompanyID=$user_company_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
		}
}
?>
