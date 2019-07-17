<?php
include("../config/config.php");


//Get day of week
$dayofweek=date('w');
$days = array("sun", "mon", "tue", "wed", "thu", "fri", "sat");
$todayday = $days[$dayofweek];

if (isset($_REQUEST['clientid'])) {
    $clientid = mysqli_real_escape_string($conn, $_GET['clientid']);

 $sql = "SELECT link, duration FROM linklist WHERE clientid= '$clientid' AND status=1 AND $todayday=1";
 
 $result = $conn->query($sql);
    $bcount = 0;
    $notified = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo $row['link'] . " " . $row['duration'] . "\n";
        }
    } else
        echo "No links to display";
} else
    echo "Invalid client ID";
