<?php
session_start();
if (!($_SESSION['login'])) {
    header('Location: login.php');
}


include("../config/config.php");
$mon = ((!empty($_REQUEST['mon'])) ? 1 : 0);
$tue = ((!empty($_REQUEST['tue'])) ? 1 : 0);
$wed = ((!empty($_REQUEST['wed'])) ? 1 : 0);
$thu = ((!empty($_REQUEST['thu'])) ? 1 : 0);
$fri = ((!empty($_REQUEST['fri'])) ? 1 : 0);
$sat = ((!empty($_REQUEST['sat'])) ? 1 : 0);
$sun = ((!empty($_REQUEST['sun'])) ? 1 : 0);
$allday = $mon . $tue . $wed . $thu . $fri . $sat . $sun;

if ($allday == "0000000") {
    $_SESSION['errormessage'] = 'Oops, Please select atlease 1 day of the week..!!';
    header("location: ../index.php");
    exit;
}


include("../config/config.php");
if (isset($_REQUEST['editduration'])) {
    $editduration = 1000 * mysqli_real_escape_string($conn, $_POST['editduration']);
    $editlink = mysqli_real_escape_string($conn, $_POST['editlink']);
    $login_id = $_SESSION['login_id'];

    $sql = "UPDATE linklist SET mon=$mon, tue=$tue, wed=$wed, thu=$thu, fri=$fri, sat=$sat, sun=$sun, duration = '$editduration' WHERE linkid='$editlink' AND clientid='$login_id'";
    // echo $sql;
    // exit;
    $result = $conn->query($sql);
    $_SESSION['message'] = 'Tab Updated Successfully';
    header("location: ../index.php");
} else
    $_SESSION['errormessage'] = 'Oops, Something went worng..!!';
header("location: ../index.php");
