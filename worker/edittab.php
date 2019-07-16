<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['editduration'])){
$editduration = 1000*mysqli_real_escape_string($conn,$_POST['editduration']);
$editlink = mysqli_real_escape_string($conn,$_POST['editlink']);
$login_id=$_SESSION['login_id'];

$sql = "UPDATE linklist SET duration = '$editduration' WHERE linkid='$editlink' AND clientid='$login_id'";
//echo $sql;
$result = $conn->query($sql);
$_SESSION['message'] = 'Tab Updated Successfully';
header("location: ../index.php");
}else
$_SESSION['errormessage'] = 'Oops, Something went worng..!!';
header("location: ../index.php");

?>