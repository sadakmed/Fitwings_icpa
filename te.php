<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
 
   require 'view/function.php';

   


   echo date('d-m-y',time());
?>


  <form method="post" action="te.php">
	
	   <div class="form-group">
      <label for="to">To:</label>
      <input type="week" class="form-control" name="to" id="to" >
    </div> 
    <input type="submit" value="submit" >
</form>
