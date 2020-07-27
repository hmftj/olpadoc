<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$cnic=$_POST['cnic'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$mobile=$_POST['mobile'];
$bloodgroup=$_POST['bloodgroup'];
$age=$_POST['age'];
$medhis=$_POST['medhis'];

$query=mysqli_query($con,"insert into users(fullName,address,cnic,mobile,city,gender,email,password) values('$fname','$address','$cnic','$mobile','$city','$gender','$email','$password')");


$sql=mysqli_query($con,"insert into tblpatient(PatientName,PatientAdd,PatientContno,PatientGender,PatientCnic,PatientMedhis,PatientEmail,PatientAge,PatientBloodGroup) values('$fname','$address','$mobile','$gender','$cnic','$medhis','$email','$age','$bloodgroup')");
if($sql)
{

header('location:doctor/add-patient.php');

}


if($query)
{ 
	echo "<script>alert('Successfully Registered. You can login now');</script>";
header('location:user-login.php');
}




}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<style>input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2>OLPADOC | Patient Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" onkeypress="return /[a-z]/i.test(event.key)" required>
							</div>
							
							<div class="form-group">
							    <span  class="input-icon">
								<input id="cnic" type="number" class="form-control" name="cnic"  placeholder="35201322323324" onBlur="userAvailabilitycnic()"  required><i class="fa fa-user" ></i> </span>
									 <span id="user-availability-status3" style="font-size:12px;"></span>
							</div>	<script>
function userAvailabilitycnic() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilitycnic.php",
data:'cnic='+$("#cnic").val(),
type: "POST",
success:function(data){
$("#user-availability-status3").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
							
								<div class="form-group">
								<input type="number" class="form-control" name="age" placeholder="age:17 years" required>
							</div>
								<div class="form-group">
								<input type="text" class="form-control" name="medhis" placeholder="Medical History" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female">
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<div class="form-group">
<label for="bloodgroup">
Blood Group
</label>
<select name="bloodgroup" class="form-control" required="required" >
<option value="<?php echo htmlentities($data['bloodgroup']);?>"><?php echo htmlentities($data['bloodgroup']);?></option>
<option value="O+ve">O+ve</option>
<option value="A+ve">A+ve</option>
<option value="B+ve">B+ve</option>
<option value="AB+ve">AB+ve</option>
<option value="O-ve">O-ve</option>
<option value="A-ve">A-ve</option>
<option value="B-ve">B-ve</option>
<option value="AB-ve">AB-ve</option>
<option value="None">None</option>
</select>
</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span  class="input-icon">
									<input id="email" type="email" class="form-control" name="email"  onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							
									<div class="form-group">
								<span  class="input-icon">
									<input  id="mobile" type="number" class="form-control" name="mobile"  onBlur="userAvailabilitymobile()"  placeholder="mobile" required>
									<i class="fa fa-mobile"></i> </span>
									 <span id="user-availability-status2" style="font-size:12px;"></span>
							</div>			<script>
function userAvailabilitymobile() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilitymobile.php",
data:'mobile='+$("#mobile").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
							
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" minlength="6" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>






					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> OLPADOC</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	


	</body>
	<!-- end: BODY -->
</html>