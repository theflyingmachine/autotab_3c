<?php
session_start();
if (!($_SESSION['login_id'] == "admin")) {
    header('Location: login.php');
}
$clientname = "Admin";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AutoTab 3C</title>
    <link rel="icon" href="img/favicon.ico" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="asset/w3.css">


    <style>
        .white {
            color: white !important;
        }

        li:hover {
            background-color: green !important;
        }

        /* file upload css */
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 80px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }

        .files input:focus {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            border: 1px solid #92b0b3;
        }

        .files {
            position: relative
        }

        .files:after {
            pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .color input {
            background-color: #f1f1f1;
        }

        .files:before {
            position: absolute;
            bottom: 1px;
            left: 0;
            pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: "or drag it here. ";
            display: block;
            margin: 5 auto;
            color: #2ea591;
            font-weight: 700;
            text-transform: capitalize;
            text-align: center;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            /* background-color: #333;4CAF50 */
            background-color: #4CAF50;
            width: 100%;
            height: 90px;
            min-height: 80px;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
        }

        .navnav a {
            font-size: 20px;
            padding-top: 28.5px;
            padding-bottom: 100%;
            padding-left: 25px;
            padding-right: 25px;
        }

        .navbrand a {
            font-size: 17px;
            padding-left: 35px;
            padding-right: 40px;
            padding-top: 5px;

        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        .topnav-right {
            float: right;
        }

        html,
        body {
            height: 100%;
        }

        #page-content {
            flex: 1 0 auto;
        }

        #sticky-footer {
            flex-shrink: none;
            width: 100%;
        }

        /* Other Classes for Page Styling */

        /* body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
} */



        .success {
            background-color: #4CAF50;
        }

        /* Green */
        .info {
            background-color: #2196F3;
        }

        /* Blue */
        .warning {
            background-color: #ff9800;
        }

        /* Orange */
        .danger {
            background-color: #f44336;
        }

        /* Red */
        .other {
            background-color: #e7e7e7;
            color: black;
        }

        /* Gray */
        #footer {
            height: 50px;
            /* Height of the footer */
            /* background: #6cf; */
            background: #2196F3;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        @font-face {
            font-family: fontastique;
            src: url(img/fontastique.ttf);
        }

        .intro {
            font-family: fontastique;
            font-size: 40px;
        }

        .poweredby {
            font-size: 15px;
        }

        hr {
            border-top: 3px dashed #2196F3;
        }

        hr.statsblue {
            border-top: 3px dashed #2196F3;
        }
    </style>



</head>

