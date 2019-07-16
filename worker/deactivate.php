<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['linkid'])){
$linkid = mysqli_real_escape_string($conn,$_GET['linkid']);
$login_id=$_SESSION['login_id'];

$sql = "UPDATE linklist SET status = 0 WHERE linkid='$linkid' AND clientid='$login_id'";
$result = $conn->query($sql);
$_SESSION['message'] = 'Tab Deactivated Successfully';
header("location: ../index.php");
}else
echo "Invalid Link ID";

?>