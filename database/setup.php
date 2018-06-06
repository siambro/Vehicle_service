<?php

	$con=mysqli_connect("localhost","root","");
	
	$query="drop database if exists car";
	if(mysqli_query($con,$query)) echo "Database dropped<br/>";
	else echo mysqli_error($con);
	
	$query="create database car";
	if(mysqli_query($con,$query)) echo "Database created<br/>";
	else echo mysqli_error($con);
	
	$con=mysqli_connect("localhost","root","","car");
	
	$query="CREATE TABLE `cReg` (		
		  `name` varchar(30) NOT NULL,
		  `email` varchar(30) NOT NULL,
		  `address` varchar(100) NOT NULL,
		  `city` varchar(30) NOT NULL,
		  `zip` varchar(30) NOT NULL,
		  `phone` varchar(30) NOT NULL,
		  
		  `userName` varchar(30) NOT NULL Primary Key,
		  `password` varchar(30) NOT NULL,
		  `admin` int(1)
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Customer Registration Table Created<br/>";
	else echo mysqli_error($con);
	
	$query="insert into `cReg` values ('siam','localmail00@gmail.com', '62/b', 'Dhaka', 'CB7', '1730176622', 'mun', 'Mhs123','1')";
	if(mysqli_query($con,$query)) echo "Admin successfully inserted <br>";
	else echo mysqli_error($con);
	
	$query1="insert into `cReg` values ('siam','muntasirhasan32@gmail.com', '62/b', 'Dhaka', 'CB7', '01730176622', 'siam', 'Mhs123','')";
	if(mysqli_query($con,$query1)) echo "Customer successfully inserted <br>";
	else echo mysqli_error($con);
	
	$query="CREATE TABLE `vReg` (
	
		  `vID` int(11) auto_increment Primary Key,
		  `vType` varchar(30) NOT NULL,
		  `vName` varchar(30) NOT NULL,
		  `model` varchar(100) NOT NULL,
		  `engineNo` varchar(30) NOT NULL,
		  `chassisNo` varchar(30) NOT NULL,
		  `userName` varchar(30) NOT NULL
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Vehicle Registration Table Created<br/>";
	else echo mysqli_error($con);
	
	
	$query="CREATE TABLE `parts` (
	
		  `pID` int(11) auto_increment Primary Key,
		  `pName` varchar(30) NOT NULL,
		  `pPrice` varchar(100) NOT NULL
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Parts Table Created<br/>";
	else echo mysqli_error($con);
	
	
	$query="CREATE TABLE `services` (
	
		  `sID` int(11) auto_increment Primary Key,
		  `vName` varchar(30) NOT NULL,
		  `dateForServiceFrom` varchar(30) NOT NULL,
		  `dateForServiceTo` varchar(30) NOT NULL,
		  `bookingdate` date,
		  `bookingtime` time,
		  `userName` varchar(30) NOT NULL
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Service Table Created<br/>";
	else echo mysqli_error($con);
	
	
	$query="CREATE TABLE `feedback` (
	
		  `fID` int(11) auto_increment Primary Key,
		  `dateForService` varchar(30) NOT NULL,
		  `timeForService` varchar(30) NOT NULL,
		  `sms` varchar(1000) NOT NULL,
		  `fdate` date,
		  `ftime` time,
		  `sID` int(11) NOT NULL
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Feedback Table Created<br/>";
	else echo mysqli_error($con);
	
	
	$query="CREATE TABLE `costall` (
	
		  `cID` int(11) auto_increment Primary Key,
		  `sCharge` varchar(30) NOT NULL,
		  `pNames` varchar(100) NOT NULL,
		  `pCost` varchar(30) NOT NULL,
		  `eCost` varchar(30) NOT NULL,
		  `total` varchar(30) NOT NULL,
		  `fID` int(11) NOT NULL,
		  `sp` varchar(1) NOT NULL
		  ) ";
	
	if(mysqli_query($con,$query)) echo "Cost Table Created<br/>";
	else echo mysqli_error($con);
	
	
?>