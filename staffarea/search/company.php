<?php
$page_now = "staffarea/search";
include '../get_user_data.php';
$requested_comp_name = $_POST['companyname'];
if (isset($_POST['companyname'])) {
    $requested_comp_name = $conn->real_escape_string($requested_comp_name);
    $sql = "SELECT * FROM company_information_table WHERE name='$requested_comp_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $requested_comp_id = $row["id"];
            $name = $row["name"];
            $founded_date = $row["founded_date"];
            $driven_km = $row["driven_km"];
            $rank_route = $row["rank_route"];
            $rank_money = $row["rank_money"];
            $Company_avatar = $row["company_pic_url"];
            $discord_url = $row["discord_url"];
            $website_url = $row["website_url"];
            $teamspeak_url = $row["teamspeak_url"];
        }
    } else {
        echo "Error: Company not found2";
        die();
    }
} else {
    die("Error: Invalid Request");
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $employees = $result->num_rows;
} else {
}
$sql = "SELECT * FROM tour_table WHERE companyID=$requested_comp_id AND status='accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $tours_done = $result->num_rows;
} else {
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id AND rank='owner'";
$result = $conn->query($sql);
$owners = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name_owner_comp = $row["username"];
        array_push($owners, $name_owner_comp);
    }
} else {
}
$founded_date = date('d.m.Y', strtotime($founded_date));
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
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" target="_blank">
                    <strong class="blue-text">VTCMI</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Übersicht
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/">Fahrtenbuch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="connected-accounts">Verknüpfungen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/">Einstellungen</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect" target="_blank">
                                <i class="fab fa-github mr-2"></i>MDB GitHub
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <?php
        include '../php/sidebar.php'; ?>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="dashboard">Homepage</a>
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
                        <h1><img src="<?php echo $Company_avatar; ?>" class="rounded float-left" style="height: 80px;width: 80px;height: auto;"> <?php echo $name; ?>
                        </h1>
                        <?php if ($requested_comp_id == $company and $rank_user != "owner") { ?>
                            <div class="pull-right">
                                <button type="button" class="btn btn-danger" onclick="location.href = 'https://vtc.northwestvideo.de/company/leave';">Kündigen</button>
                            </div>
                        <?php } ?>
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link active" href="#about" data-toggle="tab"><i class="fa fa-info"></i> Über
                                    uns</a></li>
                            <li class="nav-item"><a class="nav-link" href="#employees" data-toggle="tab"><i class="fa fa-users"></i>
                                    Mitarbeiter</a></li>
                            <li class="nav-item"><a class="nav-link" href="#jobs" data-toggle="tab"><i class="fa fa-id-card"></i> Jobs</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab"><i class="fa fa-id-card"></i> Kontakt</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active in" id="about">
                                <?php
                                echo file_get_contents("https://vtc.northwestvideo.de/media/articles/company_about_us/" . $requested_comp_id . '.txt');
                                ?>
                                <hr>
                                <h3><i class="fas fa-info-circle"></i> Informationen</h3>
                                <p>
                                    <i class="fas fa-calendar-alt"></i> Gegründet am: <?php echo $founded_date; ?> <br>
                                    <i class="fas fa-user"></i> Geschäftsführung: <?php foreach ($owners as $value) {
                                                                                        $owners_string = $owners_string . $value . ", ";
                                                                                    }
                                                                                    $owners_string = substr($owners_string, 0, -2);
                                                                                    echo $owners_string;
                                                                                    ?><br>
                                    <i class="fas fa-users"></i> Mitarbeiter: <?php echo $employees; ?> <br>
                                    <i class="fas fa-truck-loading"></i> abgeschlossene Touren:
                                    <?php echo $tours_done; ?> <br>
                                    <!--<i class="fas fa-road"></i> zurückgelegte Strecke: <?php echo $driven_km; ?> km<br>-->
                                    <!--<i class="fas fa-trophy"></i> Rang(Strecke): <?php echo $rank_route; ?> <br>-->
                                    <!--<i class="fas fa-trophy"></i> Rang(Kapital): <?php echo $rank_money; ?> <br>-->
                                </p>
                            </div>

                            <div class="tab-pane" id="employees">
                                <table class="table" style="max-height: 150px !important; overflow: auto !important;">
                                    <thead class="white-text">
                                        <tr>
                                            <td>Mitarbeiter</td>
                                            <td>aktuelle Rolle</td>
                                            <?php if ($EditEmployees == "1" && $requested_comp_id == $company) { ?>
                                                <td>Neue Rolle zuweisen</td>
                                            <?php } ?>
                                            <td></td>
                                        </tr>
                                    </thead>

                                    <tbody class="white-text">
                                        <?php

                                        $sql2 = "SELECT * FROM user_data WHERE userCompanyID=$requested_comp_id ORDER BY rank DESC";
                                        $result2 = $conn->query($sql2);

                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result2->fetch_assoc()) {
                                                $username = utf8_encode($row["username"]);
                                                $userid = $row["userID"];
                                                $user_rank = $row["rank"];
                                                $profile_pic_url = $row["profile_pic_url"];
                                                if ($user_rank == "owner") {
                                                    $user_rank_translation = "Geschäftsführung";
                                                } else {
                                                    $user_rank_translation = $user_rank;
                                                }
                                                if ($EditEmployees == "1" && $requested_comp_id == $company && $username != $found_token_owner) {

                                                    $delete_bt = '<td><i class="fa fa-trash" onclick="delete_entry(this);" aria-hidden="true" data-id="' . $username . '" style="cursor: pointer;"></i></td>';
                                                    echo '<tr data-id="' . $username . '"><td><a href="/account/?userid=' . $userid . '"><img class="profilePicture" src="' . $profile_pic_url . '">' . $username . '</a></td><td>' . $user_rank_translation . '</td>';
                                        ?>
                                                    <td>

                                                        <select onchange="change_rank(this)" data-id="<?php echo $username; ?>">
                                                            <?php
                                                            $sql = "SELECT * FROM rank WHERE forCompanyID=$requested_comp_id AND name NOT IN ('$user_rank')";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $name_rank_comp = $row["name"];
                                                                    echo '<option value="' . $name_rank_comp . '">' . $name_rank_comp . '</option>';
                                                                }
                                                            } else {
                                                            }
                                                            ?>
                                                        </select></td>
                                                    <td><?php echo $delete_bt; ?></td>
                                                    </tr>

                                        <?php
                                                } else {
                                                    echo '<tr><td><a class="white-text" href="/account/?userid=' . $userid . '"><img style="height: 80px;width: 80px;height: auto;" src="' . $profile_pic_url . '"> ' . $username . '</a></td><td>' . $user_rank_translation . '</td><td></td><td></td><td></td></tr>';
                                                }
                                            }
                                        } else {
                                            echo "No Employees";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="contact">
                                <?php if ($discord_url != "") { ?>
                                    <button type="button" class="btn btn-info" onclick="window.location='<?php echo $discord_url; ?>';" ><i class="fab fa-discord pr-2" aria-hidden="true"></i> Discord </button>
                                <?php }
                                if ($teamspeak_url != "") { ?>
                                    <button type="button" class="btn btn-info" onclick="window.location='<?php echo $teamspeak_url; ?>';"><i class="fab fa-teamspeak pr-2" aria-hidden="true"></i> Teamspeak </button>
                                <?php }
                                if ($website_url != "") { ?>
                                    <button type="button" class="btn btn-info" onclick="window.location='<?php echo $website_url; ?>';"><i class="fas fa-desktop pr-2" aria-hidden="true"></i> Webseite </button>
                                <?php } ?>


                            </div>
                            <div class="tab-pane" id="jobs">
                                <?php
                                $sql2 = "SELECT * FROM job_market WHERE status='open' AND byCompanyID=$requested_comp_id";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result2->fetch_assoc()) {
                                        $byCompanyID = $row["byCompanyID"];
                                        $AdID = $row["AdID"];
                                        $rank = $row["rank"];
                                        $sql2 = "SELECT * FROM company_information_table WHERE id=$requested_comp_id";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result2->fetch_assoc()) {
                                                $byCompanyname = $row["name"];
                                            }
                                        }
                                        $job_desc = file_get_contents("../media/articles/ad_description/" . $AdID . '.txt');

                                        echo <<<EOT
				<h2>$byCompanyname - $rank gesucht!</h2>
				<span class="text" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;"><a href="/job_ad?id=$AdID">$job_desc</a></span><hr>
				EOT;
                                    }
                                } else {
                                    echo "No active job offers were found";
                                }
                                ?>

                                <br>


                            </div>
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
<?php mysqli_close($conn); ?>