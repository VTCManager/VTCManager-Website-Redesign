<?php
//Lade Project Manager aus der DB
	$sql = "SELECT * FROM user_data WHERE staff_role='Event/Convoy Manager'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$username = $row["username"];
			$userID = $row["userID"];
			$user_avatar_url = $row["profile_pic_url"];
			?>
			<div class="card bg-dark text-white shadow-lg">
                        <div class="card-body">
                          <img style="height: 184px;width: 184px;" src="<?php echo $user_avatar_url; ?>">
                          <a href="/user/?id=<?php echo $userID;?>"><h4 class="text-white mt-3 mb-0 text-center"><?php echo $username;?></h4></a>
                        </div>
            </div>
		<?php }
	} else {
		//Der Benutzer konnte in der DB nicht gefunden werden?>
		<div class="card bg-dark text-white shadow-lg">
                        <div class="card-body">
                          <img style="height: 184px;width: 184px;" src="https://image.freepik.com/vektoren-kostenlos/in-kuerze-nachricht-mit-lichtprojektor-beleuchtet_1284-3622.jpg">
                          <a><h4 class="text-white mt-3 mb-0 text-center">Posten unbesetzt</h4></a>
                        </div>
            </div>
	<?php }
?>
