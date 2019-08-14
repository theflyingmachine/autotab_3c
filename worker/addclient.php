<?php
session_start();
if (!($_SESSION['login'])) {
    header('Location: login.php');
}

include("../config/config.php");
if (isset($_REQUEST['client'])) {
    $randkey = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 32)), 0, 32);
    $client = mysqli_real_escape_string($conn, $_POST['client']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    if ($_SESSION['login_id'] == "admin") {

        $sql = "INSERT INTO client (client,password,licencekey,status)VALUES ('$client','$password','$randkey',1)";
        //echo $sql;
        $result = $conn->query($sql);
        $_SESSION['message'] = 'Client Added Successfully';
        header("location: ../admin.php");
    }
} else
    echo "Oops, something went wrong...";