<body>

    <div id="content">
        <!-- Navbar ########################################################### -->
        <div class="topnav">
            <div class="navbrand">
                <a class="active" href="#home"> <strong class="intro">AutoTab</strong><sub>(Beta)</sub><br>
                    <div class="poweredby">POWERED BY CYBERBOY.IN</div>
                </a>
            </div>
            <div class="navnav">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Client</a>
                <a href="admin.php"><i class="fa fa-television" aria-hidden="true"></i> View All Clients</a>
                <a href="../autotab_3c/autoTab.zip"><i class="fa fa-download" aria-hidden="true"></i> Download Client</a>
                <a href="#" data-toggle="modal" data-target="#myaboutModal"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
                <!-- <a href="#contact">Contact</a> -->
                <div class="topnav-right">
                    <!-- <a href="#search">Search</a> -->
                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout - <?php echo $clientname ?></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- FLASH MESSAGE ########################################################### -->
            <?php
            if (isset($_SESSION['message'])) {
                echo '<br><div class="alert alert-info alert-dismissible">
    <strong></strong>' . $_SESSION["message"] . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
                unset($_SESSION['message']);
            }
            if (isset($_SESSION['errormessage'])) {
                echo '<br><div class="alert alert-danger alert-dismissible">
      <strong></strong>' . $_SESSION["errormessage"] . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> 
    </div>';
                unset($_SESSION['errormessage']);
            } ?>


            <!-- Table ########################################################### -->
            <div class="container">
                <br>



                <?php
                $totalonline = 0;
                $totaloffline = 0;
                $totalplaydutaion = 0;
                include("config/config.php");

                // Minified query to get the stats

                $sql = "SELECT * FROM client WHERE status = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                    while ($row = $result->fetch_assoc()) {
                        $clientid = $row['clientid'];
                        $sql = "SELECT SUM(duration) FROM linklist WHERE clientid=$clientid AND status=1";
                        $result1 = $conn->query($sql);
                        $row1 = $result1->fetch_assoc();
                        $totaldutaion = ($row1['SUM(duration)'] / 1000);
                        $totalplaydutaion += $totaldutaion;
                        $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen >= NOW() - INTERVAL $totaldutaion SECOND";
                        $result2 = $conn->query($sql);
                        if ($result2->num_rows > 0)
                            while ($row2 = $result2->fetch_assoc()) {
                                $totalonline++;
                            }
                        $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen <= NOW() - INTERVAL $totaldutaion SECOND";
                        $result3 = $conn->query($sql);
                        if ($result3->num_rows > 0)
                            while ($row3 = $result3->fetch_assoc()) {
                                $totaloffline++;
                            }
                    }
                ?>
                <H2> <strong>Statistics </strong></h2>
                <?php
                $totaldevices = $totalonline + $totaloffline;
                $onlinepercentage = $totalonline / $totaldevices * 100;
                $offlinepercentage = $totaloffline / $totaldevices * 100;

                ?>
                <h3>Online: <?php echo   $totalonline ?>
                    <div class="w3-light-grey w3-xlarge">
                        <div class="w3-container w3-xlarge w3-green w3-center" style="height:30px;width:<?php echo $onlinepercentage ?>%"><?php echo round($onlinepercentage) . "%" ?></div>
                    </div><br>
                    <br>Offline: <?php echo $totaloffline ?>
                    <div class="w3-light-grey w3-xlarge">
                        <div class="w3-container w3-xlarge w3-red w3-center" style="height:30px;width:<?php echo $offlinepercentage ?>%"><?php echo round($offlinepercentage) . "%" ?></div>
                    </div><br>
                    <?php
                    $ds = disk_total_space("/var/www/html/");
                    $df = disk_free_space("/var/www/html/");
                    $ud = $ds - $df;
                    $diskperusage = $ud / $ds * 100;
                    ?>
                    <br>Disk Usage: <?php echo round(($ud/1024)/1024) ."mb / ".round(($ds/1024)/1024). "mb" ?>
                    <div class="w3-light-grey w3-xlarge">
                        <div class="w3-container w3-xlarge w3-blue w3-center" style="height:30px;width:<?php echo $diskperusage ?>%"><?php echo round($diskperusage) . "%" ?></div>
                    </div><br>
                    <br><strong>
                        <div align="center">Total Devices: <?php echo  $totaldevices ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Total Clients: <?php echo  $result->num_rows ?>
                            <?php
                            $sql = "SELECT * FROM linklist WHERE status=1";
                            $result4 = $conn->query($sql);
                            ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Total Active Tabs: <?php echo  $result4->num_rows ?>


                            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Total Duration: <?php echo  $totalplaydutaion . " Sec" ?>
                        </div>
                    </strong>
                </h3>
                <br><br>
                <hr class=statsblue>










                <?php

                //Select ALL Clients 
                $sql = "SELECT * FROM client WHERE status = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                    while ($row = $result->fetch_assoc()) {




                        // Count total loop duration;
                        $clientid = $row['clientid'];
                        $sql = "SELECT SUM(duration) FROM linklist WHERE clientid=$clientid AND status=1";
                        $result1 = $conn->query($sql);
                        $row1 = $result1->fetch_assoc();

                        ?>
                    <h2> <?php echo $row['client'] ?> <span style="float:right;">
                            <?php echo "Loop Duration: " . $totaldutaion = ($row1['SUM(duration)'] / 1000) . " Sec"; ?>
                        </span></h2>
                    <!-- <p align="right">KEY: 9df3b01c60df20d13843841ff0d4482c</p> -->

                    <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
                <?php





                    $totaldutaion = (int) $totaldutaion + 120;
                    //Show online devices
                    $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen >= NOW() - INTERVAL $totaldutaion SECOND";
                    $result2 = $conn->query($sql);
                    if ($result2->num_rows > 0) {

                        echo "<h4>Online Devices: " . $result2->num_rows . "</h4>";
                        while ($row2 = $result2->fetch_assoc()) {

                            echo '<span class="fa-stack fa-3x" style="color:#00FF00">
            <i class="fa fa-television fa-stack-1x"></i>
              <span class="fa fa-stack-1x" style="color:green;">
                  <span style="font-size:15px; margin-top:30px; display:block;">
                  ' . $row2['devicename'] . '
                  </span>
            </span>
        </span>';
                            $totalonline++;
                        }
                    } else {
                        echo "<p>No Active Device Connected to " . $row['client'] . ".</p>";
                    }

                    //Show Offline devices
                    $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen <= NOW() - INTERVAL $totaldutaion SECOND";
                    $result3 = $conn->query($sql);
                    if ($result3->num_rows > 0) {

                        echo "<br><h4>Offline Devices: " . $result3->num_rows . "</h4>";
                        while ($row3 = $result3->fetch_assoc()) {
                            echo '<span class="fa-stack fa-3x" style="color:orange">
            <i class="fa fa-television fa-stack-1x"></i>
              <span class="fa fa-stack-1x" style="color:orange;">
                  <span style="font-size:15px; margin-top:30px; display:block;">
                  ' . $row3['devicename'] . '
                  </span>
            </span>
        </span>';
                            $totaloffline++;
                        }
                    }
                    echo "<hr>";
                }






            ?><br><br>

                <!-- Add new Client Modal ########################## -->
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Client</h4>
                            </div>
                            <div class="modal-body">

                                <form action=worker/addclient.php method="POST">
                                    <label>Client</label>
                                    <input class="form-control form-control-lg" type="text" name="client" placeholder="Enter Client Name">
                                    <br>
                                    <label>Password </label>
                                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Add</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- About Modal ########################## -->
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

                <div class="modal fade" id="myaboutModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">About</h4>
                            </div>
                            <div class="modal-body">
                                <form action=worker/changepass.php method="POST" enctype="multipart/form-data">
                                    <div style="text-align: center">
                                        <img src="img/autoTabback.png" alt="AutoTab Logo" width="80" height="80">
                                    </div>
                                    <div style="text-align: center">
                                        <br>
                                        <H2>AutoTab 3c</H2>
                                        AutoTab is a platform for creating, managing and deploying digital content in a reliable and user-friendly dashboard that gives users total control over how and where content is played across a network of screens, ensuring relevance to current audiences.
                                        <br>
                                        Version: 2.0.10
                                        <br>

                                    </div>
                                    <br>
                                    <!-- Duration: <input type="text" name="duration"> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal to comfirm delete -->
                <div class="modal" id="my_modal_del">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Delete Tab</h4>
                            </div>
                            <div class="modal-body">
                                <form action=worker/delclient.php method="POST">
                                    <label>Are you sure to Delete? </label>
                                    <input class="form-control form-control-lg" type="hidden" name="deleteid" placeholder="Enter Duration in Seconds" value="" />
                                    <input class="form-control form-control-lg" disabled type="text" name="deletename" placeholder="Enter Duration in Seconds" value="" />

                                    <!-- <input type="text" name="editduration" value=""/> -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    $('#my_modal_del').on('show.bs.modal', function(e) {
                        var deleteid = $(e.relatedTarget).data('deleteid');
                        $(e.currentTarget).find('input[name="deleteid"]').val(deleteid);
                        var deletename = $(e.relatedTarget).data('deletename');
                        $(e.currentTarget).find('input[name="deletename"]').val(deletename);
                    });
                </script>



                <!-- Footer #####################################################################-->
                <footer id="footer" class="fixed-bottom text-white-50">
                    <!-- <footer id="footer" class="bg-dark text-white-50"> -->
                    <small>2019 &nbsp;&copy;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</small> AutoTab &nbsp;<sub>(Beta)</sub> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;POWERED BY CYBERBOY.IN
                </footer>
            </div>
        </div>
</body>

</html>