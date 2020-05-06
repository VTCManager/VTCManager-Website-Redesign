<?php
$page_now = "management/bank";
$page_now_navbar = "clientarea/bank";
include '../get_user_data.php';

if (!isset($_POST["tra_id"]) || empty($_POST["tra_id"])) {
    header("location: /clientarea/bank/?idc=verify_tan_invalid_appr");
}
$tra_id = filter_var($_POST["tra_id"], FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM money_transfer WHERE id=$tra_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $tra_receiver_iban = $row["receiver"];
        $tra_amount = $row["amount"];
        $tra_tan_code = (int)$row["tan"];
    }
} else {
    header("location: /clientarea/bank/?idc=verify_tan_invalid_appr");
    exit;
}
if (isset($_POST["tan_code"])) {
    $input_tan_code = (int)filter_var($_POST["tan_code"], FILTER_SANITIZE_NUMBER_INT);
    if ($input_tan_code === $tra_tan_code) {
        $sql = "SELECT * FROM user_data WHERE iban='$tra_receiver_iban'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $tra_receiver = $row["username"];
        } else {
            //else check if a company exist with this iban code
            $sql = "SELECT * FROM company_information_table WHERE iban='$tra_receiver_iban'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $tra_receiver = $row["name"];
            } else {
                //else receiver doesn't exist
                header("Location: /clientarea/bank/?idc=err_unknown_receiver");
                exit;
            }
        }
        $sql = "UPDATE money_transfer SET status='sent' WHERE id=$tra_id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        //convert the sql results and add or increase the account balance
        $bank_balance_user_conv = floatval($bank_balance_user);
        $bank_balance_new = $bank_balance_user_conv - $tra_amount;
        //update user account balance
        $sql = "UPDATE user_data SET bank_balance=$bank_balance_new WHERE username='$username_cookie'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
            die("Fehler: Etwas ist schiefgelaufen.  Kontaktiere den Support!");
        }
        header("location: /clientarea/bank/?idc=tra_suc");
        exit();
    } else {
        $message = '<div class="alert alert-danger black-text" role="alert">
 <strong>Ungültiger TAN-Code</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../head.php'; ?>
</head>

<body class="elegant-color-dark">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php include '../php/navbar.php'; ?>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->
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
                    <div class="card-body elegant-color white-text d-flex justify-content-center align-items-center" style="width:100%;">
                        <!-- Material form register -->
                        <form class="w-auto" method="POST">
                            <?php echo $message; ?>
                            <input type="hidden" name="tra_id" value="<?php echo $tra_id; ?>">
                            <p class="h4 text-center py-4">TAN Bestätigung</p>

                            <p>Um die Transaktion abzuschließen, musst du die Tan eingeben, die wir dir per E-Mail zugestellt haben.</p>
                            <p>Empfänger IBAN: <?php echo $tra_receiver_iban; ?></p>
                            <p>Empfänger: <?php echo $tra_receiver; ?></p>
                            <p>Betrag: <?php echo $tra_amount; ?>€</p>
                            <!-- Material input email -->
                            <div class="md-form">
                                <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                                <input type="number" id="materialFormCardConfirmEx" min="0" max="999999" name="tan_code" class="white-text form-control">
                                <label for="materialFormCardConfirmEx" class="font-weight-light">TAN</label>
                            </div>

                            <div class="text-center py-4 mt-3">
                                <button class="btn btn-cyan" type="submit">Überweisung abschließen</button>
                            </div>
                        </form>
                        <!-- Material form register -->
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
    </script>

</body>

</html>