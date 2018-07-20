<?php 

 
  require 'model/connect.php';

    $pdostmt=$pdo->query('select * from wplan where idp='.$_GET['idp']);
    $result=$pdostmt->fetch(PDO::FETCH_ASSOC);
    $psite=$pdo->query('select * from sites where idsite='.$result['site']);
    $sitess=$psite->fetch(PDO::FETCH_ASSOC);
    var_dump($sitess);
    

 ?>

 <div id="myModal" class="modal" style="display:block; "><div class="col-sm-offset-1">
<div class="col-sm-11">
    <div class="model-content" style="background-color: #fefefe;margin: auto; padding: 20px;border: 1px solid #888;">
        <div >
        	   
        	<fieldset >
        		<legend style="text-align: center; font-weight: bold;" id='week'>Old shift:</legend>
        	<div class="row">
        		
        	<div class="col-sm-3">


        		<div class="form-group"> 
           <label>Tech:</label>
                <input type="" class="form-control" name="" value="<?= $result['NomTech'] ?>" readonly='true'>
                </div>
            </div><div class="col-sm-3">
        		<div class="form-group"> 
           <label>Site:</label>
                <input type="" class="form-control" name="" value="<?= $sitess['name'] ?>" readonly='false'>
                </div>
</div><div class="col-sm-3">

        		<div class="form-group"> 
           <label>Shift:</label>
                <input type="" class="form-control" name="" value="<?= $result['shift'] ?>" readonly='false'>
                </div> </div><div class="col-sm-3">
        		<div class="form-group"> 
           <label>Date:</label>
                <input type="" class="form-control" name="" value="<?= date('l-m-y',$result['date']) ?>" readonly='false'>
                </div>
                   
        	  </div>
         
        	</div>

           
      
        

          <br>

  
          <br>
          
</fieldset>

</div><div>
	
    <fieldset >
        		<legend style="text-align: center; font-weight: bold;" id='week'>New shift:</legend>
        	<div class="row">
        		
        	<div class="col-sm-2">
        		<div class="form-group"> 
           <label>Tech:</label>
           <select id="tech" class="form-control">
                   	 <option>-----</option>
                   	 <option>Said </option>
                   	 <option>Hamid</option>
                   	 <option>Nacir</option>
                   	 <option>Rafik</option>
                   </select>                </div>
            </div><div class="col-sm-2">
        		<div class="form-group"> 
           <label>Site:</label>
           <select id="site" class="form-control">
                   	 <option>-----</option>
                   	 <option>Said </option>
                   	 <option>Hamid</option>
                   	 <option>Nacir</option>
                   	 <option>Rafik</option>
                   </select>                </div>
           </div><div class="col-sm-2">

        		<div class="form-group"> 
           <label>Shift:</label>
<select id="shift" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM </option>
                   	 <option>NGHT</option>
                   	 <option>NRML</option>
                   </select>                </div> </div>

                <div class="col-sm-2">
        		<div class="form-group"> 
           <label>Date:</label>
                <input type="" class="form-control" name="" value="<?= date('l-m-y',$result['date']) ?>"  readonly='true'>
                </div>
                   
        	  </div>
        	  
         <div class="col-sm-2">
                <div class="form-group"> 
           <label>Motif:</label>
                   <select id="motif" class="form-control">
                   	 <option>Change</option>
                   	 <option>sickness</option>
                   	 <option>legal</option>
                   	 <option>death</option>
                   	 <option>birth</option>
                   </select>
                </div>
             </div>


        	</div>


        	<div class="">
        		
        	 

         </div>


         <div class="col-sm-12">
            <div class="pull-right"> 
            <div class="form-group"> 
               <button id="sub" class="btn btn-default">Submit</button>
            </div>
            </div></div>
        	</div>


           
      
        

          <br>

  
          <br>
          
</fieldset>
</div>
    
    </div>
    <hr>
  
</div> 
</div> 

</div>
