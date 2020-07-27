<!doctype html>
<html lang='en'>
	<head>
		<title>My Dream Alarm Clock</title>
		<meta charset='UFT-8' name='viewport' content='width=device-width, initial=scale=1.0' >
		<link rel='stylesheet' type='text/css' href='file'>
		
		<style>
		* {
	box-sizing: border-box;
}

html {
    padding-top:50px;
}



body {
    border: 8px solid tomato;
    border-radius: 20px;
    padding: 40px;
    width: 60%;
    height: 400px;
    margin: 0 auto;
    background-color:rgba(133,123,113,0.5);
}

#clock {
    height:120px;
    font-size: 40px;
    font-family: arial;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
  color: white;
}

h2 {
	text-align:center;
  

}

#alarm-container {
	text-align:center;
    font-family: Verdana;
    font-size: 0.6em;
    padding: 0.7em;
  color:tomatto;
}

label {
	display:inline-block;
}

.timeofday {
    background-color: #eee;
}

.bigger {
    font-weight:bold;
    font-size: 18px;
}

#sounds {
    text-align: center;
    padding-top: 20px;
}

#setButton {
    float:left;
    background-color:lightgreen;
    margin-top:10px;
    
}
#clearButton {
    float:right;
    background-color:red;
    margin-top:10px;
}



</style>
		
	</head>
	<body>
		<!--div id='main-container'>
			<h2 id='clock'></h2>
		</div>

		<div id='alarm-container'>
			<h3>Set Alarm Time</h3>
				<label>
					<div>
					<select id='alarmhrs' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmmins' ></select>
					</div>
				</label>
				<label>
					<div>
					<select id='alarmsecs' ></select>
					</div>
				</label>
				<label>
					<div>
						<select id="ampm">
							<option value="AM">AM</option>
							<option value="PM">PM</option>
						</select>
					</div>
				</label>
				</div>
		</div>

		<div id='buttonHolder'>
			<div>
				<button  id='setButton' onClick='alarmSet()'>Set Alarm</button>
			</div>

			<div>
				<button  id='clearButton' onClick='alarmClear()'>Stop Alarm </button>
			</div>
		</div>
<div-->
    
 
    
    
    
</div>
		<script type='text/javascript' >

var sound = new Audio("https://sunsecurities.pk/olpadoc/alarm.mp3");
		sound.loop = true;

var h2 = document.getElementById('clock');

// display current time by the second
var currentTime = setInterval(function(){
	var date = new Date();
	
	var hours = (12 - (date.getHours()));
	// var hours = date.getHours();
	
	var minutes = date.getMinutes();
	
	var seconds = date.getSeconds();
	
	var ampm = (date.getHours()) < 12 ? 'AM' : 'PM';


	//convert military time to standard time

	if (hours < 0) {
		hours = hours * -1;
	} else if (hours == 00) {
		hours = 12;
	} else {
		hours = hours;
	}

	
	h2.textContent = addZero(hours) + ":" + addZero(minutes) + ":" + addZero(seconds) + "" + ampm;
	
},1000);


/*functions to get hour, min, secs, 
  am or pm, add zero, set alarm time and sound, clear alarm
*/

function addZero(time) {

		return (time < 10) ? "0" + time : time;
	
}

function hoursMenu(){

	var select = document.getElementById('alarmhrs');
	var hrs = 12

	for (i=1; i <= hrs; i++) {
		select.options[select.options.length] = new Option( i < 10 ? "0" + i : i, i);
		
	}
}
hoursMenu();

function minMenu(){

	var select = document.getElementById('alarmmins');
	var min = 59;

	for (i=0; i <= min; i++) {
		select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i);
	}
}
minMenu();

function secMenu(){

	var select = document.getElementById('alarmsecs');
	var sec = 59;

	for (i=0; i <= sec; i++) {
		select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i);
	}
}
secMenu();


