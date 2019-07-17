<?php
include("../config/config.php");
if (isset($_REQUEST['clientid'])) {
    $clientid = mysqli_real_escape_string($conn, $_GET['clientid']);

    $sql = "SELECT link, duration FROM linklist WHERE clientid= '$clientid' AND status=1";
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
