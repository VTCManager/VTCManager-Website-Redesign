<?php
$page_now_navbar = "clientarea/search";
include '../get_user_data.php';
$sql = "SELECT * FROM user_data WHERE username='$username_cookie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        date_default_timezone_set("+1");
        $userid_search = $row["userID"];
        $username_search = $row["username"];
        $userCompanyID_search = $row["userCompanyID"];
        $profile_pic_url_search = $row["profile_pic_url"];
        $rank_search = $row["rank"];
        $last_seen_search = $row["last_seen"];
        $last_seen_search = date('d.m.Y H:i', strtotime($last_seen_search));
        $last_seen_search = "zuletzt online am $last_seen_search";
        //if (strtotime($last_seen_search) > strtotime("-5 minutes")){
        //	$last_seen_search = "zuletzt online am $last_seen_search";
        //	}else{
        //	$last_seen_search = "online";
        //}
        $created_date_search = $row["created_date"];

        $created_date_search = date('d.m.Y', strtotime($created_date_search));
        if ($userCompanyID_search == "0") {
            $company_txt_search = "arbeitslos";
        } else {
            $sql = "SELECT * FROM company_information_table WHERE id=$userCompanyID_search";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $compname = $row["name"];
                    if ($rank != "owner") {
                        $rank_tr = "Fahrer";
                        $company_txt_search = "angestellt bei $compname als $rank_tr";
                    } else {
                        $company_txt_search = "selbstständig bei " . $compname;;
                    }
                }
            }
        }
    }
} else {
    echo "Error: User not found";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="/clientarea/management/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/clientarea/management/img/apple-icon.png">
    <title>VTCMInterface</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/clientarea/management/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/clientarea/management/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/clientarea/management/css/style.min.css" rel="stylesheet">
    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body class="elegant-color-dark">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php include '../php/navbar.php' ?>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5" style="padding-left: 10px;padding-right: 10px;">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea">Dashboard</a>
                        <span>/</span>
                        <span>Mein Profil</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text" style="width:100%;">
                        <h2><img src="<?php echo $user_avatar_url; ?>" class="rounded float-left" style="height: 80px;width: 80px;height: auto;"></h2>
                        <h2 style="margin-left: 90px;"><?php echo $username_cookie; ?><?php if ($user_team_role != "") { ?> |<a style="color:red;">
                                <?php echo $user_team_role; ?></a>
                        <?php } ?></h2>
                        <p><?php echo $last_seen_search; ?></p>
                        <?php if ($_GET['idc'] == "sc") {
                            echo '<div class="container"><div class="success" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Profil erfolgreich aktualisiert!</strong></p>
</div></div>';
                        } else if ($_GET['idc'] == "pic_not_img") {
                            echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist kein Bild!</strong></p>
</div></div>';
                        } else if ($_GET['idc'] == "pic_too_lg") {
                            echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bild ist zu groß (maximal 5MB)!</strong></p>
</div></div>';
                        } else if ($_GET['idc'] == "ic_format") {
                            echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Das hochgeladene Bildformat wird nicht unterstützt! (unterstützt: gif, jpg, png, jpeg)</strong></p>
</div></div>';
                        } else if ($_GET['idc'] == "server_fail") {
                            echo '<div class="container"><div class="danger" style="background-color: #f59898;
  border-left: 6px solid #f23333;">
  <p><strong>&nbsp;Upload abgebrochen. Unbekannter Fehler.</strong></p>
</div></div>';
                        } ?>
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link active" href="#profil" data-toggle="tab"><i class="fa fa-info"></i> Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-cogs"></i> Einstellungen</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active in" id="profil">
                                <form action="save_data" method="post" enctype="multipart/form-data">
                                    <div class="md-form">
                                        <textarea id="form7" name="exampleFormControlTextarea1" class="md-textarea form-control white-text" rows="10"><?php $breaks = array("<br />"); echo (str_ireplace($breaks, "", file_get_contents("../../../media.northwestvideo.de/media/articles/profil_about_me/" . $userID . '.txt'))); ?></textarea>
                                        <label for="form7">Über mich</label>
                    </div>
                                        <label for="input-file-now-custom-1">Profilbild hochladen</label>
                                        <input type="file" name="fileToUpload" id="fileToUpload"><br>
                                        <button type="submit" class="btn btn-primary" onclick="window.location.href = '$url_on_click_redi';" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
                                </form>
                                <hr>
                                <h3>Informationen</h3>
                                <p>
                                    <i class="fa fa-briefcase"></i> <?php echo $company_txt_search; ?> <br>
                                    <i class="fas fa-calendar-check"></i> registriert seit <?php echo $created_date_search; ?> <br>
                                </p>
                            </div>
                            <div class="tab-pane" id="settings">
                                <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo "delete"; ?>';">Account löschen</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/.Card-->
            </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php
    include '../php/footer.php'; //Footer laden
    ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/clientarea/management/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/clientarea/management/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/clientarea/management/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/clientarea/management/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>