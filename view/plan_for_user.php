<div class="col-sm-9">
	<div class="col-sm-offset-3">
		<table id="show_site" class="table table-bordered" style="background-color: white;">
			<thead>
				<th>Region</th>
				<th>City</th>
				<th>Site</th>
				<th></th>
			</thead>
<tbody  >
	<?php 
        require_once 'model/connect.php';
       try {
        $pdostmt=$pdo->query('select * from sites');
        $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $key => $value) {
        
      echo "<tr><td>".$value['region']."</td><td>".$value['ville']."</td><td id='".$value['idsite']."'>".$value['names']."</td>
           <td><button class='myBtn' onclick='cli();'' >shift</button></td>
      </tr>";
        }

       } catch (Exception $e) {
       	 

       }


   ?>

</tbody>

		</table>
</div>



<!------------------------------------------------------------------->
		<div id="myModal" class="modal" style="display: ;"><div class="col-sm-offset-2">
<div class="col-sm-8">
    <div class="model-content" style="background-color: #fefefe;margin: auto; padding: 20px;border: 1px solid #888;">
        <div class="">
        	    <span class="close">&times;</span>
        	<fieldset>
        		<legend style="text-align: center; font-weight: bold;" id='week'>Shift Week:</legend>
        	
        	 <div class="col-sm-4">
                <div class="input-group"> 
           <label>Tech:</label>
                   <select id="tech" class="form-control">
                   	 <option>-----</option>
                   	 <option>Said </option>
                   	 <option>Hamid</option>
                   	 <option>Nacir</option>
                   	 <option>Rafik</option>
                   </select>
                </div>
             </div>
            
             

                <div class="col-sm-6">
            <div class="row"><div class="col-sm-6">
                <div class="input-group"> 
           <label>Mon:<span id="dmon"></span></label>
                   <select id="mon" class="form-control">
                   	 <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                </div></div>
                <div class="col-sm-6">
                <div class="input-group"> 
           <label>Tue:<span id="dtue"></span></label>
                   <select id="tue" class="form-control">
                   	 <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                </div></div>
            </div> 


          <div class="row"><div class="col-sm-6">
                <div class="input-group"> 
                  <label>Wed:<span id="dwed"></span></label>
                    <select id="wed" class="form-control">
                   	 <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                
            </div>
            </div>
            <div class="col-sm-6">
            
                <div class="input-group">
   
                	<label>Thu:<span id="dthu"></span></label>
                  <select id="thu" class="form-control">
                   	  <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
            </div>
            </div>

           
        </div>
          <div class="row"><div class="col-sm-6">
                <div class="input-group"> 
                  <label>Fri:<span id="dfri"></span></label>
                    <select id="fri" class="form-control">
                   	 <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                
            </div>
            </div>
            <div class="col-sm-6">
            
                <div class="input-group">
   
                	<label>sat:<span id="dsat"></span></label>
                  <select id="sat" class="form-control">
                   	  <option>----</option>
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
            </div>
            </div>

           
        </div> <div class="row"><div class="col-sm-6">
                <div class="input-group"> 
                  <label>Sun:<span id="dsun"></span></label>
                    <select id="sun" class="form-control">
                   	  <option>----</option>
                   	 <option>AM</option>
                        
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                
            </div>
            </div>
         

           
        </div>
        </div>

          <br>
<div class="col-sm-12">
            <div class="pull-right"> 
            <div class="input-group"> 
               <button id="sub" class="btn btn-default">Submit</button>
            </div>
            </div></div>
  
          <br>
          <br>
</fieldset>
    
    </div>
    <hr>
  
</div> 
</div> 



	
	

</div>

<script>
// Get the modal

var modal = document.getElementById('myModal');
var site;

