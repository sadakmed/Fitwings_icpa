<?php 

require_once '../model/connect.php';

if (isset($_POST['tech'])) {

	

 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon'],$_POST['dmon']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue'],$_POST['dtue']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed'],$_POST['dwed']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu'],$_POST['dthu']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri'],$_POST['dfri']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat'],$_POST['dsat']);
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun'],$_POST['dsun']);
    




	
}