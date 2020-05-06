<?php
date_default_timezone_set('Europe/Berlin');
//hole alle Mitarbeiter der Firma
$sql = "SELECT * FROM support_tickets ORDER BY created_date, CHAR_LENGTH(status) DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row["ticket_subject"]; ?></td>
			<td><?php echo $row["customer"]; ?></td>
			<td><?php echo $row["created_date"]; ?></td>
			<td><?php echo $row["status"]; ?></td>
			<td><a type="button" class="btn btn-info" href="view_ticket?ticketID=<?php echo $row["id"];?>">Öffnen</a></td>
		</tr>
<?php
	}
} else {
	//Keine Mitarbeiter Ausnahme
	echo "Keine Support Tickets gefunden";
}
?>