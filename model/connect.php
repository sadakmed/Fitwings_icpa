<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$host='localhost';
$dbname='plan';
$user='root';
$pass='root';

$pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);



function store($pdo,$site,$tech,$shift,$date)
  { 
  	if ($shift!='----') {

  		try {
  			
          $pdostmt=$pdo->prepare('INSERT INTO `wplan`(`NomTech`, `shift`, `site`, `date`) VALUES (:nom,:shift,:site,:dat)');

    $pdostmt->bindValue(':nom',$tech);
    $pdostmt->bindValue(':shift',$shift);
    $pdostmt->bindValue(':site',$site);
    $pdostmt->bindValue(':dat',strtotime($date));
    
    $pdostmt->execute();
  		} catch (Exception $e) {
                 echo $e;  			
  		}
  		# code...
  	}

  }


  function check($pdo,$site,$tech,$date)

  {  
  	try {
      $pdostmt=$pdo->prepare("SELECT * FROM `wplan` WHERE `NomTech`='".$tech."' and `site`='".$site."' and `date`=:dat ");
   
   
      $pdostmt->bindValue(':dat',strtotime($date));
      $pdostmt->execute();
      echo $pdostmt->rowCount();
       return $pdostmt->rowCount();
  		
  	} catch (Exception $e) {
  		echo $e;
  		
  	}
  }
  