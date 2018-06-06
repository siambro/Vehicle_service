<?php
	$con=mysqli_connect("localhost","root","","car");
	$vID=$_GET["vID"];
	$query="delete from vreg where vID='$vID'";
	mysqli_query($con,$query);
	header('location: vehicleReg.php?deleted');
?>