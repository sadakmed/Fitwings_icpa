<?php 

@session_start();


 
 
 function h_many_M($from ,$to){
     
     $m_from=date('m',$from);
     $m_to=date('m',$to);
     $y_from=(int)date('y',$from);
     $y_to=(int)date('y',$to);

           if ($m_from==$m_to && $y_from==$y_to) {
          return array($m_from);
      }elseif ($m_from==$m_to && $y_from!=$y_to) {
          return array_merge(range($m_from,12),range(1,$m_to));              
      } elseif ($m_from!=$m_to && $y_from==$y_to) {
          return range($m_from,$m_to,1);
      }elseif ($m_from!=$m_to && $y_from!=$y_to ) {
          return array_merge(range($m_from,12),range(1,$m_to));
        
      } 



 }

 function weektotime($week,$year){

 	
 	$time=mktime(0,0,0,1,1,$year);
 	return $time+(($week-1)*7*24*60*60);
 }


 function h_many_W($from , $to)
{
     $w_from=date('W',$from);
     $w_to=date('W',$to);
     $y_from=(int)date('y',$from);
     $y_to=(int)date('y',$to);

      
      if ($w_from==$w_to && $y_from==$y_to) {

        
          return array($w_from);
      
      
      }elseif ($w_from==$w_to && $y_from!=$y_to) {
      
      
          return array_merge(range($w_from,52),range(1,$w_to));              
      
      
      } elseif ($w_from!=$w_to && $y_from==$y_to) {
      
      
          return range($w_from,$w_to,1);
      
      
      }elseif ($w_from!=$w_to && $y_from!=$y_to ) {
      

          return array_merge(range($w_from,52),range(1,$w_to));

} }


 function weekto_($from,$to){

         $range=h_many_W($from,$to);   
       return array_map(function($in){ $t=date('M',weektotime($in,date('Y'))); return $in.'/'.$t ;},$range);

 }



  function orga($tech,$result){
       foreach ($tech as $k => $val) {
            $tmp2=array();
           foreach ($result as $key => $value) {
            $tmp1=array();

              if ($val[1]==$value['NomTech'] && $val[2]==$value['site']) {
                   array_push($tmp1, $value['shift']);
                   array_push($tmp1, $value['date']);
                   array_push($tmp1, $value['idP']);
                   array_push($tmp2, $tmp1);
              }
           }
                   array_push($tech[$k],$tmp2 );
       }
          return $tech;
     }

          function uni_tech(array $tech){
               $tmp=array();
               array_push($tmp,$tech[0]);
               foreach ($tech as  $value) {
                   foreach ($tmp as $val)  {
                      $i=0;
                
              
                      if ($val[1]!=$value[1] || $val[2]!=$value[2]) 
                 {
                       $i++;

                 }
                      
                   }
                    
                    
                   if ($i!=0) {
                     
                     array_push($tmp,$value);
                   }
                 
               }
               //var_dump($tmp);
               return $tmp;
          }


         function tech_site(array $result){
          $tech=array();
          $tmp=array();
        foreach ($result as $i => $value) {
               
              $tmp[1]=$value['NomTech'];
              $tmp[2]=$value['site'];
              $tech[$i]=$tmp;
              $tmp=array();
         }
            
            return $tech;

         }

 // section of creators function month, week,day's name, day and shift 

         function monthCreator($from,$to){

$month='';
foreach (h_many_M($from,$to) as $i) {

$d   = DateTime::createFromFormat('!m', $i);
$m = $d->format('F').' '.$i;

 $month.='   
<th class="planning_head_month" colspan="28">'.$m.'</th>
  ';
}
echo $month;
}

function weekCreator($from,$to){

  $week='<th rowspan="3"  colspan="4" ></th> ';

 foreach (weekto_($from,$to) as $k) {
    $week.='<th class="planning_head_week"  colspan="7">W '.$k.'</th>';
 }
   echo $week;
  }


