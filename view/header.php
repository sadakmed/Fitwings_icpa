<?php 
  
  session_start();



  if (!isset($_SESSION['user'])) {

   header("location:index.php");

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

tr.th th {

  background-color: white;
  padding: 0 20px 0 0;
  border:1px solid  #e4e8ec;
  
}
 
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
    <div class="collapse navbar-collapse" style="font-size: 1.21em; font-weight: bold; margin-top: 2px;" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li><a href="home.php?page=plan">Planning</a></li>
        
 <?php 
    
  if ( @$_SESSION['role']=='admin' || @$_SESSION['role']=='root' ) 
      echo '<li><a href="home.php?page=plan_for_user">Plan The Shift</a></li>';

?>


        <li><a href="home.php?page=hist">Modific. history</a></li>
        <li><a href="home.php?page=count">Count shifts</a></li>

     </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span style="padding-right: 6px;"  class="glyphicon glyphicon-log-out"></span>LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style="padding-top: 85px;">
  
  <div class="row content">
   
  