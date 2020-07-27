<?php 
include_once('include/config.php');
if(!empty($_POST['cnic'])) {



	$cnic= $_POST['cnic'];

	
		$result =mysqli_query($con,"SELECT * FROM users WHERE cnic='$cnic'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> CNIC already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
else{
	
	echo "<span style='color:green'> CNIC available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>