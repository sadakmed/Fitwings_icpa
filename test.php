<?php 



error_reporting(E_ALL);
ini_set("display_errors", 1);

 require 'view/header.php';
 require 'model/connect.php';
 require 'view/function.php';
 
 
 $sql="SELECT * FROM `wplan` where date between" ;
 


 if (@strlen($_POST['from'])>6 && @strlen($_POST['from'])>6 ){
     
     list($y1,$w1)=explode('-W', $_POST['from']);
     list($y2,$w2)=explode('-W', $_POST['to']);
   
    
   

  $from=weektotime($w1,$y1)-60*60 ;
  $to=weektotime($w2,$y2)+6*24*60*60 ;
   # code...
  $sql .= " $from and $to";

 if ( @$_POST['tech']!='All')  {
     
  $sql.=" and NomTech=".$_POST['tech'];

     
 }

 if ( $_POST['site']!='All' ) {
            
              $sql.=" and site=".$_POST['site'];       
          
         }

   }else{



  $from=weektotime(date('W',time()-(7*24*60*60)),date('Y',time()-(7*24*60*60)))-60*60 ;
  $to=weektotime(date('W',(time()+(20*24*60*60))),date('Y',(time()+(20*24*60*60))))-60*60-1 ;



    
 $sql .= " $from and $to ";

 if ( isset($_POST['tech']) and @$_POST['tech']!='All')  {
     
  @$sql.=" and NomTech=".$_POST['tech'];

     
 }
 if ( isset($_POST['tech']) and  @$_POST['site']!='All' ) {
            
              @$sql.=" and site=".$_POST['site'];       
          
         }
        
    
   }
 


  $time_range=range($from,$to,86400);
 

   
  try {
          
          $pdostmt=$pdo->query($sql);
         
          $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
          $rows=$pdostmt->rowCount();

       //  var_dump($result);
          $sites=getSites($pdo);
          // $destech=array_unique($tech);

        $tec=tech_site($result);
      //  var_dump($sites);
      
       
        $techi = array_map("unserialize", array_unique(array_map("serialize", $tec)));
        
       // var_dump($techi);
            }
          catch(Exception $e){
            echo $e ;
          }


 

$tech=orga($techi,$result);
//var_dump($tech);




?>


 

<div class="col-md-12">
   <div class="row">
    <form action="test.php" method="post">
      
  
        <div class="form-inline">
            <div class="form-group">
      <label for="from">From:</label>
      <input type="week" class="form-control"  name="from" id="from" >
    </div>  

    <div class="form-group">
      <label for="to">To:</label>
      <input type="week" class="form-control" name="to" id="to" >
    </div> 

    <div class="form-group">
      <label for="to">Tech:</label>
      <select class="form-control" id="tech"  name="tech" >
        <option value="All">All</option>
        <option value="'Said '">Said </option>
        <option value="'Nacir'">Nacir</option>
        <option value="'Rafik'">Rafik</option>
        <option value="'Hamid'">Hamid</option>

      </select>
    </div>

     <div class="form-group">
      <label for="to">Site:</label>
  <select id="site"  name="site" class="form-control">
    <option value="All">All</option>
                    <?= optionSites($sites) ?>
                   </select> 
    </div>

<div class="form-group">
  
      <button type="submit" class="btn btn-info" style="margin-bottom: 2px;
    height: 32px;">Search For Me</button>

</div>
        </div>
      </form>
     </div>
   
</div>
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
          
         <?php



  if ( $rows >0 ) {
    # code...
  


          echo '   <td>
                              <div id="divScrollHaut" class="scroll">
                  <div id="divScrollHautInterne"></div>
                </div>
                       <div id="divConteneurPlanning" class="scroll" style="overflow-y:hidden">
                <table class="planningContent" id="tabContenuPlanning"><tr> '; 

  

     weekCreator($from,$to);


echo '</tr><tr>';
//<!-- day's name -- 

    
    
   dasnameCreator($time_range);
  
echo '</tr><tr>';
 
  dayCreator($time_range);
echo '</tr><tr>';
 
   theCreator($tech,$sites,$time_range);

  



  

echo '</tr></table>';}else{


echo '
<div  class="col-sm-6"  style="margin-top:50px;">
  <div class="col-sm-offset-2">
<div  class="alert alert-warning" style="margin-left: 13px ; ">
  <strong>No data!</strong> Try another filter !!!
</div>
 </div>
 </div> ';

}


    ?>



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
        case 'AM1': $(value).css('background-color','#ffff99').css('text-align','center');break;
        case 'PM1': $(value).css('background-color','rgb(232, 168, 124)').css('text-align','center');break;

        case 'AM2': $(value).css('background-color','#ffff4d').css('text-align','center');break;
        case 'PM2': $(value).css('background-color','rgb(234, 187, 79)').css('text-align','center');break;
        case 'AM3': $(value).css('background-color','#ffff00').css('text-align','center');break;
        case 'PM3': $(value).css('background-color','rgb(195, 106, 63)').css('text-align','center');break;
        case 'AM4': $(value).css('background-color','#ffc61a').css('text-align','center');break;
        case 'PM4': $(value).css('background-color','#ff8533').css('text-align','center');break;
        
        case 'NRM': $(value).css('background-color','#66ff33').css('text-align','center');break;
        case 'NGHT1': $(value).css('background-color','rgb(224, 199, 224)').css('text-align','center');break;
        case 'NGHT2': $(value).css('background-color','#d698d5').css('text-align','center');break;
        case 'NGHT3': $(value).css('background-color','rgb(154, 107, 216)').css('text-align','center');break;
        
    }

  });


});


</script>




 