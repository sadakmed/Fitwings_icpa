<?php 
require_once 'view/header.php';
?>


<div id="modal" style="display: hidden;">
<div class="bs-example col-sm-6">
    <form>
        <div class="col-sm-">
        	<fieldset>
        		<legend style="text-align: center; font-weight: bold;" id='week'>Shift Week:</legend>
        	
        	 <div class="col-sm-4">
                <div class="input-group"> 
           <label>Tech:</label>
                   <select id="tech" class="form-control">
                   	 <option>-------</option>
                   	 <option>Said</option>
                   	 <option>Hamid</option>
                   	 <option>Nacir</option>
                   	 <option>Rafik</option>
                   </select>
                </div>
             </div>
            
             

                <div class="col-sm-6">
            <div class="row"><div class="col-sm-4">
                <div class="input-group"> 
           <label>Mon:<span id="dmon"></span></label>
                   <select id="mon" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                </div></div>
                <div class="col-sm-4">
                <div class="input-group"> 
           <label>Tue:<span id="dtue"></span></label>
                   <select id="tue" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                </div></div>
            </div> 


          <div class="row"><div class="col-sm-4">
                <div class="input-group"> 
                  <label>Wed:<span id="dwed"></span></label>
                    <select id="wed" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                
            </div>
            </div>
            <div class="col-sm-4">
            
                <div class="input-group">
   
                	<label>Thu:<span id="dthu"></span></label>
                  <select id="thu" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
            </div>
            </div>

           
        </div>
          <div class="row"><div class="col-sm-4">
                <div class="input-group"> 
                  <label>Fri:<span id="dfri"></span></label>
                    <select id="" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
                
            </div>
            </div>
            <div class="col-sm-4">
            
                <div class="input-group">
   
                	<label>sat:<span id="dsat"></span></label>
                  <select id="" class="form-control">
                   	 <option>AM</option>
                   	 <option>PM</option>
                   	 <option>NGHT</option>
                   	 <option>NRM</option>

                   </select>
            </div>
            </div>

           
        </div> <div class="row"><div class="col-sm-4">
                <div class="input-group"> 
                  <label>Sun:<span id="dsun"></span></label>
                    <select id="" class="form-control">
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
               <button class="btn btn-default">Submit</button>
            </div>
            </div>
  
          <br>
          <br>
</fieldset>
    
    </form>
    <hr>
  
</div> 
<script type="text/javascript">
	Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
   date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 4 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}
	
 var d = new Date();
 var begin = new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear()));
 var end = new Date(firstDayOfWeek(d.getWeek()+1,d.getFullYear())+6*60*60*24*1000);
 //var l=b.split(' ');

document.getElementById('week').innerHTML='Shift for week:'+(d.getWeek()+1)+'<span id="doshift"></span>';
dayAppendTo('dmon',dayNum(0));
dayAppendTo('dtue',dayNum(1));
dayAppendTo('dwed',dayNum(2));
dayAppendTo('dthu',dayNum(3));
dayAppendTo('dfri',dayNum(4));
dayAppendTo('dsat',dayNum(5));
dayAppendTo('dsun',dayNum(6));
document.getElementById('doshift').innerHTML=' From '+begin.getDate()+'-0'+(begin.getMonth()+1)+' To '+end.getDate()+'-0'+(end.getMonth()+1);




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
	return db.getDate()+'-0'+(db.getMonth()+1);
}




</script>