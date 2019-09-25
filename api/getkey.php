<?php
include("../config/config.php");


if (isset($_REQUEST['username'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    if (isset($_REQUEST['password'])) {
        $password = mysqli_real_escape_string($conn, $_GET['password']);
        $password=md5($password);
    } else {
       echo "password needed";
       exit;
    }
   
   
    $sql = "SELECT licencekey FROM client WHERE client= '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $licencekey =  $row['licencekey'];
    }else{
        echo "Invalid Username or Password";
    }
}else{
    echo "Username needed";
}