<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if ((isset($_REQUEST['pass1']))&&(isset($_REQUEST['pass2']))){
$pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
$pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);

$login_id=$_SESSION['login_id'];
if ($pass1 != $pass2){
    echo "Passwords do not match..! Please try again.";
    $_SESSION['errormessage'] = 'Oops, Passwords do not match';
    header("location: ../index.php");
    exit;
}
$sql = "UPDATE client SET password = '$pass2' WHERE clientid='$login_id'";
//echo $sql;
$result = $conn->query($sql);
$_SESSION['message'] = 'Password Changed Successfully';

header("location: ../index.php");
}else
$_SESSION['errormessage'] = 'Oops, Something went worng..!!';
header("location: ../index.php");

?>