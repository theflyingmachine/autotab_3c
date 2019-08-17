<?php
session_start();
ini_set('max_execution_time', 300); // 300 (seconds) = 5 Minutes
if (!($_SESSION['login'])) {
    header('Location: login.php');
}
echo "<table>";
foreach ($_POST as $key => $value) {
    echo "<tr>";
    echo "<td>";
    echo $key;
    echo "</td>";
    echo "<td>";
    echo $value;
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
$expdate = ((!empty($_REQUEST['expdate'])) ? true : false);
if ($expdate) {
    echo $startdate = substr($_POST['datetimes'], 0, 19);
    echo "<br>";
    echo $enddate = substr($_POST['datetimes'], -19);
}
// exit;

include("../config/config.php");
$mon = ((!empty($_REQUEST['mon'])) ? 1 : 0);
$tue = ((!empty($_REQUEST['tue'])) ? 1 : 0);
$wed = ((!empty($_REQUEST['wed'])) ? 1 : 0);
$thu = ((!empty($_REQUEST['thu'])) ? 1 : 0);
$fri = ((!empty($_REQUEST['fri'])) ? 1 : 0);
$sat = ((!empty($_REQUEST['sat'])) ? 1 : 0);
$sun = ((!empty($_REQUEST['sun'])) ? 1 : 0);
$allday = $mon . $tue . $wed . $thu . $fri . $sat . $sun;




if ($allday == "0000000") {
    $_SESSION['errormessage'] = 'Oops, Please select atlease 1 day of the week..!!';
    header("location: ../index.php");
    exit;
}


//validation
if ((empty($_REQUEST['url'])) && (($_FILES['fileToUpload']['size'] == 0))) {
    echo "URL or Flie is empty";
    $_SESSION['errormessage'] = 'Oops, Please provide URL or Flie..!!';
    header("location: ../index.php");
    exit;
}
if (empty($_REQUEST['duration'])) {
    $_SESSION['errormessage'] = 'Oops, Please enter duration..!!';
    header("location: ../index.php");
    exit;
}


if (!empty($_REQUEST['url'])) {
    echo $url = mysqli_real_escape_string($conn, $_POST['url']);
    $duration = 1000 * mysqli_real_escape_string($conn, $_POST['duration']);
    $login_id = $_SESSION['login_id'];
    if ($expdate) {
        $sql = "INSERT INTO linklist (link,duration,clientid,mon,tue,wed,thu,fri,sat,sun,startdate,expdate,status)VALUES ('$url','$duration','$login_id','$mon','$tue','$wed','$thu','$fri','$sat','$sun','$startdate','$enddate',2)";
    } else {
        $sql = "INSERT INTO linklist (link,duration,clientid,mon,tue,wed,thu,fri,sat,sun,status)VALUES ('$url','$duration','$login_id','$mon','$tue','$wed','$thu','$fri','$sat','$sun',1)";
    }
    echo $sql;
    $result = $conn->query($sql);
    $_SESSION['message'] = 'New Tab Added Successfully';
    header("location: ../index.php");
} elseif (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
    echo "Uploading img...";
    //Add file
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
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
    if ($_FILES["fileToUpload"]["size"] > 100000000) {
        // echo "Sorry, your file is too large.";
        $_SESSION['errormessage'] = 'Sorry, your file is too large!!';
        header("location: ../index.php");

        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "avi" &&
        $imageFileType != "mp4" &&
        $imageFileType != "pdf" &&
        $imageFileType != "mkv" &&
        $imageFileType != "gif"
    ) {
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
        $randname = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 12)), 0, 12);
        $finalfilename =  $target_dir . $randname . "." . $imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalfilename)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            //Convert Vieo TO MP4
            if (
                $imageFileType == "avi" ||
                $imageFileType == "mkv"
                ) {
                    $folder = '../upload/';
                    $filename = $randname . "." . $imageFileType;
                    $newFilename = pathinfo($filename, PATHINFO_FILENAME).'.mp4';
                    
                    exec('/usr/bin/ffmpeg -y -i '.$folder.DIRECTORY_SEPARATOR.$filename.' -hide_banner '.$folder.DIRECTORY_SEPARATOR.$newFilename.' 2>&1');
                    
                    if($res != 0) {
                        error_log(var_export($out, true));
                        error_log(var_export($res, true));
                        $_SESSION['errormessage'] = 'Sorry, your file was not converted to MP4!!';
                        throw new \Exception("Error!");
                        $uploadOk = 0;
                        header("location: ../index.php");
                    }else{
                    $imageFileType = "mp4";
                    $finalfilename =  $target_dir . $randname . "." . $imageFileType;
                    }
            }


            //Manage Player based on file type
            if ($imageFileType == "mp4") {
                echo $url = "http://" . gethostname() . "/autotab_3c/player/videoplayer.php?videolink=http://" . gethostname() . "/autotab_3c/upload/" . $finalfilename;
            } else
                echo $url = "http://" . gethostname() . "/autotab_3c/upload/" . $finalfilename;
            $duration = 1000 * mysqli_real_escape_string($conn, $_POST['duration']);
            $login_id = $_SESSION['login_id'];
            if ($expdate) {
                $sql = "INSERT INTO linklist (link,duration,clientid,mon,tue,wed,thu,fri,sat,sun,startdate,expdate,status)VALUES ('$url','$duration','$login_id','$mon','$tue','$wed','$thu','$fri','$sat','$sun','$startdate','$enddate',2)";
            } else {
                $sql = "INSERT INTO linklist (link,duration,clientid,mon,tue,wed,thu,fri,sat,sun,status)VALUES ('$url','$duration','$login_id','$mon','$tue','$wed','$thu','$fri','$sat','$sun',1)";
            } //echo $sql;
            $result = $conn->query($sql);
            $_SESSION['message'] = 'New Tab Added Successfully';
            header("location: ../index.php");
        } else {
            $_SESSION['errormessage'] = 'Sorry, there was an error uploading your file.!!';
            header("location: ../index.php");
            // echo "Sorry, there was an error uploading your file.";
        }
    }
}
//$_SESSION['errormessage'] = 'Oops, Something went wrong...!!';
header("location: ../index.php");
// echo "Oops, Something went wrong...!!"
// $url = mysqli_real_escape_string($conn,$_POST['url']);
