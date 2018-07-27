


<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
 
 define('PM1', 1);
 define('PM2', 3);
 define('PM3', 2);
 
 
 define('NGHT1', 8);
 define('NGHT2',  6);
 define('NGHT3',  7);
 

 


   require_once  'model/connect.php';
   
 $d=date('d',time());
 
   if ($d>=16) {
     
    $from=date('m',time());
    $to=date('m',time()+(20*24*60*60));


   }elseif ($d<=15) {

       $from=date('m',time()-(20*24*60*60));
       $to=date('m',time());
 

   }
      
       $from=mktime(0,0,0,$from,16,date('Y',time()));
       $to=mktime(0,0,0,$to,15,date('Y',(time()+25*24*60*60)));

 

?>


<div class="col-sm-offset-1" >
<div class="col-sm-6" style="background-color: white" > 
  <div id="contentTable" >

  <div class="row">
 <table class="table" ><tr style="font-weight: bold; text-align: center;"><td >FROM: <?= date('d-m-y',$from) ?> </td><td> TO: <?= date('d-m-y',$to) ?></td></tr></table>
  </div>
  <br>


<?php


   //echo date('d-m-y',$from)  .' to '.date('d-m-y',$to) ;
$sql="select Nomtech, shift , count(*) as howmuch from wplan where date between $from and $to  group by Nomtech, shift order by shift;";
 
   $pdostmt=$pdo->query($sql);

  $rows=$pdostmt->fetchAll(PDO::FETCH_ASSOC);


 function hours_shift($shift,$hour){
  switch ($shift) {
     
        case 'PM1':  return  $hour*PM1  ;   break;
        case 'PM2':  return  $hour*PM2;   break;
        case 'PM3':  return  $hour*PM3  ;   break;

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


$techs=array();

   foreach ($rows as $key => $value) {
       array_push($techs, $value['Nomtech']);
   } 
       $techs=array_unique($techs);
      
      $tech_shift=array();
      foreach ($techs as $k => $value) {
        $tota=0;
      $tmp1=array();
           foreach ($rows as $key => $val) {
              $tmp2=array();
              $i=0;
               if ($value==$val['Nomtech']) {
                    
                    array_push($tmp2,$val['shift']);
                    array_push($tmp2,$val['howmuch']);
                    array_push($tmp2,hours_shift($val['shift'],$val['howmuch']));

                    $i=1;                   
               }

               if ($i==1) 
                  { array_push($tmp1,$tmp2);

                  }
                  
           }
               
               $tota+=totalHours($tmp1);
               //var_dump($tmp1);
              // echo "<br>";
                array_push($tech_shift,array('Nomtech' => $value,'howmuch'=>$tota,'shift'=>$tmp1));


      }

     // var_dump($tech_shift);


  
    echo "<table class='table table-bordered table-hover'><thead><tr><th>Tech</th><th>Shift</th><th>Hours</th><th>Night Hours</th><th>Total Hours</th></tr></thead> <tbody class='text-center'>"; 




foreach ($tech_shift as $key => $value) {
    

    echo "<tr>
        <td rowspan='".count($value['shift'])."' >".$value['Nomtech']."</td>";
    $i=0;
          foreach ($value['shift'] as $k => $val) {
         $i++;       
            
       echo "
        <td>".$val[0]."</td>
        <td>".$val[1]."</td>
        <td>".$val[2]."</td>
         ";
         if ($i==1) {
            echo "<td rowspan='".count($value['shift'])."' >".$value['howmuch']."</td></tr>"; 
          }else 
            echo "</tr>"; 

          }




}

   ?>


         



    </table>
</div></div>

 <div class="col-sm-3">
    <table  id="cal" class="table table-bordered">
       <tr><th>Shift</th><th>Night Hours</th></tr>
       <tr><td>PM1</td><td><input type="number" name="PM1" id="PM1"></td></tr>
       <tr><td>PM2</td><td><input type="number" name="PM2" id="PM2"></td></tr>
       <tr><td>PM3</td><td><input type="number" name="PM3" id="PM3"></td></tr>
       <tr><td>PM4</td><td><input type="number" name="PM4" id="PM4"></td></tr>
       <tr><td>NGHT1</td><td><input type="number" name="NGHT1" id="NGHT1"></td></tr>
       <tr><td>NGHT2</td><td><input type="number" name="NGHT2" id="NGHT2"></td></tr>
       <tr><td>NGHT3</td><td><input type="number" name="NGHT3" id="NGHT3"></td></tr>
       <tr><td><input type="date" class="form-control" name="from" id="from"></td><td><input type="date" class="form-control" name="to" id="to"></td></tr>
       <tr><td colspan="2" class="text-center" ><button  class="btn btn-default" name="btncal" id="btncal"> Calculate</button></td></tr>

    </table>


 </div>
 </div>
<script type="text/javascript">
   $(function(){
       
       var fir=$('table#cal tr td');
       var pm1=$(fir).find('#PM1');
       var pm2=$(fir).find('#PM2');
       var pm3=$(fir).find('#PM3');
       var pm4=$(fir).find('#PM4');

       var nght1=$(fir).find('#NGHT1');
       var nght2=$(fir).find('#NGHT2');
       var nght3=$(fir).find('#NGHT3');

       var from=$(fir).find('#from');
       var to=$(fir).find('#to');

       $(pm1).val('1');
       $(pm2).val('3');
       $(pm3).val('2');
       $(pm4).val('0');
       

       $(nght1).val('8');
       $(nght2).val('6');
       $(nght3).val('7');
      

       $(fir).find('#btncal').on('click',function(){

       var $pm1=$(pm1).val();
       var $pm2=$(pm2).val();
       var $pm3=$(pm3).val();
       var $pm4=$(pm4).val();
       
       
       var $nght1=$(nght1).val();
       var $nght2=$(nght2).val();
       var $nght3=$(nght3).val();
       var $from =$(from).val();
       var $to   =$(to).val();

       $.ajax({ url:'view/calcula.php',
                type:'POST',
                data: {pm1:$pm1,pm2:$pm2,
                       pm3:$pm3,pm4:$pm4,
                       nght1:$nght1,nght2:$nght2,
                       nght3:$nght3,from:$from,to:$to},
                success:function(resulte){
                 
                  document.getElementById('contentTable').innerHTML=resulte;

 

                }


              });



       });


   });



</script>