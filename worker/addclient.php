<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['client'])){
$client = mysqli_real_escape_string($conn,$_POST['client']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$password=md5($password);
if ($_SESSION['login_id']=="admin"){

$sql = "INSERT INTO client (client,password)VALUES ('$client','$password')";
//echo $sql;
$result = $conn->query($sql);
$_SESSION['message'] = 'Client Added Successfully';
header("location: ../admin.php");
}}else
echo "Oops, something went wrong...";

?>