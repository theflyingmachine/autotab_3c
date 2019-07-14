<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['delid'])){
$delid = mysqli_real_escape_string($conn,$_GET['delid']);
$login_id=$_SESSION['login_id'];

$sql = "DELETE FROM linklist WHERE linkid='$delid' AND clientid='$login_id'";
//echo $sql;
$result = $conn->query($sql);
header("location: ../index.php");
}else
echo "Invalid Link ID";

?>