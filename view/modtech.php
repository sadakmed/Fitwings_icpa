<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (  isset($_POST['idp'])) {
	
	if (( time() - $_POST['date'] ) > 36*60*60) {
		echo  '0' ;
	}else{


	

    
    require '../model/connect.php';
    $result=array();
    $pdostmt=$pdo->prepare("update wplan set NomTech=:n , site=:s, shift=:sh where idp=:i");
    $pdostmt->bindValue( ':n',$_POST['tech']);
    $pdostmt->bindValue( ':s',$_POST['site']);
    $pdostmt->bindValue( ':sh',$_POST['shift']);
    $pdostmt->bindValue (':i',$_POST['idp']);
    
       array_push($result,$pdostmt->execute());
    
   $pdohisto=$pdo->prepare("INSERT INTO `hmod` (`idp`, `NomTech`, `shift`, `site`, `dshift`, `reason`,`dmod`) select :i,w.NomTech,w.shift,w.site,w.date,:reason ,:hmod from wplan w where w.idp=:i ");

    $pdohisto->bindValue(':i',$_POST['idp']);
    $pdohisto->bindValue(':reason',$_POST['reason']);
    $pdohisto->bindValue(':hmod',time());
    

       array_push($result,$pdohisto->execute());


   echo json_encode($result);
}  
}  
