<?php 



function ldapConnect (){

   $ldapcon=@ldap_connect('localhost'); 
   ldap_set_option($ldapcon,LDAP_OPT_PROTOCOL_VERSION, 3);
   ldap_set_option($ldapcon,LDAP_OPT_REFERRALS, 0);
   return $ldapcon;

  }


function getTech($ldapcon){

    $dn = "OU=people,DC=tt016,DC=lan";
    $filter="(objectClass=*)";
    $justthese = array("cn");

    $sr=ldap_search($ldapcon, $dn, $filter, $justthese);

    return ldap_get_entries($ldapcon, $sr);
}

function optionTech($ldapcon){
    $tech='';
  foreach (getTech($ldapcon) as $key => $value) {
  	  if(isset($value['cn']))

  	 {   $tech.="<option value='".$value['cn'][0]."'>".$value['cn'][0]."</option>"; }
  	 
  }
  
  return $tech;
}




    $ldapdn="cn=sadak,ou=people,dc=tt016,dc=lan";
    $pass='root';
    $ldapcon=ldapconnect();

   if ($ldapcon) {

     $ldapbind=@ldap_bind($ldapcon,$ldapdn,$pass);
  if ($ldapbind) {
  $_SESSION['user']=$user;

 echo optionTech($ldapcon);
  }

 }}



 ?>