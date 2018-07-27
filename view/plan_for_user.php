<div class="col-sm-9">
	<div class="col-sm-offset-3">
		<table id="show_site" class="table table-bordered" style="background-color: white;">
			<thead>
				<th>Region</th>
				<th>City</th>
				<th>Site</th>
				<th></th>
			</thead>
<tbody >
	<?php 
        require_once 'model/connect.php';
       try {

        $pdostmt=$pdo->query('select * from sites');
        $result=$pdostmt->fetchAll(PDO::FETCH_ASSOC);
       
        foreach ($result as $key => $value) {
        
      echo "<tr><td>".$value['region']."</td><td>".$value['ville']."</td><td id='".$value['idsite']."'>".$value['name']."</td>
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
		<div id="myModal" class="modal" style="display: ;"><div class="">
<div class="col-sm-12">
    <div class="model-content" style="background-color: #fefefe;margin: auto; padding: 20px;border: 1px solid #888;">
        <div class="">
        	    <span class="close">&times;</span>
        	<fieldset>

        		
        		<legend style="text-align: center; font-weight: bold;" id='week'>Shift Week:</legend>
        	
        	 <div class="col-sm-2">
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
            
             

                <?php   require 'include/week1.php'; ?>
                <?php   require 'include/week2.php'; ?>
                <?php   require 'include/week3.php'; ?>



<br>
<br>
<br>
 
<div   style="margin-top: 20px;" >
<div   class="col-sm-offset-5" >
	<br>

<br>
                <?php   require 'include/week4.php'; ?>

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
 console.log(site);
   });



   $('button#sub').on('click',function(){
  site=site;

var $tech=$('#tech').find(':selected').text(); 


  if($tech==='-----'){
  	alert('please select a tech !!!!!');
  	 
  }else{


//week 1
var $mon1 = $('#mon1').find(':selected').text(); 
var $dmon1= $('#dmon1').text();

var $tue1 = $('#tue1').find(':selected').text(); 
var $dtue1= $('#dtue1').text();

var $wed1 = $('#wed1').find(':selected').text(); 
var $dwed1= $('#dwed1').text();

var $thu1 = $('#thu1').find(':selected').text(); 
var $dthu1= $('#dthu1').text();

var $fri1 = $('#fri1').find(':selected').text(); 
var $dfri1= $('#dfri1').text();

var $sat1 = $('#sat1').find(':selected').text(); 
var $dsat1= $('#dsat1').text();

var $sun1 = $('#sun1').find(':selected').text(); 
var $dsun1= $('#dsun1').text();

//week2

var $mon2= $('#mon2').find(':selected').text(); 
var $dmon2=$('#dmon2').text();

var $tue2= $('#tue2').find(':selected').text(); 
var $dtue2=$('#dtue2').text();

var $wed2= $('#wed2').find(':selected').text(); 
var $dwed2=$('#dwed2').text();

var $thu2= $('#thu2').find(':selected').text(); 
var $dthu2=$('#dthu2').text();

var $fri2= $('#fri2').find(':selected').text(); 
var $dfri2=$('#dfri2').text();

var $sat2= $('#sat2').find(':selected').text(); 
var $dsat2=$('#dsat2').text();

var $sun2= $('#sun2').find(':selected').text(); 
var $dsun2=$('#dsun2').text();


//week3

var $mon3= $('#mon3').find(':selected').text(); 
var $dmon3=$('#dmon3').text();

var $tue3= $('#tue3').find(':selected').text(); 
var $dtue3=$('#dtue3').text();

var $wed3= $('#wed3').find(':selected').text(); 
var $dwed3=$('#dwed3').text();

var $thu3= $('#thu3').find(':selected').text(); 
var $dthu3=$('#dthu3').text();

var $fri3= $('#fri3').find(':selected').text(); 
var $dfri3=$('#dfri3').text();

var $sat3= $('#sat3').find(':selected').text(); 
var $dsat3=$('#dsat3').text();

var $sun3= $('#sun3').find(':selected').text(); 
var $dsun3=$('#dsun3').text();

//week4

var $mon4= $('#mon4').find(':selected').text(); 
var $dmon4=$('#dmon4').text();

var $tue4= $('#tue4').find(':selected').text(); 
var $dtue4=$('#dtue4').text();

var $wed4= $('#wed4').find(':selected').text(); 
var $dwed4=$('#dwed4').text();

var $thu4= $('#thu4').find(':selected').text(); 
var $dthu4=$('#dthu4').text();

var $fri4= $('#fri4').find(':selected').text(); 
var $dfri4=$('#dfri4').text();

var $sat4= $('#sat4').find(':selected').text(); 
var $dsat4=$('#dsat4').text();

var $sun4= $('#sun4').find(':selected').text(); 
var $dsun4=$('#dsun4').text();
  var $site=site;
  console.log($site);
$.ajax({url:'view/storeShift.php',
	    data:{site:$site,tech:$tech,
	    	  mon1:$mon1,dmon1:$dmon1,
	          tue1:$tue1,dtue1:$dtue1,
	          wed1:$wed1,dwed1:$dwed1,
	          fri1:$fri1,dfri1:$dfri1,
	          thu1:$thu1,dthu1:$dthu1,
	          sat1:$sat1,dsat1:$dsat1,
	          sun1:$sun1,dsun1:$dsun1,

	          mon2:$mon2,dmon2:$dmon2,
	          tue2:$tue2,dtue2:$dtue2,
	          wed2:$wed2,dwed2:$dwed2,
	          fri2:$fri2,dfri2:$dfri2,
	          thu2:$thu2,dthu2:$dthu2,
	          sat2:$sat2,dsat2:$dsat2,
	          sun2:$sun2,dsun2:$dsun2,

	          mon3:$mon3,dmon3:$dmon3,
	          tue3:$tue3,dtue3:$dtue3,
	          wed3:$wed3,dwed3:$dwed3,
	          fri3:$fri3,dfri3:$dfri3,
	          thu3:$thu3,dthu3:$dthu3,
	          sat3:$sat3,dsat3:$dsat3,
	          sun3:$sun3,dsun3:$dsun3,

	          mon4:$mon4,dmon4:$dmon4,
	          tue4:$tue4,dtue4:$dtue4,
	          wed4:$wed4,dwed4:$dwed4,
	          fri4:$fri4,dfri4:$dfri4,
	          thu4:$thu4,dthu4:$dthu4,
	          sat4:$sat4,dsat4:$dsat4,
	          sun4:$sun4,dsun4:$dsun4 },
	    type:'post',
	    success:function(result){ 
 console.log(result);
 }, 
error:function(result){

 console.log('noo');

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

 var d2 = new Date();
 var d3 = new Date();
 var d4 = new Date();
 var begin = new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear()));
 var end   =   new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear())+6*60*60*24*1000);


document.getElementById('week').innerHTML='Shift for weeks:'+(weektime(0)+' .. '+weektime(21))+'<span id="doshift"></span>';

document.getElementById('week1').innerHTML='Week:'+(weektime(0))+'<span id="doshift1"></span>';

document.getElementById('week2').innerHTML='Week:'+(weektime(7))+'<span id="doshift2"></span>';

document.getElementById('week3').innerHTML='Week:'+(weektime(14))+'<span id="doshift3"></span>';

document.getElementById('week4').innerHTML='Week:'+(weektime(21))+'<span id="doshift4"></span>';

dayAppendTo('dmon1',dayNum(0));
dayAppendTo('dtue1',dayNum(1));
dayAppendTo('dwed1',dayNum(2));
dayAppendTo('dthu1',dayNum(3));
dayAppendTo('dfri1',dayNum(4));
dayAppendTo('dsat1',dayNum(5));
dayAppendTo('dsun1',dayNum(6));

dayAppendTo('dmon2',dayNum(7));
dayAppendTo('dtue2',dayNum(8));
dayAppendTo('dwed2',dayNum(9));
dayAppendTo('dthu2',dayNum(10));
dayAppendTo('dfri2',dayNum(11));
dayAppendTo('dsat2',dayNum(12));
dayAppendTo('dsun2',dayNum(13));

dayAppendTo('dmon3',dayNum(14));
dayAppendTo('dtue3',dayNum(15));
dayAppendTo('dwed3',dayNum(16));
dayAppendTo('dthu3',dayNum(17));
dayAppendTo('dfri3',dayNum(18));
dayAppendTo('dsat3',dayNum(19));
dayAppendTo('dsun3',dayNum(20));

dayAppendTo('dmon4',dayNum(21));
dayAppendTo('dtue4',dayNum(22));
dayAppendTo('dwed4',dayNum(23));
dayAppendTo('dthu4',dayNum(24));
dayAppendTo('dfri4',dayNum(25));
dayAppendTo('dsat4',dayNum(26));
dayAppendTo('dsun4',dayNum(27));

document.getElementById('doshift').innerHTML=' From '+dayNum(0)+' To '+dayNum(21);




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

function weektime(num){

	var d = new Date();
	var db= new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear())+num*24*60*60*1000);
	return db.getWeek();
}



</script>