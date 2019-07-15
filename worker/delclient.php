<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['deleteid'])){
$deleteid = mysqli_real_escape_string($conn,$_POST['deleteid']);
if ($_SESSION['login_id']=="admin"){

$sql = "DELETE FROM client WHERE clientid='$deleteid'";
//echo $sql;
$result = $conn->query($sql);

$sql = "DELETE FROM linklist WHERE clientid='$deleteid'";
//echo $sql;
$result = $conn->query($sql);

header("location: ../admin.php");
}}else
echo "Oops, something went wrong...";

?>