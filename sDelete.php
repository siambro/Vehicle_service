<?php
	$con=mysqli_connect("localhost","root","","car");
	$sID=$_GET["sID"];
	$query="delete from services where sID='$sID'";
	mysqli_query($con,$query);
	header('location: getService.php?deleted');
?>