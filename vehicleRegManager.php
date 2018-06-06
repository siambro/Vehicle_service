<?php
include 'core/initial.php';	
if(logged_in()==TRUE){
	if(isset($_POST['submit'])){
		$vType=$_POST['vType'];
		$vName=$_POST['vName'];
		$model=$_POST['model'];
		$engineNo=$_POST['engineNo'];
		$chassisNo=$_POST['chassisNo'];
		$userName=$_SESSION['userName'];	
		$connection=mysqli_connect("localhost","root","","car");
		$query="insert into vReg values('','$vType','$vName','$model','$engineNo','$chassisNo', '$userName')";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location: vehicleReg.php");
		}else{
			echo mysqli_error($connection);
		}
	}		
}			
?>