<?php
session_start();
if (!($_SESSION['login'])) {
    header('Location: login.php');
}
$clientname = $_SESSION['login_name'];
if (($_SESSION['login_id'] == "admin"))
    header('Location: login.php');
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

        .weekDays-selector input {
            display: none !important;
        }

        .weekDays-selector input[type=checkbox]+label {
            display: inline-block;
            border-radius: 16px;
            background: #dddddd;
            height: 40px;
            width: 30px;
            /* margin-right: 3px; */

            line-height: 40px;
            /* text-align: center; */
            cursor: pointer;
            padding-right: 45px;
            padding-left: 18px;
        }

        .weekDays-selector input[type=checkbox]:checked+label {
            background: #2AD705;
            color: #ffffff;
        }

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

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 24px;
        }



        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }



        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }



        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }



        input:checked+.slider {
            background-color: #2196F3;
        }



        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }



        input:checked+.slider:before {
            -webkit-transform: translateX(16px);
            -ms-transform: translateX(16px);
            transform: translateX(16px);
        }



        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }



        .slider.round:before {
            border-radius: 50%;
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
    </style>



</head>

<body>

    <div id="content">
        <!-- Navbar ########################################################### -->
        <div class="topnav">
            <div class="navbrand">
                <a class="active" href="./"> <strong class="intro">AutoTab</strong><sub>(Beta)</sub><br>
                    <div class="poweredby">POWERED BY CYBERBOY.IN</div>
                </a>
            </div>
            <div class="navnav">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Tab</a>
                <a href="index.php"><i class="fa fa-television" aria-hidden="true"></i> Tabs</a>
                <a href="http://<?php echo gethostname() ?>/autotab_3c/autoTab.zip"><i class="fa fa-download" aria-hidden="true"></i> Download Client</a>
                <a href="#" data-toggle="modal" data-target="#mypassModal"><i class="fa fa-cogs" aria-hidden="true"></i> Change Password</a>
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
                include("config/config.php");
                $clientid = $_SESSION['login_id'];
                // Count total loop duration;
                $sql = "SELECT SUM(duration) FROM linklist WHERE clientid=$clientid AND status=1";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                ?>

                <h2><strong>Devices </strong> <span style="float:right;">
                        <?php echo "Loop Duration: " . $totaldutaion = ($row['SUM(duration)'] / 1000) . " Sec"; ?>
                    </span></h2>
                <!-- <p align="right">KEY: 9df3b01c60df20d13843841ff0d4482c</p> -->
                <br>
                <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
                <?php





                $totaldutaion = (int) $totaldutaion + 120;
                //Show online devices
                $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen >= NOW() - INTERVAL $totaldutaion SECOND";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    echo "<h3>Online Devices:  " . $result->num_rows . "</h3>";
                    while ($row = $result->fetch_assoc()) {

                        echo '<span class="fa-stack fa-3x" style="color:green">
            <i class="fa fa-television fa-stack-2x"></i>
              <span class="fa fa-stack-1x" style="color:green;">
                  <span style="font-size:15px; margin-top:-12px; display:block;">
                  ' . $row['devicename'] . '
                  </span>
            </span>
        </span>	&nbsp;&nbsp;';
                        $totalonline++;
                    }
                } else {
                    echo "<p>No Device online at this point of time.</p>";
                }

                //Show Offline devices
                $sql = "SELECT * FROM devices WHERE clientid=$clientid AND lastseen <= NOW() - INTERVAL $totaldutaion SECOND";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    echo "<br><br><br><h3>Offline Devices: " . $result->num_rows . "</h3>";
                    while ($row = $result->fetch_assoc()) {

                        echo '<span class="fa-stack fa-3x" style="color:orange" >
            <i class="fa fa-television fa-stack-2x"></i>
              <span class="fa fa-stack-1x" style="color:orange;">
                  <span style="font-size:15px; margin-top:-12px; display:block;">
                  ' . $row['devicename'] . '
                  </span>
            </span>
        </span>	&nbsp;&nbsp;';
                        $totaloffline++;
                    }
                }





                ?><br><br>

                <?php
                $totaldevices = $totalonline + $totaloffline;
                $onlinepercentage = $totalonline / $totaldevices * 100;
                $offlinepercentage = $totaloffline / $totaldevices * 100;

                ?>
                <br>
                <hr>
                <H2> <strong>Statistics </strong></h2>
                <br>
                <h3>Online: <?php echo   $totalonline ?>
                    <div class="w3-light-grey w3-xlarge">
                        <div class="w3-container w3-xlarge w3-green w3-center" style="height:30px;width:<?php echo $onlinepercentage ?>%"><?php echo round($onlinepercentage) . "%" ?></div>
                    </div><br>
                    <br>Offline: <?php echo $totaloffline ?>
                    <div class="w3-light-grey w3-xlarge">
                        <div class="w3-container w3-xlarge w3-red w3-center" style="height:30px;width:<?php echo $offlinepercentage ?>%"><?php echo round($offlinepercentage) . "%" ?></div>
                    </div><br>


                    <!-- Get Licence Key -->
                    <?php
                    $sql = "SELECT licencekey FROM client WHERE clientid= '$clientid'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $clientkey = $row['licencekey'];
                    ?>

            </div>



            <!-- Add new TAB #####################################################################-->

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title">Add New Tab</h4>
                        </div>
                        <div class="modal-body">
                            <div id="loading" style="display:none"><br>
                                <img style='height: 100%; width: 100%; object-fit: contain' class="center" src="https://cdn.dribbble.com/users/119313/screenshots/1675522/machine1_2.gif" />
                                <br><br><br>
                                <h4 align="center">Please wait while we upload and process your file...</h4><br>
                            </div>
                            <div id="addnewform">
                                <form action=worker/addurl.php method="POST" enctype="multipart/form-data" onsubmit="$('#loading').show(); $('#addnewform').hide();">
                                    <label>Tab Name </label>
                                    <input class="form-control form-control-lg" type="text" name="tabname" required placeholder="Enter Tab Name">
                                    <br>
                                    <label>Tab URL </label>
                                    <input class="form-control form-control-lg" type="text" name="url" placeholder="Enter URL">
                                    <h3 align="center">or</h3>
                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" class="form-control" name="fileToUpload">
                                    </div>
                                    <label>Week Days </label>
                                    <div class="weekDays-selector">
                                        <input type="checkbox" id="weekday-mon" name="mon" class="weekday" value="1" checked />
                                        <label for="weekday-mon">Mon</label>
                                        <input type="checkbox" id="weekday-tue" name="tue" class="weekday" value="1" checked />
                                        <label for="weekday-tue">Tue</label>
                                        <input type="checkbox" id="weekday-wed" name="wed" class="weekday" value="1" checked />
                                        <label for="weekday-wed">Wed</label>
                                        <input type="checkbox" id="weekday-thu" name="thu" class="weekday" value="1" checked />
                                        <label for="weekday-thu">Thu</label>
                                        <input type="checkbox" id="weekday-fri" name="fri" class="weekday" value="1" checked />
                                        <label for="weekday-fri">Fri</label>
                                        <input type="checkbox" id="weekday-sat" name="sat" class="weekday" value="1" checked />
                                        <label for="weekday-sat">Sat</label>
                                        <input type="checkbox" id="weekday-sun" name="sun" class="weekday" value="1" checked />
                                        <label for="weekday-sun">Sun</label>
                                    </div><br>
                                    <label>Date and Time Range </label>
                                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="xs"> -->
                                    <label class="switch">
                                        <input type="checkbox" name="expdate" id="myCheck" onclick="myFunction()" value="true">
                                        <span class="slider round"></span>
                                    </label>
                                    <input style="display:none" class="form-control form-control-lg" id="rangepicker" type="text" name="datetimes" />

                                    <script>
                                        function myFunction() {
                                            var checkBox = document.getElementById("myCheck");
                                            var div = document.getElementById("rangepicker");
                                            if (checkBox.checked == true) {
                                                div.style.display = "block";
                                            } else {
                                                div.style.display = "none";
                                            }
                                        }
                                    </script>
                                    <script>
                                        $(function() {
                                            $('input[name="datetimes"]').daterangepicker({
                                                timePicker: true,
                                                startDate: moment().startOf('minute'),
                                                minDate: moment().startOf('minute').add(2, 'minute'),
                                                endDate: moment().startOf('hour').add(32, 'hour'),
                                                orientation: "auto",
                                                opens: "center",
                                                drops: "up",
                                                locale: {
                                                    format: 'DD/MM/YYYY hh:mm A'
                                                }
                                            });
                                        });
                                    </script><br>
                                    <label>Duration </label>
                                    <input class="form-control form-control-lg" type="text" name="duration" placeholder="Enter Duration in seconds">
                                    <!-- URL:  <input type="text" name="url"> -->
                                    <br>
                                    <!-- Duration: <input type="text" name="duration"> -->

                                    <button type="submit" class="btn btn-default">Add</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Edit Duration #####################################################################-->

            <div class="modal" id="my_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                            <h4 class="modal-title">Edit Tab Duration</h4>
                        </div>
                        <div class="modal-body">
                            <form action=worker/edittab.php method="POST">
                                <label>Tab </label>
                                <input class="form-control form-control-lg" type="text" name="elink" placeholder="Enter Duration in Seconds" value="" />
                                <br>
                                <label>Week Days </label>
                                <div class="weekDays-selector">
                                    <input type="checkbox" id="weekdaye-mon" name="mon" class="weekday" value="1" />
                                    <label for="weekdaye-mon">Mon</label>
                                    <input type="checkbox" id="weekdaye-tue" name="tue" class="weekday" value="1" />
                                    <label for="weekdaye-tue">Tue</label>
                                    <input type="checkbox" id="weekdaye-wed" name="wed" class="weekday" value="1" />
                                    <label for="weekdaye-wed">Wed</label>
                                    <input type="checkbox" id="weekdaye-thu" name="thu" class="weekday" value="1" />
                                    <label for="weekdaye-thu">Thu</label>
                                    <input type="checkbox" id="weekdaye-fri" name="fri" class="weekday" value="1" />
                                    <label for="weekdaye-fri">Fri</label>
                                    <input type="checkbox" id="weekdaye-sat" name="sat" class="weekday" value="1" />
                                    <label for="weekdaye-sat">Sat</label>
                                    <input type="checkbox" id="weekdaye-sun" name="sun" class="weekday" value="1" />
                                    <label for="weekdaye-sun">Sun</label>
                                </div><br>
                                <label>Duration </label>
                                <input class="form-control form-control-lg" type="text" name="editduration" placeholder="Enter Duration in Seconds" value="" />
                                <input class="form-control form-control-lg" type="hidden" name="editlink" placeholder="Enter Duration in Seconds" value="" />

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Change Password Modal #####################################################################-->

            <div class="modal fade" id="mypassModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title">Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <form action=worker/changepass.php method="POST" enctype="multipart/form-data">
                                <label>Enter New Password </label>
                                <input autofocus class="form-control form-control-lg" type="password" name="pass1" placeholder="Enter New Password">
                                <br>
                                <label>Repeat New Password </label>
                                <input class="form-control form-control-lg" type="password" name="pass2" placeholder="Confirm New Password">
                                <!-- URL:  <input type="text" name="url"> -->
                                <br>
                                <!-- Duration: <input type="text" name="duration"> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Change Password</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- About Modal #####################################################################-->

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
                                    AutoTab is a platform for creating, managing and deploying digital content in a reliable and user-friendly dashboard that gives users total control over how and where content is played across a network of screens.
                                    <br><br>
                                    <strong>Version: 2.0.15</strong>
                                    <?php echo "<h3>" . $clientname . "</h3>" ?>
                                    <?php echo "License Key:<strong> " . $clientkey . "</strong>" ?>

                                    <br><br>
                                    <i>Feedback and bug reporting: <a href="mailto:ericabraham.ea@gmail.com">ericabraham.ea@gmail.com</a> <i>
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




            <!-- Modal to comfirm delete #####################################################################-->
            <div class="modal" id="my_modal_del">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                            <h4 class="modal-title">Delete Tab</h4>
                        </div>
                        <div class="modal-body">
                            <form action=worker/delurl.php method="POST">
                                <label>Are you sure to Delete? </label>
                                <input class="form-control form-control-lg" disabled type="text" name="deleteurl" placeholder="Enter Duration in Seconds" value="" />
                                <input class="form-control form-control-lg" type="hidden" name="deleteurlid" placeholder="Enter Duration in Seconds" value="" />

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





            <!-- Javascriot to fill modal data #####################################################################-->
            <script>
                $('#my_modal').on('show.bs.modal', function(e) {
                    var editduration = $(e.relatedTarget).data('book-id');
                    $(e.currentTarget).find('input[name="editduration"]').val(editduration);
                    var editlink = $(e.relatedTarget).data('book-id1');
                    $(e.currentTarget).find('input[name="editlink"]').val(editlink);
                    var elink = $(e.relatedTarget).data('book-id2');
                    $(e.currentTarget).find('input[name="elink"]').val(elink);

                    var mon = $(e.relatedTarget).data('mon');
                    document.getElementById("weekdaye-mon").checked = mon === 1;
                    var tue = $(e.relatedTarget).data('tue');
                    document.getElementById("weekdaye-tue").checked = tue === 1;
                    var wed = $(e.relatedTarget).data('wed');
                    document.getElementById("weekdaye-wed").checked = wed === 1;
                    var thu = $(e.relatedTarget).data('thu');
                    document.getElementById("weekdaye-thu").checked = thu === 1;
                    var fri = $(e.relatedTarget).data('fri');
                    document.getElementById("weekdaye-fri").checked = fri === 1;
                    var sat = $(e.relatedTarget).data('sat');
                    document.getElementById("weekdaye-sat").checked = sat === 1;
                    var sun = $(e.relatedTarget).data('sun');
                    document.getElementById("weekdaye-sun").checked = sun === 1;


                });

                $('#my_modal_del').on('show.bs.modal', function(e) {
                    var deleteurl = $(e.relatedTarget).data('deleteurl');
                    $(e.currentTarget).find('input[name="deleteurl"]').val(deleteurl);
                    var deleteurlid = $(e.relatedTarget).data('deleteurlid');
                    $(e.currentTarget).find('input[name="deleteurlid"]').val(deleteurlid);
                });

                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>

            <br><br>
            <!-- Footer #####################################################################-->
            <footer id="footer" class="fixed-bottom text-white-50">
                <!-- <footer id="footer" class="bg-dark text-white-50"> -->
                <small>2019 &nbsp;&copy;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</small> AutoTab &nbsp;<sub>(Beta)</sub> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;POWERED BY CYBERBOY.IN
            </footer>
        </div>
    </div>
</body>

</html>