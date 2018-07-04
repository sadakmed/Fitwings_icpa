<form class="form-horizontal" action="home.php?page=cli" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3" for="f_name">First Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="f_name" name="f_name" required="true" 
        placeholder="What's your first name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="l_name">Last Name:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" id="l_name" name="l_name"  placeholder="What's your Last Name">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-3" for="residence">Residence:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" id="residence" name="residence"  placeholder="Where do you live">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="meter">Meter Number:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" id="meter" name="meter"  placeholder="What's your Meter Number">
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
    require 'model/client.php';
 
     //var_dump($_POST);
  $clie=new client();
  $cnx=new connecx(); 
if (
    $clie->storeClient($_POST['meter'],$_POST['l_name'],$_POST['f_name'],$_POST['residence'],$cnx->connec())  ){
     
     echo "<script>alert('Client cridentienls saved successfuly!')</script>";

    }else{

      echo "<script>alert('Client credentienls not saved !')</script>";
    }
 


   
 }