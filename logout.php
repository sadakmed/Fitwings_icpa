<?php 

session_start();

unset($_SESSION);

$_SESSION['user']=null;
$_SESSION['role']=null;

unset($_SESSION['user']);
unset($_SESSION['role']);
session_destroy();

header("location:index.php");

?>