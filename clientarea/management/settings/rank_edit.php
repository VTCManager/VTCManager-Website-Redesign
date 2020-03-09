<?php
include '../get_user_data.php';
$page_now = "management/settings";
if ($EditEmployees != "1") {
    header("Status: 404 Not Found");
    die();
}
$requested_rank = $_POST['rank'];
$requested_rank = $conn->real_escape_string($requested_rank);

$sql = "SELECT * FROM rank WHERE name='$requested_rank' AND forCompanyID=$user_company_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $EditProfile_se = $row["EditProfile"];
        $SeeLogbook_se = $row["SeeLogbook"];
        $EditLogbook_se = $row["EditLogbook"];
        $SeeBank_se = $row["SeeBank"];
        $UseBank_se = $row["UseBank"];
        $EditSalary_se = $row["EditSalary"];
        $EditEmployees_se = $row["EditEmployees"];
        $salary_se = $row["salary"];
        $struct_id_se = $row["struct_id"];
    }
} else {
    die("rank not found");
}
if ($requested_rank == "driver") {
    $requested_rank_tra = "Fahrer";
} else if ($requested_rank == "owner") {
    $requested_rank_tra = "Geschäftsführer";
} else {
    $requested_rank_tra = $requested_rank;
}
mysqli_close($conn);
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

        <!-- Sidebar -->
        <?php
        include '../php/sidebar.php'; ?>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mx-lg-5">
        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex elegant-color white-text justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea/management/">Spedition</a>
                        <span>/</span>
                        <span>Einstellungen</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <!--Card-->
            <div class="card">

                <!--Card content-->
                <div class="card-body elegant-color white-text">
                    <h2>Rolle: <?php echo $requested_rank_tra; ?></h2>
                    <form action="save_ranks" method="post" enctype="multipart/form-data">
                        <input type='hidden' name='rank' value='<?php echo $requested_rank; ?>' />
                        <?php if ($requested_rank != "owner") { ?>
                            <input type="checkbox" name="EditProfile" value="1" <?php if ($EditProfile_se == "1") {
                                                                                    echo "checked";
                                                                                } ?>> Firmenprofil bearbeiten<br>
                            <input type="checkbox" name="SeeLogbook" value="1" <?php if ($SeeLogbook_se == "1") {
                                                                                    echo "checked";
                                                                                } ?>> Fahrtenbuch einsehen<br>
                            <input type="checkbox" name="EditLogbook" value="1" <?php if ($EditLogbook_se == "1") {
                                                                                    echo "checked";
                                                                                } ?>> Fahrtenbuch verwalten<br>
                            <input type="checkbox" name="SeeBank" value="1" <?php if ($SeeBank_se == "1") {
                                                                                echo "checked";
                                                                            } ?>> Firmenkonto einsehen<br>
                            <input type="checkbox" name="UseBank" value="1" <?php if ($UseBank_se == "1") {
                                                                                echo "checked";
                                                                            } ?>> Überweisungen tätigen<br>
                            <input type="checkbox" name="EditSalary" value="1" <?php if ($EditSalary_se == "1") {
                                                                                    echo "checked";
                                                                                } ?>> Gehalt bearbeiten<br>
                            <input type="checkbox" name="EditEmployees" value="1" <?php if ($EditEmployees_se == "1") {
                                                                                        echo "checked";
                                                                                    } ?>> Mitarbeiter & Stellenanzeigen
                            verwalten<br>
                            <div class="input-group">
                                <div class="md-form input-group mb-0 white-text">
                                    <input type="number" class="form-control white-text" name="salary" id="form1" required="" value="<?php echo $salary_se; ?>">
                                    <label for="form1">Gehalt</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text md-addon white-text">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form input-group mb-0 white-text">
                                    <input type="number" class="form-control white-text" name="struct_id" id="struct_id" required="" value="<?php echo $struct_id_se; ?>">
                                    <label for="struct_id">StrukturierungsID</label>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="input-group">
                                <div class="md-form input-group mb-0 white-text">
                                    <input type="number" class="form-control white-text" name="salary" id="form1" required="" value="<?php echo $salary_se; ?>">
                                    <label for="form1">Gehalt</label>
                                    <div class="input-group-append">
                                        <span class="input-group-text md-addon white-text">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form input-group mb-0 white-text">
                                    <input type="number" class="form-control white-text" name="struct_id" id="struct_id" required="" value="<?php echo $struct_id_se; ?>">
                                    <label for="struct_id">StrukturierungsID</label>
                                </div>
                            </div>
                        <?php } ?>
                        <button type="submit" name="submit" class="btn btn-primary" style="background-color: #4CAF50;"><i class="fas fa-cogs"></i> Speichern</button>
                    </form>
                </div>

            </div>
            <!--/.Card-->

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php
    include '../php/footer.php'; ?>
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