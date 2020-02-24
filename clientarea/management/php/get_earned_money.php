<?php
//connect and Check
include '../get_user_data.php'; 
//Abfrage aktuelle Woche
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
//hole Umsätze aus dieser Woche
$sql = "SELECT amount FROM money_transfer WHERE receiver='$user_company_name' AND DATE( date_sent ) >= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //zähle Geld
        $current_amount = $current_amount + (int)$row["amount"];
    }
    //wenn Ergebnisse gefunden
    $array = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
    //wenn keine Ergebnisse gefunden
    $array = [
    "week" => $week,
    "amount" => 0,
    ];
 }
 //Geld zurücksetzen
$current_amount = 0;
//Abfrage letzte Woche
$day = date('w');
$week_start2 = date('Y-m-d',strtotime("$week_start -7 days",));
$week = date('W', strtotime('-7 days'));
//hole Umsätze
$sql = "SELECT amount FROM money_transfer WHERE receiver='$user_company_name' AND DATE( date_sent ) >= '$week_start2'AND DATE( date_sent ) <= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //zähle Geld
        $current_amount = $current_amount + (int)$row["amount"];
    }
    //wenn Ergebnisse gefunden
    $array2 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
    //wenn keine Ergebnisse gefunden
        $array2 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
//Geld zurücksetzen
$current_amount = 0;
//Abfrage vorletzte Woche
$day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start2 -7 days",));
$week = date('W', strtotime('-14 days'));
//hole Umsätze
$sql = "SELECT amount FROM money_transfer WHERE receiver='$user_company_name' AND DATE( date_sent ) >= '$week_start3'AND DATE( date_sent ) <= '$week_start2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //zähle Geld
        $current_amount = $current_amount + (int)$row["amount"];
    }
    //wenn Ergebnisse gefunden
    $array3 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
    //wenn keine Ergebnisse gefunden
        $array3 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
                //Abfrage vorvorletzte Woche
        $day = date('w');
$week_start4 = date('Y-m-d',strtotime("$week_start3 -7 days",));
$week = date('W', strtotime('-21 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='$user_company_name' AND DATE( date_sent ) >= '$week_start4'AND DATE( date_sent ) <= '$week_start3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array4 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array4 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
                $current_amount = 0;
                //Abfrage vorvorvorletzte Woche
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start4 -7 days",));
$week = date('W', strtotime('-28 days'));
$sql = "SELECT amount FROM money_transfer WHERE receiver='$user_company_name' AND DATE( date_sent ) >= '$week_start5'AND DATE( date_sent ) <= '$week_start4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_amount = $current_amount + (int)$row["amount"];
    }
    $array5 = [
    "week" => $week,
    "amount" => $current_amount,
    ];
}else{
        $array5 = [
    "week" => $week,
    "amount" => 0,
    ];
        }
$final_array = [
    $array,
    $array2,
    $array3,
    $array4,
    $array5,
];
    echo json_encode($final_array);

?>
