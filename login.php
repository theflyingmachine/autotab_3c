<?php
   include("config/config.php");
   session_start();
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      echo $myusername = mysqli_real_escape_string($conn,$_POST['client']);
      echo $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
	  
	  if (($myusername=="admin")&&($mypassword=="iamadmin")){
        //echo "admin page";
        $_SESSION['login']=true;
        $_SESSION['login_id']="admin";
        header("location: admin.php");
      }else{



      $sql = "SELECT clientid FROM client WHERE client = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $clientid = $row['clientid'];
	  
      
      $count = mysqli_num_rows($result); 
      // If result matched $myusername and $mypassword, table row must be 1 row
      $conn->close();
      if($count == 1) {
		
		 $_SESSION['login']=true;
		 $_SESSION['login_id']=$clientid;
		 $_SESSION['login_name']=$myusername;
		 header("location: index.php");
      }else {
         $error = "Your Username or Password is invalid. This time, it’s the human’s fault.";
      }
   }
   
  }
   
?>



<html>
<head><title>AutoTab 3C</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  body {
    padding-top: 120px;
    padding-bottom: 40px;
    background-color: #eee;
  
  }
  .btn 
  {
   outline:0;
   border:none;
   border-top:none;
   border-bottom:none;
   border-left:none;
   border-right:none;
   box-shadow:inset 2px -3px rgba(0,0,0,0.15);
  }
  .btn:focus
  {
   outline:0;
   -webkit-outline:0;
   -moz-outline:0;
  }
  .fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-image: url('http://cleancanvas.herokuapp.com/img/backgrounds/color-splash.jpg');
    background-repeat:repeat;
  }
  .form-signin {
    max-width: 280px;
    padding: 15px;
    margin: 0 auto;
      margin-top:50px;
  }
  .form-signin .form-signin-heading, .form-signin {
    margin-bottom: 10px;
  }
  .form-signin .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: none;
    border-left-style: solid;
    border-color: #000;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-top-style: none;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-color: rgb(0,0,0);
    border-top:1px solid rgba(0,0,0,0.08);
  }
  .form-signin-heading {
    color: #fff;
    text-align: center;
    text-shadow: 0 2px 2px rgba(0,0,0,0.5);
  }
</style>
<!------ Include the above in your HEAD tag ---------->
</head>

<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

	<form class="form-signin" method="post" action="">
		<h1 class="form-signin-heading text-muted">autoTab</h1>
		<h4 class="form-signin-heading text-muted">Control and Command Center</h4>
		<input type="text" class="form-control" name="client" placeholder="Client ID" required="" autofocus="">
		<input type="password" class="form-control" name="password" placeholder="Password" required="">
        <div style = "font-size:20px; color:#ff7c8e; margin-top:10px"><?php echo $error; ?></div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Sign In
		</button>
	</form>

</div>
</html>