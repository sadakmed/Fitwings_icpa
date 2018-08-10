
<?php
session_start();
 if (isset($_SESSION['user']) ) {
  echo "<script>window.location.href = 'home.php?page=plan';</script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sicpa Planning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">




<!------------------------------------------------------------------------------------------->








        <link rel="stylesheet" href="./assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="./assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
        <link href="./assets/plugins/jquery-ui-1.12.1/jquery-ui.theme.min.css" rel="stylesheet">
        
    <script type="text/javascript" src="./assets/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/fonctions.js"></script>
  





<!------------------------------------------------------------------------------------------->












 <link rel="icon" type="image/vnd.microsoft.icon" sizes="48x48" href="img/index.ico">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!--<link rel="stylesheet" href="bootstrap/bootstrap.min.css">-->
  <link rel="stylesheet" href="bootstrap/soplanning.css">
  <link rel="stylesheet" href="bootstrap/styles.css">
  <link rel="stylesheet" href="bootstrap/mystyle.css">
  
  <script src="jquery/jquery.min.js"></script>
 
  <style>


 
</style>

  </style>
  
</head>
<body>

<nav class="navbar navbar-inverse" style="max-height: 60px;" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="padding: 15px 0 15px 15px ;" href="home.php?page=plan"><img src="img/Sicpa1.png" style="margin-top: -25px ; margin-left:-16px ; width: 73px;"></a>
    </div>
   
  </div>
</nav>


  
 
   
  














<?php 


include 'model/connect_ldap.php';



 ?>





     <div class="container" style="padding-top:100px">
     	
   <section class="col-md-8 col-md-offset-2">
 
 <div class="panel panel-primary">
    <div class="panel-heading">
    	<div class="panel-title"> 
      <p style="text-align: center; font-weight:12px;">Please Enter your Credentials to Login</p>
    	 </div>
    </div>	
    <div class="panel-body">
    	
    		<form class="form" action="index.php" method="post" >
  <div class="form-group"> 
  <label for="username">Username:</label>
	<input type="text" name="username" placeholder="Username" id="pwd" class="form-control">
  </div>
 <div class="form-group">
 	<label for="pwd">Password:</label>
  <input type="password" name="pwd" id="pwd" placeholder="Password"  class="form-control">

 </div>
<div id="noaccess" style="display:none ; padding: 10px;" class="alert alert-danger">
  <strong>Sorry!</strong> There's no records yet 
</div> 
   <div class="form-group">

        <input type="submit" 	 class="btn btn-success" name="submitBtn" value="Login">

    </div>
      
   	</form>
    </div>

 </div>  

   


   </section>

     </div>

