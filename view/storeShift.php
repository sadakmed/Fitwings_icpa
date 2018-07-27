<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once '../model/connect.php';

if (isset($_POST['tech'])) {

	
if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dmon1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon1'],$_POST['dmon1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dtue1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue1'],$_POST['dtue1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dwed1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed1'],$_POST['dwed1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dthu1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu1'],$_POST['dthu1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dfri1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri1'],$_POST['dfri1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsat1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat1'],$_POST['dsat1']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsun1'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun1'],$_POST['dsun1']);






if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dmon2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon2'],$_POST['dmon2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dtue2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue2'],$_POST['dtue2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dwed2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed2'],$_POST['dwed2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dthu2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu2'],$_POST['dthu2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dfri2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri2'],$_POST['dfri2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsat2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat2'],$_POST['dsat2']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsun2'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun2'],$_POST['dsun2']);


if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dmon3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon3'],$_POST['dmon3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dtue3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue3'],$_POST['dtue3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dwed3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed3'],$_POST['dwed3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dthu3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu3'],$_POST['dthu3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dfri3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri3'],$_POST['dfri3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsat3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat3'],$_POST['dsat3']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsun3'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun3'],$_POST['dsun3']);


 if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dmon4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['mon4'],$_POST['dmon4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dtue4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['tue4'],$_POST['dtue4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dwed4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['wed4'],$_POST['dwed4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dthu4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['thu4'],$_POST['dthu4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dfri4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['fri4'],$_POST['dfri4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsat4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sat4'],$_POST['dsat4']);

if (check($pdo,$_POST['site'],$_POST['tech'],$_POST['dsun4'])==0) 
 store($pdo,$_POST['site'],$_POST['tech'],$_POST['sun4'],$_POST['dsun4']);
    





	
}