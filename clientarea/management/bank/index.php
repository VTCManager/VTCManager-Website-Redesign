<?php
$page_now = "management/bank";
include '../get_user_data.php';
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$results_per_page = 20;
$start_from = ($page - 1) * $results_per_page;
$sql = "SELECT * FROM company_information_table WHERE id=$user_company_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $found_company_bank_balance = $row["bank_balance"];
    }
} else {
}
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
        <!-- Navbar -->

        <!-- Sidebar -->
        <?php
        include '../php/sidebar.php'; ?>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->
    <div class="modal fade" id="transactioncompany" tabindex="-1" role="dialog">
        <div class="modal-dialog elegant-color white-text" role="document">
            <div class="modal-content elegant-color white-text">
                <form action="transaction_company" method="post" name="transactForm" id="transact_form">
                    <div class="modal-header unique-color">
                        <h4 class="modal-title w-100 font-weight-bold" id="myModalLabel">Überweisung von <?php echo $user_company_name; ?> tätigen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-form">
                            <input type="text" class="form-control white-text" name="receiver" id="receiver" autocomplete="off">
                            <label for="receiver">Überweisen an Nutzer/Firma...</label>
                        </div>
                        <div class="md-form input-group mb-0 white-text">
                            <input type="number" class="form-control white-text" name="amount" id="amount" min="1" max="1000000" required="">
                            <label for="amount">Betrag</label>
                            <div class="input-group-append">
                                <span class="input-group-text md-addon white-text">€</span>
                            </div>
                        </div>
                        <div class="md-form">
                            <input type="text" class="form-control white-text" name="message" id="message" maxlength="180" autocomplete="off">
                            <label for="receiver">Nachricht</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Überweisen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Main layout-->
    <main class="pt-4 mx-lg-5">
        <div class="container-fluid">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea/management/">Spedition</a>
                        <span>/</span>
                        <span>Bank</span>
                    </h4>

                </div>

            </div>
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card-->
                <div class="card" style="width:100%;">

                    <!--Card content-->
                    <div class="card-body elegant-color white-text" style="width:100%;">
                        <?php if ($_GET['idc'] == "tra_sc") {
                            echo '<div class="success black-text" style="background-color: #ddffdd;
  border-left: 6px solid #4CAF50;">
  <p><strong>&nbsp;Transaktion erfolgreich!</strong></p>
</div>';
                        } ?>
                        <?php if ($SeeBank == "1") {
                        ?>

                            <?php if ($UseBank == "1") {
                            ?>
                                <a href="#" class="btn btn-default float-right" data-toggle="modal" data-target="#transactioncompany">Überweisen</a>
                            <?php }
                            ?>
                            <h3>Firmenkonto von <?php echo $user_company_name; ?></h3>

                            <p>aktueller Kontostand: <?php echo $found_company_bank_balance; ?>€ </p>
                            <table class="table white-text" style="max-height: 150px !important; overflow: auto !important;">

                                <thead>
                                    <tr class="unique-color">
                                        <td>Absender</td>
                                        <td>Empfänger</td>
                                        <td>Nachricht</td>
                                        <td>Datum</td>
                                        <td>Betrag</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM money_transfer WHERE sender='$user_company_name' OR receiver='$user_company_name' ORDER by date_sent DESC LIMIT $start_from, " . $results_per_page;
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $sender = $row["sender"];
                                            $receiver = $row["receiver"];
                                            $message = $row["message"];
                                            $date_sent = $row["date_sent"];
                                            $amount = $row["amount"];
                                            $status = $row["status"];
                                            if ($status == "sent") {
                                                $status = "zugestellt";
                                            }
                                            $sql = "SELECT * FROM company_information_table WHERE name='$sender'";
                                            $result2 = $conn->query($sql);

                                            if ($result2->num_rows > 0) {
                                                $sender_href = "/clientarea/search/company?name=" . urlencode($sender);
                                            } else {
                                                $sender_href = "/clientarea/search/user?name=" . urlencode($receiver);
                                            }
                                            $sql = "SELECT * FROM company_information_table WHERE name='$receiver'";
                                            $result3 = $conn->query($sql);

                                            if ($result3->num_rows > 0) {
                                                $receiver_href = "/clientarea/search/company?name=" . urlencode($receiver);
                                            } else {
                                                $receiver_href = "/clientarea/search/user?name=" . urlencode($receiver);
                                            }
                                            $date_sent = date('d.m.Y', strtotime($date_sent));
                                            echo '<tr><td><a href="' . $sender_href . '" style="color:white;">' . $sender . '</a></td><td><a href="' . $receiver_href . '" style="color:white;">' . $receiver . '</a></td><td>' . $message . '</td><td>' . $date_sent . '</td><td>' . $amount . '€</td><td>' . $status . '</td></tr>';
                                        }
                                    } else {
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php
                                $sql = "SELECT COUNT(message) AS total FROM money_transfer WHERE sender='$user_company_name' OR receiver='$user_company_name'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

                                for ($i = 1; $i <= $total_pages; $i++) {  // print links for all pages
                                    echo "<a href='index.php?page=" . $i . "'";
                                    if ($i == $page)  echo " style='color:grey;'";
                                    echo ">" . $i . "</a> ";
                                };
                                ?>
                            </div>
                        <?php } else {
                            echo "Keine Berechtigung";
                        } ?>

                        <div class="tab-pane" id="credits">

                        </div>
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