
<?php
//es fehlt GET mit companyID
$host = 'localhost:3306';    
$conn = mysqli_connect($host, "system_user_vtc", "8rh98w23nrfubsediofnm<pbi9ufuoipbgiwtFFF","vtcmanager"); 
if(! $conn )  
{  
  die("2");  
}  
$day = date('w');
$week_start = date('Y-m-d', strtotime('-'.$day.' days + 1 day'));
$date = new DateTime();
$week = $date->format("W");
$sql = "SELECT COUNT(*) AS num FROM tour_table WHERE companyID=1 AND DATE( tour_date ) >= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_tours = $row["num"];
    }
    $array = [
    "week" => $week,
    "count" => $current_tours,
    ];
    }else{
        $array = [
    "week" => $week,
    "count" => 0,
    ];
        }
        $current_amount = 0;
    $day = date('w');
$week_start2 = date('Y-m-d',strtotime("$week_start -7 days",));
$week = date('W', strtotime('-7 days'));
$sql = "SELECT COUNT(*) AS num FROM tour_table WHERE companyID=1 AND DATE( tour_date ) >= '$week_start2'AND DATE( tour_date ) <= '$week_start'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_tours = $row["num"];
    }
    $array2 = [
    "week" => $week,
    "count" => $current_tours,
    ];
}else{
        $array2 = [
    "week" => $week,
    "count" => 0,
    ];
        }
        $current_amount = 0;
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start2 -7 days",));
$week = date('W', strtotime('-14 days'));
$sql = "SELECT COUNT(*) AS num FROM tour_table WHERE companyID=1 AND DATE( tour_date ) >= '$week_start3'AND DATE( tour_date ) <= '$week_start2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_tours = $row["num"];
    }
    $array3 = [
    "week" => $week,
    "count" => $current_tours,
    ];
}else{
        $array3 = [
    "week" => $week,
    "count" => 0,
    ];
        }
                $current_amount = 0;
        $day = date('w');
$week_start4 = date('Y-m-d',strtotime("$week_start3 -7 days",));
$week = date('W', strtotime('-21 days'));
$sql = "SELECT COUNT(*) AS num FROM tour_table WHERE companyID=1 AND DATE( tour_date ) >= '$week_start4'AND DATE( tour_date ) <= '$week_start3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $current_tours = $row["num"];
    }
    $array4 = [
    "week" => $week,
    "count" => $current_tours,
    ];
}else{
        $array4 = [
    "week" => $week,
    "count" => 0,
    ];
        }
                $current_amount = 0;
        $day = date('w');
$week_start3 = date('Y-m-d',strtotime("$week_start4 -7 days",));
$week = date('W', strtotime('-28 days'));
$sql = "SELECT COUNT(*) AS num FROM tour_table WHERE companyID=1 AND DATE( tour_date ) >= '$week_start5'AND DATE( tour_date ) <= '$week_start4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $current_tours = $row["num"];
    }
    $array5 = [
    "week" => $week,
    "count" => $current_tours,
    ];
}else{
        $array5 = [
    "week" => $week,
    "count" => 0,
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
