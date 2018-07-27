<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);


if (isset($_POST['pm1']) && isset($_POST['from']) && isset($_POST['to'])) {
  
 
 define('PM1', ($_POST['pm1']=='')? 0:$_POST['pm1'] );
 define('PM2', ($_POST['pm2']=='')? 0:$_POST['pm2'] );
 define('PM3', ($_POST['pm3']=='')? 0:$_POST['pm3'] );
 define('PM4', ($_POST['pm4']=='')? 0:$_POST['pm4'] );
 
 
 define('NGHT1', ($_POST['nght1']=='')? 0:$_POST['nght1']);
 define('NGHT2', ($_POST['nght2']=='')? 0:$_POST['nght2']);
 define('NGHT3', ($_POST['nght3']=='')? 0:$_POST['nght3']);
 
}

 


   require_once  '../model/connect.php';
   require_once 'function.php';

   if ($_POST['from']=='' || $_POST['to']=='' ) {
     # code...
   
 $d=date('d',time());
 
   if ($d>=16) {
     
    $from=date('m',time());
    $to=date('m',time()+(20*24*60*60));


   }elseif ($d<=15) {

       $from=date('m',time()-(20*24*60*60));
       $to=date('m',time());

   }

 $from=mktime(0,0,0,$from,16,date('Y',time()));
 $to=mktime(0,0,0,$to,15,date('Y',time()));

   }else{


     $from=strtotime($_POST['from']);
     $to=strtotime($_POST['to']);
   }

//echo $from." ".$to;

?>  
 
 <div class="row">
 <table class="table" ><tr style="font-weight: bold; text-align: center;"><td >FROM: <?= date('d-m-y',$from) ?> </td><td> TO: <?= date('d-m-y',$to) ?></td></tr></table>
  </div>


<?php
 

   //echo  date('d-m-y',$from).' to '.date('d-m-y',$to) ;


   $pdostmt=$pdo->query("select Nomtech, shift , count(*) as howmuch from wplan where date between $from and $to  group by Nomtech, shift order by shift; " );

  $rows=$pdostmt->fetchAll(PDO::FETCH_ASSOC);



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