function alarmSet() {

	var hr = document.getElementById('alarmhrs');
	
	var min = document.getElementById('alarmmins');
	
	var sec = document.getElementById('alarmsecs');
	
	var ap = document.getElementById('ampm');
    

    var selectedHour = hr.options[hr.selectedIndex].value;
    var selectedMin = min.options[min.selectedIndex].value;
    var selectedSec = sec.options[sec.selectedIndex].value;
    var selectedAP = ap.options[ap.selectedIndex].value;

    var alarmTime = addZero(selectedHour) + ":" + addZero(selectedMin) + ":" + addZero(selectedSec) + selectedAP;
    console.log('alarmTime:' + alarmTime);

    document.getElementById('alarmhrs').disabled = true;
	document.getElementById('alarmmins').disabled = true;
	document.getElementById('alarmsecs').disabled = true;
	document.getElementById('ampm').disabled = true;


//when alarmtime is equal to currenttime then play a sound
	var h2 = document.getElementById('clock');

/*function to calcutate the current time 
then compare it to the alarmtime and play a sound when they are equal
*/

setInterval(function(){

	var date = new Date();
	
	var hours = (12 - (date.getHours()));
	// var hours = date.getHours();
	
	var minutes = date.getMinutes();
	
	var seconds = date.getSeconds();
	
	var ampm = (date.getHours()) < 12 ? 'AM' : 'PM';


	//convert military time to standard time

	if (hours < 0) {
		hours = hours * -1;
	} else if (hours == 00) {
		hours = 12;
	} else {
		hours = hours;
	}
	
	var currentTime = h2.textContent = addZero(hours) + ":" + addZero(minutes) + ":" + addZero(seconds) + "" + ampm;
	

	if (alarmTime == currentTime) {
		sound.play();
		}

},1000);


	// console.log('currentTime:' + currentTime);	

}


function alarmClear() {

	document.getElementById('alarmhrs').disabled = false;
	document.getElementById('alarmmins').disabled = false;
	document.getElementById('alarmsecs').disabled = false;
	document.getElementById('ampm').disabled = false;
	sound.pause();
}


</script>







    <p>Select your times:</p>

    <input type="checkbox" onclick="sound.play()" name="color" value="morning"> Morning
    <input type="checkbox" onclick="sound.play()" name="color" value="evening"> Evening
    <input type="checkbox" onclick="sound.play()" name="color" value="bedtime"> Bedtime
<input type="button" onclick="sound.pause()" value="Alarm Stop">
    <button id="btn">Get Selected Times</button>

    <script type='text/javascript'>function getSelectedCheckboxValues(name) {
    const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
    let values = [];
    checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
    });
    return values;
}

const btn = document.querySelector('#btn');
btn.addEventListener('click', (event) => {
    alert(getSelectedCheckboxValues('color'));
});



</script>


<form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
 

  <ul>
  <li>
    <input type="checkbox" id="check_1" name="techno[]" value="Morning">
    <label for="check_1">Morning</label>
 
  </li>
  <li>
    <input type="checkbox" id="check_2" name="techno[]" value="Evening">
    <label for="check_2">Evening</label>

  </li>
  <li>
    <input type="checkbox" id="check_3" name="techno[]" value="Bedtime">
    <label for="check_3">Bedtime</label>

  </li>
 <li><input type="submit" value="submit" name="sub">
 </li>
 </ul>
  
 
</div>  
</form>  


<script type='text/javascript'>


var sound = new Audio("https://sunsecurities.pk/olpadoc/alarm.mp3");
</script>

<?php 
include('hms/include/config.php'); 
if(isset($_POST['sub']))  
{  
$con;
$checkbox1=$_POST['techno'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"insert into tblpatient(PatientAlarm) values ('$chk')");  
if($in_ch==1)  
   {  
      echo '<script>alert("Alarm Sets Successfully!!!")</script>';  
   }  
else  
   {  
      echo '<script>alert("Failed To set alarm!!!!")</script>';  
   }  
}  
?>  

<style>ul {
  padding: 0;
  margin: 0;
  clear: both;
}

li{
  list-style-type: none;
  list-style-position: outside;
  padding: 10px;
  float: left;
}

input[type="checkbox"]:not(:checked), 
input[type="checkbox"]:checked {
  position: absolute;
  left: -9999%;
}

input[type="checkbox"] + label {
  display: inline-block;
  padding: 10px;
  cursor: pointer;
  border: 1px solid black;
  color: black;
  background-color: white;
  margin-bottom: 10px;
}

input[type="checkbox"]:checked + label {
  border: 1px solid white;
  color: white;
  background-color: black;
}</style>







	</body>
</html>