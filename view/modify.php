<?php 

	error_reporting(E_ALL);
ini_set("display_errors", 1);
  require_once 'model/connect.php';
  require_once 'view/function.php';

    $pdostmt=$pdo->query('select * from wplan where idp='.$_GET['idp']);
    $result=$pdostmt->fetch(PDO::FETCH_ASSOC);  



    if ( (time() - $result['date'] )> 36*60*60 ) {
    	

    	header("location:test.php");
    }

   

    
    $sitess=getSites($pdo);

 
 


 ?>

       
 <div id="myModal" class="modal" style="display:block; ">
 	
 	<div class="col-sm-11">
<div class="col-sm-offset-1">
    <div class="model-content" style="background-color: #fefefe;margin: auto; padding: 20px;border: 1px solid #888;">
        <div >
        	   <span class="close" onclick="red()">&times;</span>
        	<fieldset >
        		<legend style="text-align: center; font-weight: bold;" id='week'>Old shift:</legend>
        	<div class="row">
        		
        	<div class="col-sm-3">


        		<div class="form-group"> 
           <label>Tech:</label>
                <input type="" class="form-control-static" name="" style="padding-left: 15px;" value="<?= $result['NomTech'] ?>" readonly='true'>
                </div>



            </div><div class="col-sm-3">
        		<div class="form-group"> 
           <label>Site:</label>
                <input type="" class="form-control-static" name="" style="padding-left: 15px;" value="<?= mysite($sitess,$result['site'])?>" readonly='false'>
                </div>
</div><div class="col-sm-3">

        		<div class="form-group"> 
           <label>Shift:</label>
                <input type="" class="form-control-static" name="" value="<?= $result['shift'] ?>" style="padding-left: 15px;" readonly='false'>
                </div> </div><div class="col-sm-3">
        		<div class="form-group"> 
           <label>Date:</label>
                <input type="" class="form-control-static" name="" style="padding-left: 15px;" value="<?=  'Week'.date(' W: d-m-y',$result['date']) ?>" readonly='false'>

                </div>
                   
        	  </div>
         
        	</div>

           
      
        

          <br>

  
          <br>
          
</fieldset>

</div>
	
    <fieldset >
        		<legend style="text-align: center; font-weight: bold;" id='week'>New shift:</legend>
        		
        			
        	<div class="row">
        	<div class="col-sm-3">
        		<div class="form-group"> 
           <label>Tech:</label>
           <select id="tech" class="form-control">
                   	 <option>-----</option>
                   	 <option  value="Said " >Said </option>
                   	 <option  value="Hamid" >Hamid</option>
                   	 <option value="Nacir" >Nacir</option>
                   	 <option value="Rafik" >Rafik</option>
                   </select>                </div>
            </div><div class="col-sm-3">
        		<div class="form-group"> 
           <label>Site:</label>
           <select id="site" class="form-control">
           	<option value="-----">-----</option>
                   	<?= optionSites($sitess) ?>
                   </select>                </div>
           </div><div class="col-sm-3">

        		<div class="form-group"> 
           <label>Shift:</label>
<select id="shift" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM </option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>
                   </select>                </div> </div>

              
        	  
         <div class="col-sm-3">
                <div class="form-group"> 
           <label>Reason:</label>
                   <select id="reason" class="form-control">
                   	 <option>Change</option>
                   	 <option>Sick</option>
                   	 <option>Legal</option>
                   	 <option>Death</option>
                   	 <option>Birth</option>
                   </select>
                </div>
             </div>


        	</div>


       

         <div class="col-sm-12" style="margin-top: 40px;">
            <div class="pull-right"> 
            <div class="form-group"> 
               <button id="sub" class="btn btn-default">Submit</button>
            </div>
            </div></div>
        

        	

           
      
        

          <br>

  
          <br>
          
</fieldset>
</div>
    
    </div>
    <hr>
  
</div> 
</div> 

</div>
 
 <script type="text/javascript">
 	 $(function(){
     

    $('select#tech').val('<?= $result['NomTech']?>');
    $('select#site').val('<?= $result['site']?>');


      $('button#sub').on('click',function(){
             
             var $tech =$('select#tech').find(':selected').text();
             var $site =$('select#site').find(':selected').val();
             var $shift =$('select#shift').find(':selected').text();
             var $reason =$('select#reason').find(':selected').text();
             var $date =<?=$result['date']?>;
             var $idp =<?=$_GET['idp']?>;
  if ($tech==='----' || $site==='-----') {
            
            alert('please select tech and site');

  }else {   
         $.ajax({ url:'view/modtech.php',
         	      type:'POST',
         	      data:{idp:$idp,tech:$tech,site:$site,shift:$shift,reason:$reason,date:$date},
         	      success:function(result){
         	      	console.log(result);
                   a=JSON.parse(result);
   if (a[0]===true && a[1]===true ) {

                 
              setTimeout(red(),1000);
              
  

   }else{

    $('div#failed').fadeIn();
   }
                    

         	      },
         	      error:function(result){
         	      	Alert('No modification happends!!')
         	      }
                  

         });}


      });





 	 });

function red(){
    

	window.location.assign('test.php');
}



 </script>