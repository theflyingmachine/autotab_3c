<?php
include("../config/config.php");


//Get day of week
$dayofweek = date('w');
$days = array("sun", "mon", "tue", "wed", "thu", "fri", "sat");
$todayday = $days[$dayofweek];

if (isset($_REQUEST['clientid'])) {
    $licencekey = mysqli_real_escape_string($conn, $_GET['clientid']);
    if (isset($_REQUEST['hostname'])) {
        $hostname = mysqli_real_escape_string($conn, $_GET['hostname']);
    } else {
        $hostname = "UnkownDevice";
    }
    $sql = "SELECT clientid FROM client WHERE licencekey= '$licencekey' AND status=1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $clientid =  $row['clientid'];



    $sql = "SELECT link, duration FROM linklist WHERE clientid= '$clientid' AND status=1 AND $todayday=1 ORDER BY display_order";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo $row['link'] . " " . $row['duration'] . "\n";
        }
    } else {
        $sql = "SELECT link FROM linklist WHERE clientid= '$clientid'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "http://" . gethostname() . "/autotab_3c/player/errornoactivetab.html 30000";
        } else {
            $sql = "SELECT client FROM client WHERE clientid= '$clientid'";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "http://" . gethostname() . "/autotab_3c/player/errornotab.html 30000";
            } else {
                echo "http://" . gethostname() . "/autotab_3c/player/errorinvalidclient.html 30000";
            }
        }
    }

    // Update connceted device heartbeat
    $sql = "INSERT INTO devices (clientid,devicename,lastseen)VALUES ('$clientid','$hostname',now())ON DUPLICATE KEY UPDATE clientid=$clientid, lastseen=now()";
    $result = $conn->query($sql);
}
