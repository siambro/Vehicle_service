<?php
	include 'core/initial.php';

	$connection = mysqli_connect("localhost", "root", "", "car");
	
	if(isset($_POST['login'])){
		
		$userName = mysqli_real_escape_string($connection, $_POST['userName']);
		$password = mysqli_real_escape_string($connection, $_POST['pass']);
		$query1= "select * from creg where userName = '".$userName."' and password = '" .$password. "' and admin = 1";
		
		$result1 = mysqli_query($connection, $query1);
		
		if(mysqli_fetch_array($result1)){
			$_SESSION['login'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['password'] = $password;
			
			header('location: index_admin.php');
		}else{
			header('location: login_admin.php?error=1');
		}
		
	}
	
	
?>