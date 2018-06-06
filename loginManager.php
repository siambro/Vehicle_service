<?php
	include 'core/initial.php';

	$connection = mysqli_connect("localhost", "root", "", "car");
	
	if(isset($_POST['login'])){
		
		$userName = mysqli_real_escape_string($connection, $_POST['userName']);
		$password = mysqli_real_escape_string($connection, $_POST['pass']);
		
		$query2= "select * from creg where userName = '".$userName."' and password = '" .$password. "'";
		
		$result2 = mysqli_query($connection, $query2);
		
		if(mysqli_fetch_array($result2)){
			$_SESSION['login'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['password'] = $password;
			
			header('location: services.php');
		}else{
			header('location: login.php?error1');
		}
		
	}
	
?>