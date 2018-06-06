<?php
	$con=mysqli_connect("localhost","root","","car");
	$pID=$_GET["pID"];
	$query="delete from parts where pID='$pID'";
	mysqli_query($con,$query);
	header('location: parts_admin.php?deleted');
?>