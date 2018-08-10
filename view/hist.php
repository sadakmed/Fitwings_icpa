
<style type="text/css">
	
	tr td {
  text-align: center;

	}



</style>
	<?php 



error_reporting(E_ALL);
ini_set("display_errors", 1);
  require 'model/connect.php';
  require 'view/function.php';




$sites=getSites($pdo);

 


 
 $sql="  " ;
 


 if (@strlen($_POST['from'])>6 && @strlen($_POST['from'])>6 ){
     
     list($y1,$w1)=explode('-W', $_POST['from']);
     list($y2,$w2)=explode('-W', $_POST['to']);
   
    
   

  $from=weektotime($w1,$y1)-60*60 ;
  $to=weektotime($w2,$y2)+6*24*60*60 ;
   # code...
  $sql .= " $from and $to";

 if ( @$_POST['tech']!='All')  {
     
  $sql.=" and h.NomTech='".$_POST['tech']."'";

     
 }

 if ( $_POST['site']!='All' ) {
            
              $sql.=" and h.site=".$_POST['site'];       
          
         }

   }else{



  $from=weektotime(date('W',time()),date('Y',time()))-60*60 ;
  $to=weektotime(date('W',(time()+(7*24*60*60))),date('Y',(time()+(7*24*60*60))))-60*60-1 ;



    
 $sql .= " $from and $to ";

 if ( isset($_POST['tech']) and @$_POST['tech']!='All')  {
     
  @$sql.=" and h.NomTech='".$_POST['tech']."'";

     
 }
 if ( isset($_POST['tech']) and  @$_POST['site']!='All' ) {
            
              @$sql.=" and h.site=".$_POST['site'];       
          
         }
        
    
   }
 


//echo date('d-m-Y',$from)." to ".date('d-m-Y',$to);


$finalSql="select h.idh as i , h.idp as p ,w.NomTech as Ntech, w.site as Nsite, w.shift as Nshift , h.Nomtech as Otech, h.site as Osite , h.shift as Oshift , h.dshift , h.reason , h.dmod from wplan w inner join  hmod h on w.idp=h.idp  where w.date between $sql ";

//echo $finalSql;

          $old='';
          $new='';

try {
 	

          $pdostmt=$pdo->query($finalSql);
           


          $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
           
           //var_dump($result);


  foreach ($result as $value) {
  $old .="<tr><td>".$value['Otech']."</td><td>".mysite($sites,$value['Osite'])."</td><td>".$value['Oshift']."</td><td>".date('d-m-Y',$value['dshift'])."</td><td>".$value['reason']."</td><td>".date('H:i:s d-m-Y',$value['dmod'])."</td></tr>";

  $new .="<tr><td>".$value['Ntech']."</td><td>".mysite($sites,$value['Nsite'])."</td><td>".$value['Nshift']."</td></tr>";}



 } catch (Exception $e) {
 	echo $e;
 	
 } 
          
	






  
	 ?>





<div class="col-md-12">
   <div class="row">
    <form action="home.php?page=hist" method="post">
      
  
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
      <?= optionTech() ?>

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

<br>
<br>
<br>
<br>

<div class="col-md-8">
	<legend class="text-center">Old</legend>
    <table class="table table-bordered" style="background-color: white">
    	 <thead><tr>
    	 	<th>Tech</th>
    	 	<th>Site</th>
    	 	<th>Shift</th>
    	 	<th>Shift Date</th>
    	 	<th>Reason</th>
    	 	<th>Date modific.</th>
    	 </tr></thead>
<tbody><?= $old ?></tbody>	

    </table>

</div>


<div class="col-md-3">
	<legend class="text-center">New</legend>
    <table class="table table-bordered" style="background-color: white">
    	 <thead><tr>
    	
    	 	<th>Tech</th>
    	 	<th>Site</th>
    	 	<th>Shift</th>
    	 	
    	 </tr></thead>


    	 <tbody><?= $new ?></tbody>	


    </table>

</div>