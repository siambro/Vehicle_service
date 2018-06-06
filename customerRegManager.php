<?php

include 'core/initial.php';

	$name=$_POST['txtname'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$zip=$_POST['zip'];
	$phone=$_POST['phone'];
	
	$userName=$_POST['userName'];
	$password=$_POST['pass'];
	$confirmPassword=$_POST['cpass'];
		
		if($password==$confirmPassword){
			$con=mysqli_connect("localhost","root","","car");
			$query="select userName from cReg where userName='$userName'";
			$result=mysqli_query($con,$query);
			$num=mysqli_num_rows($result);
			if($num==0){
				$query="insert into cReg values('$name','$email','$address','$city','$zip','$phone','$userName','$password','')";
				$result=mysqli_query($con,$query);
				if($result){
					header("location:login.php");
				}
			}
			else{
				header ("location: customerReg.php?error1=true");
			}
		}
		else{
			header ("location: customerReg.php?error2=true");	
		}
?>