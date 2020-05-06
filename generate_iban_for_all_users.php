<?php
$host = 'localhost:3306';
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF", "vtcmanager");
if (!$conn) {
    die("2");
}
$sql = "SELECT * FROM user_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $current_uid = $row["userID"];
        $iban = "DE";
        while (strlen($iban) < 22) {
            $iban .= strval(rand(0, 9));
        }
        $result_found = true;
        while ($result_found) {
            $sql2 = "SELECT * FROM user_data WHERE iban='" . $iban . "'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $iban = "DE";
                while (strlen($iban) < 22) {
                    $iban .=strval(rand(0, 9));
                }
                $result_found = true;
            } else {
                $result_found = false;
            }
        }
        $sql3 = "UPDATE user_data SET iban='" . $iban . "' WHERE userID=" . $current_uid;

        if ($conn->query($sql3) === TRUE) {
            echo "Record updated successfully for" . $current_uid;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "Keine User lol";
}
$conn->close();
