<?php
	$con=mysqli_connect("localhost","root","","car");
	$cID=$_GET["cID"];
	$query="delete from costall where cID='$cID'";
	mysqli_query($con,$query);
	header('location: costforExtra.php?deleted');
?>