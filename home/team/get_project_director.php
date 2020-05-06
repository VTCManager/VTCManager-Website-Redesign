<?php
//Lade Project Director aus der DB
$sql = "SELECT * FROM user_data WHERE staff_role='Project Director'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$username = $row["username"];
		$userID = $row["userID"];
		$user_avatar_url = $row["profile_pic_url"];
?>
		<div class="col-sm-auto m-md-5">
			<div class="card bg-dark text-white shadow-lg">
				<div class="card-body">
					<img class="rounded" style="height: 190px;width: 190px;height: auto;" src="<?php echo $user_avatar_url; ?>">
					<a href="/user/?id=<?php echo $userID; ?>">
						<h4 class="text-white mt-3 mb-0 text-center"><?php echo $username; ?></h4>
					</a>
				</div>
			</div>
		</div>
<?php }
} else {
	//Der Benutzer konnte in der DB nicht gefunden werden
	echo "Keine Ergebnisse";
}
?>