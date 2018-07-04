
<form style="padding-bottom: 15px;">
    <div class="form-group">
       <div class="col-xs-3">
        <label for="f_name">First name</label>
        <input class="form-control" readonly="true" value="<?php echo $_SESSION['f_name'];?>" id="f_name" type="text">
      </div>
      <div class="col-xs-3">
        <label for="l_name">last name</label>
        <input class="form-control" id="l_name" readonly="true" value="<?php echo $_SESSION['l_name'];?>"type="text">
      </div>
      <div class="col-xs-3">
        <label for="">Meter number</label>
        <input class="form-control" id="" type="text" value="<?php echo $_SESSION['meter'];?>" readonly="true">
      </div>
    </div>
  </form >
  
<br><br><br>
<script src="bootstrap/appml.js"></script>



<script type="text/javascript">
  
   $(function(){
          $res=[];
    $result=[];
         var $meter=<?= $_SESSION['meter']?>;

        $.ajax({
                 url:'model/getCons.php',
                 data:{meter:$meter},
                 type:'post',
                 errors:function(){},
                 success:function(result){
                     
                  $re=JSON.parse(result);
                 var htm='';             
                  $.each($re,function(one){

                    var pay=($re[one]['pay']==0)?'not paid':'paid';

                     htm=htm+'<tr><td>'+$re[one]['quantity']+'</td>'+'<td>'+$re[one]['prix']+'</td>'+'<td>'+pay+'</td>'+'<td>'+$re[one]['date']+'</td></tr>';

                  });
$('#putithere').html(htm);
//console.log(htm);
                 }

                // foreach($result as one){console.log(one);}


        });

 

   });


</script>


<div class="" style="padding-top: 15px; padding-bottom: 100px;">
             
  <table class="table table-hover table-bordered" appml-data="">
    <thead>
      <tr>
        <th>Quantity (KWh)</th>
        <th>Price</th>
        <th>Paid</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody id='putithere'>


      



    </tbody>
  </table>
</div>

