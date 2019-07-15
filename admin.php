<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}
$clientname="Admin";
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
  .white
  {
    color:white !important;
  }
  li:hover { 
  background-color: green  !important;
}
/* file upload css */
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
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
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: "or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
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
 </style>

 
</head>
<body>

<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> -->
  <!-- Brand/logo -->
  <!-- <a class="navbar-brand" href="#">AutoTab 3C</a> -->
  
  <!-- Links -->
  <!-- <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home - <?php echo $clientname ?> </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Add Client</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav> -->
<div class="topnav">
  <a class="active" href="#home">AutoTab 3C  -  <?php echo $clientname ?></a>
  <a href="#" data-toggle="modal" data-target="#myModal">Add Client</a>
  <!-- <a href="#contact">Contact</a> -->
  <div class="topnav-right">
    <!-- <a href="#search">Search</a> -->
    <a href="logout.php">Logout</a>
  </div>
</div>



<div class="container-fluid">
  
  
<div class="container">
<br>
  <h2>Available Tabs</h2>
  <br>
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <?php
include("config/config.php");
$clientid=$_SESSION['login_id'];
$sql = "SELECT * FROM client";
$result = $conn->query($sql);
$bcount=0;
$notified=0;
if ($result->num_rows > 0) {
	
	echo "<table class='table table-striped'>
	<thead>
      <tr>
        <th>Client ID</th>
        <th>Client</th>
      
      </tr>
    </thead> <tbody>";
    while($row = $result->fetch_assoc()) {
	
  echo "  <tr>";
   echo "<td>".$row['clientid']."</td>";
   echo "<td>".$row['client']."</td>";
   echo "</tr>";
    }}
    else
    {
        echo "<p>No Links added to your AutoTab</p>";
    }

echo " </tbody>
  </table>
</div>";	
?>






</div>




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
        <button type="submit" class="btn btn-default" >Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      </div>
      </div>

</body>
</html>
