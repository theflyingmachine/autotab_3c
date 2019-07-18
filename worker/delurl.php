<?php
session_start();
if (!($_SESSION['login'])) {
    header('Location: login.php');
}



include("../config/config.php");
if (isset($_REQUEST['deleteurlid'])) {
    $delid = mysqli_real_escape_string($conn, $_POST['deleteurlid']);
    $login_id = $_SESSION['login_id'];


    //Try to delete file from server
    $sql = "SELECT * FROM linklist WHERE linkid='$delid' AND clientid='$login_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (strpos($row['link'], 'autotab_3c/upload/') !== false) {
                echo $path= str_replace("http://". gethostname() ."/autotab_3c/upload/","upload/",$row['link']);
                chdir("..");
                unlink($path);
              
            }
        }
    }    

    echo $sql = "DELETE FROM linklist WHERE linkid='$delid' AND clientid='$login_id'";
    //echo $sql;
    $result = $conn->query($sql);
    $_SESSION['message'] = 'Tab Deleted Successfully';
    header("location: ../index.php");
} else
    echo "Invalid Link ID";
