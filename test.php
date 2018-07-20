<?php 
 
 require 'view/header.php';
 require 'model/connect.php';

?>
  



<?php 

  $from=strtotime('09-07-2018');
  $to=strtotime('29-07-2018');
  $time_range=range($from,$to,86400);
 

   
 
 
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
  try {
          
          $pdostmt=$pdo->query("SELECT * FROM `wplan` where date between $from and $to ");
          $stmtsite=$pdo->query("SELECT * FROM `sites` ");
          $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
          $sites=$stmtsite->fetchAll(PDO::FETCH_ASSOC);
          // $destech=array_unique($tech);

        $tec=tech_site($result);
        //var_dump($sites);
      
        $techi=uni_tech($tec);
        //var_dump($tech);
     
            }
          catch(Exception $e){
            echo $e ;
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
 

$tech=orga($techi,$result);


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
<th class="planning_head_month" colspan="28"><a href="">'.$m.'</a></th>
  ';
}
echo $month;
}

function weekCreator($from,$to){

  $week='';

 foreach (h_many_W($from,$to) as $k) {
    $week.='<th class="planning_head_week" colspan="7"><a href="">W '.$k.'</a></th>';
 }
   echo $week;
  }


function dasnameCreator($time_range){

  $dasname='';
  foreach ($time_range as $val) {
      $dn=date('l',$val);

    if ($dn[0]=='S') {
        $dasname .= '<th class="planning_head_dayname weekend"><div><a href="">'.$dn[0].'</a></div></th>';

    }else{
  $dasname.='<th class="planning_head_dayname week"><div><a href="">'.$dn[0].'</a></div></th>';
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
     $day .= '<th class="planning_head_day weekend"><div><a href="">'.$dn.'</a></div></th>';

    }else{
   $day .= '<th class="planning_head_day week"><div><a href="">'.$dn.'</a></div></th>';
      }
    }
    
    echo $day;

 }


 function siteCreator($sites,$value){


              foreach ($sites as  $site) {
                if ($site['idsite']==$value[2]) {
             
 echo '<tr class=""> <td style="padding: 0 20px 0 20px;"><a href="" >'.$site['region'].'</a></td>
  <td style="padding: 0 20px 0 20px;"><a href="">'.$site['ville'].'</a></td><td style="padding: 0 20px 0 20px;"><a href="">'.$site['name'].'</a>';
                }
                
              }
 }

   function shiftCreator($value,$time_range){

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
                if ($dnm[0]!='S') 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="sh week"><a href="index.php?page=modify&idp='.$tmp[2].'">'.$tmp['0'].'</a></td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend sh"><a href="index.php?page=modify&idp='.$tmp[2].'">'.$tmp['0'].'</a></td>';      
    }

                       
                else
                     {
                      if ($dnm[0]!='S') 
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="week"><a href=>&nbsp;</a></td>'; 
                  else
                     echo ' <td  style="min-width:25px;" id="'.$val.'" class="weekend"><a>&nbsp;</a></td>'; 
                     }
                       
      }


   }



   function   theCreator($tech,$sites,$time_range){


         foreach ($tech as $key => $value) {


   siteCreator($sites,$value); 

  echo '</td><td id="tdUser_1" style="padding: 0 20px 0 20px;" >&nbsp;<a  href="">'.$value[1].'</a>&nbsp;</td>';
           
   shiftCreator($value,$time_range);

         }
   }






?>


 

<div class="row">
    <div class="col-md-12">
      <div class="soplanning-box" id="divPlanning">
        <table id="tablePlanning">
          <tr>
            <td class="switchCell">
              <div id="divBoutonInverser" class="text-center">
              </div>
            </td>
            <td>
              <div id="divLigneEntete" style="display:none">
                <table id="layerJours" class="planningContent scroll">
                  <tbody id="bodyLayerJours">
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td class="text-right">
              <div id="divColonneEntente" >
                <div class="h17"></div>
                <table id="divPeople">
                  <tbody id="bodyPeople">
                  </tbody>
                </table>
              </div>
            </td>
            <td>
                              <div id="divScrollHaut" class="scroll">
                  <div id="divScrollHautInterne"></div>
                </div>
                            <div id="divConteneurPlanning" class="scroll" style="overflow-y:hidden" onscroll="document.cookie='xposMois=' + document.getElementById('divConteneurPlanning').scrollLeft;">
                <table class="planningContent" id="tabContenuPlanning">
<tr>
<th id="tdUser_0" rowspan="4" colspan="4"></th>
<!--  months   
<th class="planning_head_month" colspan="28"><a href="">July 2018</a></th>
-->


<?php



 monthCreator($from,$to);

 ?>
</tr>

<tr>
  
<?php 


  

     weekCreator($from,$to);

?>

</tr>

<tr>
<!-- day's name --> 

<?php  
    
    
   dasnameCreator($time_range);
  
?> 


</tr>

<tr>
  <!-- days -->

  <?php  

 
  dayCreator($time_range);
?> 




</tr>

<tr>


 

    <?php

 
   theCreator($tech,$sites,$time_range);

  

    ?>


  

</tr>

<!--
<tr class="test">
  
  <th>Meknes</th>
  <th>Valancia</th>
  <th id="tdUser_1" >&nbsp;<a  href="javascript:xajax_modifProjet('test');undefined;">Said Ayadi</a>&nbsp;</th>

  <td  style="min-width:25px;" id="td_test_20180703" class="week">&nbsp;</td>
  <td  style="min-width:25px;" id="td_test_20180702" class="week">&nbsp;</td>
  <td  style="min-width:25px;" id="td_test_20180704" class="week">&nbsp;</td>
  <td  style="min-width:25px;" id="td_test_20180705" class="week today">&nbsp;</td>

</tr>   -->

</table>

              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

<script type="text/javascript">
  
$(function(){

  a=$('tbody tr td div table#tabContenuPlanning tbody tr td.sh');
  $.each(a,function(key,value){
    switch ($(value).text() ){
        case 'AM': $(value).css('background-color','#ffff99').css('text-align','center');break;
        case 'PM': $(value).css('background-color','#ff8533').css('text-align','center');break;
        case 'NRM': $(value).css('background-color','#66ff33').css('text-align','center');break;
        case 'NGHT': $(value).css('background-color','#6699ff').css('text-align','center');break;
        
    }

  });


});


</script>




 <?php


/*
         foreach ($tech as $key => $value) {

              foreach ($sites as  $site) {
                if ($site['idsite']==$value[2]) {
             
 echo '<tr> <td style="padding: 0 20px 0 20px;"><a href="" >'.$site['region'].'</a></td>
  <td style="padding: 0 20px 0 20px;"><a href="">'.$site['ville'].'</a></td><td style="padding: 0 20px 0 20px;"><a href="">'.$site['name'].'</a>';
                }
                
              }

  echo '</td><td id="tdUser_1" style="padding: 0 20px 0 20px;" >&nbsp;<a  href="">'.$value[1].'</a>&nbsp;</td>';
            foreach  ($time_range as $key => $val){
              $i=0 ;
              $tmp=array();
                  foreach ($value[3] as  $valu) {
                 
                       if ($val==$valu['1']) {
                               $i++;
                            $tmp=$valu;
                      }

            }          

               if ($i==1) 
                 
                        echo ' <td  style="min-width:25px;" id="td_test_20180702" class="week">'.$tmp['0'].'</td>';
                else
                        echo ' <td  style="min-width:25px;" id="td_test_20180702" class="week">&nbsp;</td>';
      }



         }

  var_dump($tech);
*/
    ?>
