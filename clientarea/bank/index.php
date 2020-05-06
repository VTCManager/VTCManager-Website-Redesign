<?php
$page_now = "management/bank";
$page_now_navbar = "clientarea/bank";
include '../get_user_data.php';
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$results_per_page = 20;
$start_from = ($page - 1) * $results_per_page;
$sql = "SELECT * FROM user_data WHERE userID=$userID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $found_user_bank_balance = $row["bank_balance"];
    }
} else {
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../head.php'; ?>
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
        <?php include '../php/navbar.php'; ?>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->
    <div class="modal fade" id="transactioncompany" tabindex="-1" role="dialog">
        <div class="modal-dialog elegant-color white-text" role="document">
            <div class="modal-content elegant-color white-text">
                <form action="start_transaction" method="post" name="transactForm" id="transact_form">
                    <div class="modal-header unique-color">
                        <h4 class="modal-title w-100 font-weight-bold" id="myModalLabel">Überweisung von meinem Privatkonto tätigen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="md-form">
                            <input type="text" class="form-control white-text" name="iban" id="iban" autocomplete="off" maxlength="23">
                            <label for="iban">IBAN</label>
                        </div>
                        <p id="iban-receiver"></p>
                        <div class="md-form input-group mb-0 white-text">
                            <input type="number" class="form-control white-text" name="amount" id="amount" min="1" max="1000000" required="">
                            <label for="amount">Betrag</label>
                            <div class="input-group-append">
                                <span class="input-group-text md-addon white-text">€</span>
                            </div>
                        </div>
                        <div class="md-form">
                            <input type="text" class="form-control white-text" name="message" id="message" maxlength="180" autocomplete="off">
                            <label for="receiver">Verwendungszweck</label>
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
    <main class="pt-5" style="padding-left: 10px;padding-right: 10px;">
        <div class=" container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body elegant-color white-text d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/clientarea/">Dashboard</a>
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
                    <div class="card-body elegant-color white-text" style="width:100%;overflow: auto;">
                        <?php if ($_GET['idc'] == "tra_suc") {
                            echo '<div class="alert alert-success black-text" role="alert">
<strong>Überweisung erfolgreich gestartet!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                        } else if ($_GET['idc'] == "err_unknown_receiver") {
                            echo '<div class="alert alert-danger black-text" role="alert">
<strong>Der Empfänger existiert nicht!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                        } else if ($_GET['idc'] == "verify_tan_invalid_appr") {
                            echo '<div class="alert alert-danger black-text" role="alert">
 <strong>Fehler bei der TAN-Prüfung: Ungültige Anfrage!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                        } ?>
                        <a href="#" class="btn btn-default float-right" data-toggle="modal" data-target="#transactioncompany">Überweisen</a>
                        <h2>Mein Privatkonto</h2>
                        <br>

                        <p>aktueller Kontostand: <?php echo $found_user_bank_balance; ?>€ </p>
                        <p>Meine IBAN: <?php echo $user_iban; ?></p>
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
                                $sql = "SELECT * FROM money_transfer WHERE sender='$user_iban' OR receiver='$user_iban' ORDER by date_sent DESC LIMIT $start_from, " . $results_per_page;
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $sender_iban = $row["sender"];
                                        $receiver_iban = $row["receiver"];
                                        $message = $row["message"];
                                        $date_sent = $row["date_sent"];
                                        $amount = $row["amount"];
                                        $status = $row["status"];
                                        if ($status == "sent") {
                                            $status = '<i class="fas fa-envelope"></i> Gesendet';
                                        } else if ($status == "wait_for_tan") {
                                            $status = '<i class="fas fa-clock"></i> Warte auf TAN-Bestätigung';
                                        } else if ($status == "delivered") {
                                            $status = '<i class="fas fa-envelope-open"></i> Zugestellt';
                                        }
                                        $sql = "SELECT * FROM company_information_table WHERE iban='$sender_iban'";
                                        $result2 = $conn->query($sql);

                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                                $sender_name = $row2["name"];
                                                $sender_href = "/clientarea/search/company?name=" . urlencode($sender_name);
                                            }
                                        } else {
                                            $sql = "SELECT * FROM user_data WHERE iban='$sender_iban'";
                                            $result3 = $conn->query($sql);

                                            if ($result3->num_rows > 0) {
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    $sender_name = $row3["username"];
                                                    $sender_href = "/clientarea/search/user?name=" . urlencode($sender_name);
                                                }
                                            } else {
                                                $sender_href = "";
                                            }
                                        }
                                        $sql = "SELECT * FROM company_information_table WHERE iban='$receiver_iban'";
                                        $result4 = $conn->query($sql);

                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                                $receiver_name = $row2["name"];
                                                $receiver_href = "/clientarea/search/company?name=" . urlencode($receiver_name);
                                            }
                                        } else {
                                            $sql = "SELECT * FROM user_data WHERE iban='$receiver_iban'";
                                            $result3 = $conn->query($sql);

                                            if ($result3->num_rows > 0) {
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    $receiver_name = $row3["username"];
                                                    $receiver_href = "/clientarea/search/user?name=" . urlencode($receiver_name);
                                                }
                                            } else {
                                                $receiver_href = "";
                                            }
                                        }
                                        $date_sent = date('d.m.Y H:i', strtotime($date_sent));
                                        echo '<tr><td><a data-toggle="tooltip" title="' . $sender_iban . '" href="' . $sender_href . '" style="color:white;">' . $sender_name . '</a></td><td><a data-toggle="tooltip" title="' . $receiver_iban . '" href="' . $receiver_href . '" style="color:white;">' . $receiver_name . '</a></td><td>' . $message . '</td><td>' . $date_sent . '</td><td>' . $amount . '€</td><td>' . $status . '</td></tr>';
                                    }
                                } else {
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php
                            $sql = "SELECT COUNT(message) AS total FROM money_transfer WHERE sender='$username_cookie' OR receiver='$username_cookie'";
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
    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#iban").on("focusout", function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var responseobj = JSON.parse(this.responseText);
                        if (responseobj["status"] == "success") {
                            document.getElementById("iban-receiver").innerHTML = "Empfänger: " + responseobj["receiver"];
                        } else {
                            document.getElementById("iban-receiver").innerHTML = "Keine Empfänger gefunden";
                        }
                    }
                };
                xhttp.open("GET", "get_iban_receiver?iban=" + $("#iban").val(), true);
                xhttp.send();
            });
        });
        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>