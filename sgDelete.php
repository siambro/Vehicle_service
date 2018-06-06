<?php
	$con=mysqli_connect("localhost","root","","car");
	$fID=$_GET["fID"];
	$query="delete from feedback where fID='$fID'";
	mysqli_query($con,$query);
	header('location: servicesGiven.php?deleted');
?>