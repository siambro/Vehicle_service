<?php

include 'core/initial.php';

if(logged_in()==TRUE){

	if(isset($_POST['insert'])){
		$sCharge=1000;
		
		$ecost=0;
		$eCost=$ecost+$_POST['eCost'];
		$fID=$_POST['fID'];
		
		$parts=implode(', ',$_POST['parts']);
		$part=$_POST['parts'];
		$count = count($_POST['parts']);
		//$parts=$_POST['parts'];
		//print_r($count);exit;
		$con=mysqli_connect("localhost","root","","car");
		
		for($i=0; $i<$count; $i++){
			$query="select pPrice from parts where pName='$part[$i]'";
			
			$result= mysqli_query($con,$query);
			if($result){
				$row=mysqli_fetch_array($result);
			}
			$pPrice=$pPrice+$row['pPrice'];
		}
		$total = $sCharge + $pPrice + $eCost;
		$sp = 's';
		
		$connection=mysqli_connect("localhost","root","","car");
		$query="insert into costall values('','$sCharge','$parts','$pPrice','$eCost','$total','$fID','$sp')";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location: serviceCharge.php");
		}else{
			echo mysqli_error($connection);
		}
	}	
}			
?>