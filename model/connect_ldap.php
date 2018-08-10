<?php  
require 'view/function.php';

 if (isset($_POST['submitBtn'])) {
 $user=htmlspecialchars(trim($_POST['username']));
 $ldapdn="cn=$user,ou=people,dc=tt016,dc=lan";
// $ldapdn="uniqueMember=$user,cn=satsadmins,ou=OtherGroups,dc=dms,dc=tt016,dc=lan";

 $ldapwd=htmlspecialchars(trim($_POST['pwd'])); ;

  $ldapcon=ldapconnect();

   if ( $ldapcon) {

$ldapbind=@ldap_bind($ldapcon,$ldapdn,$ldapwd);
  if ($ldapbind) {
  $_SESSION['user']=$user;

if ($user=='sadak') {
  $_SESSION['role']='root';
	# code...
}elseif ($user=='naciri') {
	
  $_SESSION['role']='admin';
}else

  $_SESSION['role']='guest';





 echo "<script type='text/javascript'>
          location.href = 'home.php?page=plan';</script>";

  }else{
echo "<script type='text/javascript'>alert('password or username are not correct');</script>";

 }}} ?>
