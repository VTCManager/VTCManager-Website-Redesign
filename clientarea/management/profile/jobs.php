<?php
$page_now = "management/profile";
include '../get_user_data.php';

$host = 'localhost:3306';
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF", "vtcmanager");
if (!$conn) {
    die("2");
}
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "1") {
        $info = '<div class="alert alert-success" role="alert">
    Deine Bewerbung wurde erfolgreich übermittelt!
    </div>';
    }
}

$sql = "SELECT * FROM company_information_table WHERE id=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
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
    echo "Error: Company not found";
    die();
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$user_company_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $employees = $result->num_rows;
} else {
}
$sql = "SELECT * FROM tour_table WHERE companyID=$user_company_id AND status='accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $tours_done = $result->num_rows;
} else {
}
$sql = "SELECT * FROM user_data WHERE userCompanyID=$user_company_id AND rank='owner'";
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
<html lang="de">

<head>
    <?php include '../../head.php'; ?>
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
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/clientarea/management/profile">Übersicht
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/clientarea/management/dashboard/employees">Mitarbeiter</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link waves-effect">Jobs</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.instagram.com/tnwm_group/" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/TNWM_group" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/account/logout" class="nav-link border border-light rounded waves-effect">
                                <i class="fas fa-sign-out-alt mr-2"></i>Abmelden
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
                        <a href="/clientarea/management/">Spedition</a>
                        <span>/</span>
                        <span>Jobs</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text" style="width:100%;">
                        <img src="<?php echo $Company_avatar; ?>" class="rounded float-left" style="height: 80px;width: 80px;height: auto;">
                        <?php if ($user_rank != "owner") { ?>
                            <div class="float-right">
                                <button type="button" class="btn btn-danger" onclick="location.href = 'https://vtc.northwestvideo.de/company/leave';">Kündigen</button>
                            </div>
                        <?php } ?>
                        <h1 style="margin-left: 90px;"> <?php echo $name; ?> </h1>
                        <br>
                        <?php
                        $sql2 = "SELECT * FROM job_market WHERE status='open' AND byCompanyID=$user_company_id";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while ($row = $result2->fetch_assoc()) {
                                $byCompanyID = $row["byCompanyID"];
                                $AdID = $row["AdID"];
                                $rank = $row["rank"];
                                $sql2 = "SELECT * FROM company_information_table WHERE id=$user_company_id";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result2->fetch_assoc()) {
                                        $byCompanyname = $row["name"];
                                    }
                                }
                                $job_desc = file_get_contents("https://vtc.northwestvideo.de/media/articles/ad_description/" . $AdID . '.txt');

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