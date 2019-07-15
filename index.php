<?php
session_start();
if (!($_SESSION['login']))
{
header('Location: login.php');
}
$clientname=$_SESSION['login_name'];
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
  <!-- <a class="navbar-brand white" href="#">AutoTab 3C</a> -->
  
  <!-- Links -->
  <!-- <ul class="navbar-nav">
    <li class="nav-item p-2">
      <a class="nav-link white" href="#">Home - <?php echo $clientname ?> </a>
    </li>
    <li class="nav-item p-2">
      <a class="nav-link white" href="#" data-toggle="modal" data-target="#myModal">Add New Tab</a>
    </li>
    <li class="nav-item p-2">
      <a class="nav-link white" href="logout.php">Logout</a>
    </li>
  </ul>
</nav> -->

<div class="topnav">
  <a class="active" href="#home">AutoTab 3C  -  <?php echo $clientname ?></a>
  <a href="#" data-toggle="modal" data-target="#myModal">Add New Tab</a>
  <a href="http://corpansimstr00/autotab_3c/autoTab.zip">Download Client</a>
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
$sql = "SELECT * FROM linklist WHERE clientid= '$clientid'";
$result = $conn->query($sql);
$bcount=0;
$notified=0;
if ($result->num_rows > 0) {
	
	echo "<table class='table table-striped'>
	<thead>
      <tr>
        <th>Link</th>
        <th>Duration</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead> <tbody>";
    while($row = $result->fetch_assoc()) {
	
  echo "  <tr>";
   echo "<td valign='center' width='65%'><a target='_blank' href='".$row['link']."'>".$row['link']."</a></td>";
   $sec = ((int)$row['duration']/1000);
   echo "<td  valign='center' width='8%'>".$sec." Sec</td>";
   $status=$row['status'];
  // echo "<td>".$row['status']=1 ? '<img src="img/green.png" width="30" height="30">' : '<img src="img/red.png" width="30" height="30">';echo"</td>";
  echo '<td  width="5%"><img src="img/'.($status ? 'green' : 'red').'.png" alt="'.($status ? 'enabled' : 'disabled').'" height="32" width="32"/></td>'; 
  echo "<td  width='20%'>";
   if ($row['status']==1){
       echo "<form action='worker/deactivate.php' method='GET'>
       <input type='hidden' name='linkid' value='".$row['linkid']."'/><button type='submit' style='width:100px' class='btn btn-warning'>Deactivate</button><a href='#' class='m-2 btn btn-info btn-md' data-toggle='modal' data-target='#myModal2'>
       <span class='glyphicon glyphicon-pencil'></span> </a><a href='worker/delurl.php?delid=".$row['linkid']."' class='m-2 btn btn-danger btn-md'>
       <span class='glyphicon glyphicon-trash'></span>
     </a></form>" ;
   }
   if ($row['status']==0){
    echo "<form action='worker/activate.php' method='GET'>
    <input type='hidden' name='linkid' value='".$row['linkid']."'/><button type='submit' style='width:100px' class='btn btn-success'>Activate</button><a href='#addBookDialog' class='m-2 btn btn-info btn-md' data-id='ISBN-001122' data-toggle='modal' data-target='#myModal2'>
    <span class='glyphicon glyphicon-pencil'></span> </a><a href='worker/delurl.php?delid=".$row['linkid']."' class='m-2 btn btn-danger btn-md'>
    <span class='glyphicon glyphicon-trash'></span>
  </a></form>";
}
      
   //echo "<button type='button' class='btn btn-primary'>Edit</button></td>";
   //echo '<a href="#" class="btn btn-info btn-lg">
     //    <span class="glyphicon glyphicon-pencil"></span> </a>';
   echo "</td></tr>";
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



<!-- Add new TAB ################-->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 <!-- Modal content-->
 <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Tab</h4>
        </div>
        <div class="modal-body">     
        <form action=worker/addurl.php method="POST" enctype="multipart/form-data">
        <label>Tab URL </label>
        <input class="form-control form-control-lg" type="text" name="url" placeholder="Enter URL">
        <h3 align="center">or</h3>
        <div class="form-group files">
                <label>Upload Your File </label>
                <input type="file" class="form-control" name="fileToUpload">
              </div>
        <br><br>
        <label>Duration </label>
        <input class="form-control form-control-lg" type="text" name="duration" placeholder="Enter Duration in seconds">
  <!-- URL:  <input type="text" name="url"> -->
  <br>
  <!-- Duration: <input type="text" name="duration"> -->
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      </div>
      </div>




<!-- Edit Duration ################## -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
 <!-- Modal content-->
 <div class="modal-content" id="addBookDialog">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Tab</h4>
        </div>
        <div class="modal-body">
        
        <form action=worker/addurl.php method="POST">
        <div class="modal-body">
        <label>Edit Duration </label>
        <input class="form-control form-control-lg" type="text" name="edittime" value=""/>
        </div>


        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      </div>
      </div>





      <!-- Modal to comfirm delete -->
      <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
 <!-- Modal content-->
 <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Tab</h4>
        </div>
        <div class="modal-body">       
        <form action=worker/addurl.php method="POST">
  URL:  <input type="text" name="url">
  <br>
  Duration: <input type="text" name="duration">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
      </div>
      </div>



      <script>
$(document).on("click", ".open-editDialog", function () {
     var myNewTime = $(this).data('id');
     $(".modal-body #edittime").val( myNewTime );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
</body>
</html>