function dasnameCreator($time_range){

  $dasname='';
  foreach ($time_range as $val) {
      $dn=date('l',$val);

    if ($dn[0]=='S') {
        $dasname .= '<th class="planning_head_dayname weekend"><div>'.$dn[0].'</div></th>';

    }else{
  $dasname.='<th class="planning_head_dayname week"><div>'.$dn[0].'</div></th>';
    }
      
    }
      
      echo $dasname;



  }

  function dayCreator($time_range){
  
$day='';


  foreach ($time_range as $val) {
      $dn=date('d',$val);
      $dnm=date('l',$val);

    if ($dnm[0]=='S') {
     $day .= '<th class="planning_head_day weekend"><div>'.$dn.'</div></th>';

    }else{
   $day .= '<th class="planning_head_day week"><div>'.$dn.'</div></th>';
      }
    }
    
    echo $day;

 }


 function siteCreator($sites,$value){


              foreach ($sites as  $site) {
                if ($site['idsite']==$value[2]) {
             
 echo '<tr class="th"> <th >'.$site['region'].'</th>
  <th >'.$site['ville'].'</th><th >'.$site['name'].'</th>';
                }
                
              }
 }

   function shiftCreatorRoot($value,$time_range){

            foreach  ($time_range as $key => $val){
              $i=0 ;
              $tmp=array();
                  foreach ($value[3] as  $valu) {
                 
                       if ($val==$valu['1']) {
                               $i++;
                            $tmp=$valu;
                      }

            }          
                
              $dnm=date('l',$val);
         
               if ($i==1) {             
                       echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend sh"><a href="home.php?page=modify&idp='.$tmp[2].'">'.$tmp['0'].'</a></td>';      
    }

                       
                else
                     {
                      if ($dnm[0]!='S') 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="week">&nbsp;</td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend">&nbsp;</td>'; 
                     }
                       
      }


   }



   function shiftCreatorAdmin($value,$time_range){

            foreach  ($time_range as $key => $val){
              $i=0 ;
              $tmp=array();
                  foreach ($value[3] as  $valu) {
                 
                       if ($val==$valu['1']) {
                               $i++;
                            $tmp=$valu;
                      }

            }          
                
              $dnm=date('l',$val);
         
               if ($i==1) {
                if ((time() - $tmp[1] )> 36*60*60) 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="sh week">'.$tmp['0'].'</td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend sh"><a href="home.php?page=modify&idp='.$tmp[2].'">'.$tmp['0'].'</a></td>';      
    }

                       
                else
                     {
                      if ($dnm[0]!='S') 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="week">&nbsp;</td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend">&nbsp;</td>'; 
                     }
                       
      }


   }
   function shiftCreatorGuest($value,$time_range){

            foreach  ($time_range as $key => $val){
              $i=0 ;
              $tmp=array();
                  foreach ($value[3] as  $valu) {
                 
                       if ($val==$valu['1']) {
                               $i++;
                            $tmp=$valu;
                      }

            }          
                
              $dnm=date('l',$val);
         
               if ($i==1) {
               
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="week sh">'.$tmp['0'].'</td>';      
    }

                       
                else
                     {
                      if ($dnm[0]!='S') 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="week">&nbsp;</td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend">&nbsp;</td>'; 
                     }
                       
      }


   }



   function   theCreator($tech,$sites,$time_range){


         foreach ($tech as $key => $value) {


   siteCreator($sites,$value); 

  echo '<th id="tdUser_1" style="border-right: 1px solid black">&nbsp; '.$value[1].' &nbsp;</th>';
      
  switch (@$_SESSION['role']) {
    case 'root':
   shiftCreatorRoot($value,$time_range);
      break;

      case 'admin':
   shiftCreatorAdmin($value,$time_range);
      break;

      case 'guest':
   shiftCreatorGuest($value,$time_range);
      break;
    
    default:
         shiftCreatorGuest($value,$time_range);

      break;
  }

   #shiftCreator($value,$time_range);

         }
   }


function mysite($sites,$id){
 	foreach ($sites as $site) {
if ($site['idsite']==$id) {

        return $site['name'];

 	} 
 		}
 }

   
     
     function optionSites($sites){
     	 $option='';
     	foreach ($sites as $site) {
     		
     		$option.="<option value='".$site['idsite']."'' >".$site['name']."</option>";
     	}
     	return $option;
     }



      function getSites($pdo){
try {
    $psite=$pdo->query('select * from sites ');
    return $psite->fetchAll(PDO::FETCH_ASSOC);
	
} catch (Exception $e) {
	 echo $e;
}
    }





    
 function hours_shift($shift,$hour){
  switch ($shift) {
     
        case 'PM1':  return  $hour*PM1  ;   break;
        case 'PM2':  return  $hour*PM2;   break;
        case 'PM3':  return  $hour*PM3  ;   break;
        case 'PM4':  return  $hour*PM4  ;   break;

        case 'NGHT1':  return  $hour*NGHT1  ;   break;
        case 'NGHT2':  return  $hour*NGHT2  ;   break;
        case 'NGHT3':  return  $hour*NGHT3  ;   break;
         
        default: return  $hour*0  ;
          
          break;
      }
 }

function totalHours(array $shifts){
    $result=0;
    foreach ($shifts as $key => $shift) {
             
           $result+=$shift[2];

    }
      return $result;

}
function ldapConnect (){

   $ldapcon=@ldap_connect('localhost'); 
   ldap_set_option($ldapcon,LDAP_OPT_PROTOCOL_VERSION, 3);
   ldap_set_option($ldapcon,LDAP_OPT_REFERRALS, 0);
   return $ldapcon;

  }


function getTech(){
    $ldapcon=ldapConnect();
    $dn = "OU=people,DC=tt016,DC=lan";
    $filter="(objectClass=*)";
    $justthese = array("cn");

    $sr=ldap_search($ldapcon, $dn, $filter, $justthese);

    return ldap_get_entries($ldapcon, $sr);
}

function optionTech(){
    $tech='';
  foreach (getTech() as $key => $value) {
      if(isset($value['cn']))

     {   $tech.="<option value='".$value['cn'][0]."'>".$value['cn'][0]."</option>"; }
     
  }
  
  return $tech;
}

