<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (  isset($_POST['idp'])) {
	
	if (((time() - $_POST['date'] ) > 36*60*60 && $_SESSION['role']!='root') || $_SESSION['role']=='guest' ) {
		echo  '0' ;
	}else{


	

    
    require '../model/connect.php';
    $result=array();


    $pdohisto=$pdo->prepare("INSERT INTO `hmod` (`idp`,`NomTech`,`shift`,`site`,`dshift`,`reason`,`dmod`) select w.idp,w.NomTech,w.shift,w.site,w.date,:reason ,:hmod from wplan w where w.idp=:i ");

    $pdohisto->bindValue(':reason',$_POST['reason']);
    $pdohisto->bindValue(':hmod',time());
    $pdohisto->bindValue(':i',$_POST['idp']);
    

       array_push($result,$pdohisto->execute());
  


    $pdostmt=$pdo->prepare("update wplan set NomTech=:n , site=:s, shift=:sh where idp=:i");
    $pdostmt->bindValue( ':n',$_POST['tech']);
    $pdostmt->bindValue( ':s',$_POST['site']);
    $pdostmt->bindValue( ':sh',$_POST['shift']);
    $pdostmt->bindValue (':i',$_POST['idp']);
    
       array_push($result,$pdostmt->execute());
    
  

   echo json_encode($result);
}  
}  
