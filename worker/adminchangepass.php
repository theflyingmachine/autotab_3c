<?php
session_start();
if (!($_SESSION['login'])) {
    header('Location: login.php');
}

include("../config/config.php");
if ((isset($_REQUEST['resetid'])) && (isset($_REQUEST['pass1'])) && (isset($_REQUEST['pass2']))) {
   echo $resetid = mysqli_real_escape_string($conn, $_POST['resetid']);
   echo $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
   echo  $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);


    if ($pass1 != $pass2) {
        echo "Passwords do not match..! Please try again.";
        $_SESSION['errormessage'] = 'Oops, Passwords do not match';
        header("location: ../admin.php");
        exit;
    }
    $pass2 = md5($pass2);
    $sql = "UPDATE client SET password = '$pass2' WHERE clientid='$resetid'";
    //echo $sql;
    $result = $conn->query($sql);
    $_SESSION['message'] = 'Password Changed Successfully';

    header("location: ../admin.php");
} else
    $_SESSION['errormessage'] = 'Oops, Something went worng..!!';
header("location: ../admin.php");
