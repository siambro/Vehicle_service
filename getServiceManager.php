<?php

include 'core/initial.php';

	$vName=$_POST['vehicle'];
	$dateForServiceFrom=$_POST['dateForServiceFrom'];
	$dateForServiceTo=$_POST['dateForServiceTo'];
	$userName=$_SESSION['userName'];
	
		$con=mysqli_connect("localhost","root","","car");
		$query="insert into services values('','$vName','$dateForServiceFrom','$dateForServiceTo', NOW(), NOW(),'$userName')";
		$result=mysqli_query($con,$query);
		if($result){
			header("location:getService.php?scheduleRequestedFor='$vName'");
		}else{
			echo mysqli_error($con);
		}
			
?>