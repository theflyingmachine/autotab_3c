<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}

//validation
if((empty($_REQUEST['url'])) && (($_FILES['fileToUpload']['size'] == 0))){
echo "URL or Flie is empty";
$_SESSION['errormessage'] = 'Oops, Please provide URL or Flie..!!';
header("location: ../index.php");
exit;
}
if(empty($_REQUEST['duration'])){
    $_SESSION['errormessage'] = 'Oops, Please enter duration..!!';
    header("location: ../index.php");   
    exit;
}

include("../config/config.php");
if (!empty($_REQUEST['url'])){
    echo $url = mysqli_real_escape_string($conn,$_POST['url']);
    $duration = 1000*mysqli_real_escape_string($conn,$_POST['duration']);
    $login_id=$_SESSION['login_id'];
    $sql = "INSERT INTO linklist (link,duration,clientid,status)VALUES ('$url','$duration','$login_id',1)";
    echo $sql;
    $result = $conn->query($sql);
    $_SESSION['message'] = 'New Tab Added Successfully';
    header("location: ../index.php");
}
elseif(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
    echo "Uploading img...";
//Add file
$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['errormessage'] = 'Oops, File Type Not Suported..!!';
        header("location: ../index.php");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['errormessage'] = 'Oops, File with same name already exists..!!';
    header("location: ../index.php");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 25000000) {
    // echo "Sorry, your file is too large.";
    $_SESSION['errormessage'] = 'Sorry, your file is too large!!';
header("location: ../index.php");

    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['errormessage'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed!!';
header("location: ../index.php");
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    $_SESSION['errormessage'] = 'Sorry, your file was not uploaded!!';
    header("location: ../index.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //if (gethostname()=="W1752027")
        
        echo $url = "http://".gethostname()."/autotab_3c/upload/" .basename( $_FILES["fileToUpload"]["name"]);
        $duration = 1000*mysqli_real_escape_string($conn,$_POST['duration']);
        $login_id=$_SESSION['login_id'];
        $sql = "INSERT INTO linklist (link,duration,clientid,status)VALUES ('$url','$duration','$login_id',1)";
        echo $sql;
        $result = $conn->query($sql);
        $_SESSION['message'] = 'New Tab Added Successfully';
        header("location: ../index.php");
    } else {
        $_SESSION['errormessage'] = 'Sorry, there was an error uploading your file.!!';
        header("location: ../index.php");
        // echo "Sorry, there was an error uploading your file.";
    }
}}
//$_SESSION['errormessage'] = 'Oops, Something went wrong...!!';
header("location: ../index.php");
// echo "Oops, Something went wrong...!!"
// $url = mysqli_real_escape_string($conn,$_POST['url']);


?>
