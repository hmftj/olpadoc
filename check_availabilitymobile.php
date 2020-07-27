<?php 
include_once('include/config.php');
if(!empty($_POST['mobile'])) {



	$email= $_POST['mobile'];

	
		$result =mysqli_query($con,"SELECT * FROM users WHERE mobile='$mobile'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Mobile already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>Mobile available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>