$(function(){

   $('button.myBtn').on('click',function(){
  
  site=$(this).closest('td').prev().attr('id');

console.log('first:'+site);
   });



   $('button#sub').on('click',function(){
console.log('3'+site);
  

var $tech=$('#tech').find(':selected').text(); 


  if($tech==='-----'){
  	alert('please select a tech !!!!!');
  	 
  }else{


var $mon= $('#mon').find(':selected').text(); 
var $dmon=$('#dmon').text();

var $tue= $('#tue').find(':selected').text(); 
var $dtue=$('#dtue').text();

var $wed= $('#wed').find(':selected').text(); 
var $dwed=$('#dwed').text();

var $thu= $('#thu').find(':selected').text(); 
var $dthu=$('#dthu').text();

var $fri= $('#fri').find(':selected').text(); 
var $dfri=$('#dfri').text();

var $sat= $('#sat').find(':selected').text(); 
var $dsat=$('#dsat').text();

var $sun= $('#sun').find(':selected').text(); 
var $dsun=$('#dsun').text();
  var $site=site;
  console.log('here:'+$site);
$.ajax({url:'view/storeShift.php',
	    data:{site:$site,tech:$tech,
	    	  mon:$mon,dmon:$dmon,
	          tue:$tue,dtue:$dtue,
	          wed:$wed,dwed:$dwed,
	          fri:$fri,dfri:$dfri,
	          thu:$thu,dthu:$dthu,
	          sat:$sat,dsat:$dsat,
	          sun:$sun,dsun:$dsun },
	    type:'post',
	    success:function(result){

 console.log(result);

 }
}) ;
   modal.style.display = "none";
  }

}); 

   });



// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 function cli(){
    modal.style.display = "block";
//console.log($(this).parent());
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
   date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 6 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}
	
 var d = new Date();
 var begin = new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear()));
 var end   =   new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear())+6*60*60*24*1000);


document.getElementById('week').innerHTML='Shift for week:'+(d.getWeek()+1)+'<span id="doshift"></span>';
dayAppendTo('dmon',dayNum(0));
dayAppendTo('dtue',dayNum(1));
dayAppendTo('dwed',dayNum(2));
dayAppendTo('dthu',dayNum(3));
dayAppendTo('dfri',dayNum(4));
dayAppendTo('dsat',dayNum(5));
dayAppendTo('dsun',dayNum(6));
document.getElementById('doshift').innerHTML=' From '+begin.getDate()+'-0'+(begin.getMonth()+1)+' To '+end.getDate()+'-0'+(end.getMonth()+1)+' / '+begin.getFullYear();




function firstDayOfWeek(week, year) { 

    if (year==null) {
        year = (new Date()).getFullYear();
    }

    var date       = firstWeekOfYear(year),
        weekTime   = weeksToMilliseconds(week),
        targetTime = date.getTime() + weekTime;

    return date.setTime(targetTime); 

}

function weeksToMilliseconds(weeks) {
    return 1000 * 60 * 60 * 24 * 7 * (weeks - 1);
}

function firstWeekOfYear(year) {
    var date = new Date();
    date = firstDayOfYear(date,year);
    date = firstWeekday(date);
    return date;
}

function firstDayOfYear(date, year) {
    date.setYear(year);
    date.setDate(1);
    date.setMonth(0);
    date.setHours(0);
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);
    return date;
}

/**
 * Sets the given date as the first day of week of the first week of year.
 */
function firstWeekday(firstOfJanuaryDate) {
    // 0 correspond au dimanche et 6 correspond au samedi.
    var FIRST_DAY_OF_WEEK = 1; // Monday, according to iso8601
    var WEEK_LENGTH = 7; // 7 days per week
    var day = firstOfJanuaryDate.getDay();
    day = (day === 0) ? 7 : day; // make the days monday-sunday equals to 1-7 instead of 0-6
    var dayOffset=-day+FIRST_DAY_OF_WEEK; // dayOffset will correct the date in order to get a Monday
    if (WEEK_LENGTH-day+1<4) {
        // the current week has not the minimum 4 days required by iso 8601 => add one week
        dayOffset += WEEK_LENGTH;
    }
    return new Date(firstOfJanuaryDate.getTime()+dayOffset*24*60*60*1000);
} 

function dayAppendTo(day,stri){

	document.getElementById(day).innerHTML=stri;
}

function  dayNum(num){

	var d = new Date();
	var db= new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear())+num*24*60*60*1000);
	return db.getDate()+'-0'+(db.getMonth()+1)+'-'+db.getFullYear();
}



</script>