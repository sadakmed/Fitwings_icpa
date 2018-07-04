<form class="form-horizontal" action="home.php?page=cons" method="post">
  
<div class="form-group">
    <label class="control-label col-sm-3" for="meter">Meter Number:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" id="meter" name="meter" required="true" placeholder="Meter Number">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-3" for="f_name">First Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="f_name" readonly="true" name="f_name"  
        placeholder="First name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="l_name">Last Name:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" id="l_name" name="l_name" readonly="true" placeholder="Last Name">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-3" for="cons">Consemption:</label>
    <div class="col-sm-9"> 
      <input type="Number" class="form-control" id="cons" name="cons" readonly="true" required="true" placeholder="How much of Kwh">
    </div>
  </div>

  

  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit"  name="submit" class="btn btn-default">validate</button>
    </div>
  </div>
</form>

<?php 

 

 if (isset($_POST['submit'])) {
  $_SESSION['meter']=$_POST['meter'];
  $_SESSION['l_name']=$_POST['l_name'];
  $_SESSION['f_name']=$_POST['f_name'];

  

    require 'model/client.php';
    $cons = new consemption();
    $con  = new connecx();
    $cons->storeCons($_POST['meter'],$_POST['cons'],$con->connec());

    header('location:home.php?page=allcons');
 


   
 }?>

 <script type="text/javascript">
    
     $(function(){

           
              
          
              $('#meter').on('focusout',function(){
                $('#f_name').val(null);
                $('#l_name').val(null);
                $('#cons').val(null);
                $('#cons').attr('readonly',true);
                var $meter=$('#meter').val();
                console.log($meter);
                
                $.post({ 
                   url:'model/getClient.php',
                   type:'post',
                   data: {meter:$meter},
                   error:function(){console.log('no dsata');},
                   success:function(result){
    

    var obj = JSON.parse(result);
    
      obj[0].meter_number;

      $('#f_name').val(obj[0].f_name);
      $('#l_name').val(obj[0].l_name);
      $('#cons').attr('readonly',false);

                   }
                 })

              });

     });

 </script>