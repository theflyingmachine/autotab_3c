<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['url'])){
$url = mysqli_real_escape_string($conn,$_POST['url']);
$duration = mysqli_real_escape_string($conn,$_POST['duration']);
$login_id=$_SESSION['login_id'];

$sql = "INSERT INTO linklist (link,duration,clientid,status)VALUES ('$url','$duration','$login_id',1)";
echo $sql;
$result = $conn->query($sql);
header("location: ../index.php");
}else
echo "Invalid Link ID";

?>