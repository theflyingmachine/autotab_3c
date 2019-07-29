<?php
echo $nowtime = date('d/m/Y h:i A');

include("../config/config.php");
$sql = "UPDATE linklist SET status=1 WHERE startdate='$nowtime'";
$result = $conn->query($sql);

// $sql = "select * from linklist WHERE expdate='$nowtime'";
$sql = "UPDATE linklist SET status=3 WHERE expdate='$nowtime'";
$result = $conn->query($sql);
// while ($row = $result->fetch_assoc()) {
// echo $row['expdate'];
// }
