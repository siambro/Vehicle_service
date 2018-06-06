<?php

include 'core/initial.php';

	
if(logged_in()==TRUE){

	if(isset($_POST['insert'])){
		$pName=$_POST['pName'];
		$pPrice=$_POST['pPrice'];
		
		
		$connection=mysqli_connect("localhost","root","","car");
		$query="insert into parts values('','$pName','$pPrice')";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location: parts_admin.php");
		}else{
			echo mysqli_error($connection);
		}
	}
		
		
}		
		
?>