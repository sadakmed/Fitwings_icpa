<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once '../model/connect.php';

if (isset($_POST['tech'])) {

	
if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dmon'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon'],$_POST['dmon']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dtue'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue'],$_POST['dtue']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dwed'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed'],$_POST['dwed']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dthu'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu'],$_POST['dthu']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dfri'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri'],$_POST['dfri']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsat'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat'],$_POST['dsat']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsun'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun'],$_POST['dsun']);
    





	
}