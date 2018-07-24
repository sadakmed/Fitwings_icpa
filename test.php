<?php 



error_reporting(E_ALL);
ini_set("display_errors", 1);

 require 'view/header.php';
 require 'model/connect.php';
 require 'view/function.php';
 

 $sql="SELECT * FROM `wplan` where date between" ;
 
 if (@strlen($_POST['from'])>6 and @strlen($_POST['from'])>6 ){
     
     list($y1,$w1)=explode('-W', $_POST['from']);
     list($y2,$w2)=explode('-W', $_POST['to']);
   
    
   

  $from=weektotime($w1)-60*60 ;
  $to=weektotime($w2)+6*24*60*60 ;
   # code...
  $sql .= " $from and $to";

 if ( @$_POST['tech']!='All')  {
     
  $sql.=" and NomTech=".$_POST['tech'];

     if ( $_POST['site']!='All' ) {
            
              $sql.=" and site=".$_POST['site'];       
          
         }
 }

   }else{



  $from=weektotime(date('W',time())-1)-60*60 ;
  $to=weektotime(date('W',time())+1)+6*24*60*60 ;


    
 $sql .= " $from and $to  ";

 if ( @$_POST['tech']!='All')  {
     
  @$sql.=" and NomTech=".$_POST['tech'];

     if ( @$_POST['site']!='All' ) {
            
              @$sql.=" and site=".$_POST['site'];       
          
         }
 }
        
    
   }
 
echo $sql;


  $time_range=range($from,$to,86400);
 

   
  try {
          
          $pdostmt=$pdo->query($sql);
         
          $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
       //  var_dump($result);
          $sites=getSites($pdo);
          // $destech=array_unique($tech);

        $tec=tech_site($result);
      //  var_dump($sites);
      
       
        $techi = array_map("unserialize", array_unique(array_map("serialize", $tec)));
        
        var_dump($techi);
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
            <td>
                              <div id="divScrollHaut" class="scroll">
                  <div id="divScrollHautInterne"></div>
                </div>
                       <div id="divConteneurPlanning" class="scroll" style="overflow-y:hidden" onscroll="document.cookie= document.getElementById('divConteneurPlanning').scrollLeft;">
                <table class="planningContent" id="tabContenuPlanning">


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


  var la=$('#from')
  la.on('change',function(){
           var my = $(la).val()
 console.log(my);
  });

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




 