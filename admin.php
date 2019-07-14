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
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">AutoTab 3C</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
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
</nav>

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
  Client Name:  <input type="text" name="client">
  <br>
  password: <input type="password" name="password">



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
