<?php
//Lade Project Manager aus der DB
$sql = "SELECT * FROM user_data WHERE patreon_state != ''";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $userID = $row["userID"];
        $user_avatar_url = $row["profile_pic_url"];
        $user_patreon_state = $row["patreon_state"];
?>
        <div class="col-sm-auto m-md-5">
            <div class="card bg-dark text-white shadow-lg">
                <div class="card-body">
                    <img class="rounded" style="height: 190px;width: 190px;height: auto;" src="<?php echo $user_avatar_url; ?>">
                    <a href="/user/?id=<?php echo $userID; ?>">
                        <h4 class="text-white mt-3 mb-0 text-center"><?php echo $username; ?>
                            <?php if ($user_patreon_state == "1") { ?>
                                <a href="#" data-toggle="tooltip" title="Patreon: Coffee Donator"><i class="fab fa-patreon" style="color: burlywood;"></i></a>
                            <?php } else if ($user_patreon_state == "2") { ?>
                                <a href="#" data-toggle="tooltip" title="Patreon: Fan"><i class="fab fa-patreon" style="color:silver;"></i></a>
                            <?php } else if ($user_patreon_state == "3") { ?>
                                <a href="#" data-toggle="tooltip" title="Patreon: Project Supporter"><i class="fab fa-patreon" style="color:gold;"></i></a>
                            <?php } ?>
                        </h4>
                    </a>
                </div>
            </div>
        </div>
    <?php }
} else {
    //Der Benutzer konnte in der DB nicht gefunden werden
    ?>
    <div class="col-sm-auto m-md-5">
        <div class="card bg-dark text-white shadow-lg">
            <div class="card-body">
                <img style="height: 184px;width: 184px;" src="https://image.freepik.com/vektoren-kostenlos/in-kuerze-nachricht-mit-lichtprojektor-beleuchtet_1284-3622.jpg">
                <a>
                    <h4 class="text-white mt-3 mb-0 text-center">Noch keine Patreons :/</h4>
                </a>
            </div>
        </div>
    </div>
<?php }
?>