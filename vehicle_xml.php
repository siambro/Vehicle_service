<?php
	
	include 'core/initial.php';
	
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		$query="SELECT * from vReg where userName='".$_SESSION['userName']."'";
		//$query="SELECT * from vReg";
		$ret=mysqli_query($con,$query);
		$num_results=mysqli_num_rows($ret);
		$doc=new DOMDocument();
		$doc->formatOutput=TRUE;
		$root=$doc->createElement("all_information");
		$doc->appendChild($root);
		for($i=0;$i<$num_results;$i++){
			$row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
			$node=$doc->createElement("information");
			$vID=$doc->createElement("vID");
			$vType=$doc->createElement("vType");
			$vName=$doc->createElement("vName");
			$model=$doc->createElement("model");
			$engineNo=$doc->createElement("engineNo");
			$chassisNo=$doc->createElement("chassisNo");
			$userName=$doc->createElement("userName");
			
			$vID->appendChild($doc->createTextNode($row["vID"]));
			$vType->appendChild($doc->createTextNode($row["vType"]));
			$vName->appendChild($doc->createTextNode($row["vName"]));
			$model->appendChild($doc->createTextNode($row["model"]));
			$engineNo->appendChild($doc->createTextNode($row["engineNo"]));
			$chassisNo->appendChild($doc->createTextNode($row["chassisNo"]));
			$userName->appendChild($doc->createTextNode($row["userName"]));
			
			$node->appendChild($vID );
			$node->appendChild($vType);
			$node->appendChild($vName);
			$node->appendChild($model);
			$node->appendChild($engineNo);
			$node->appendChild($chassisNo);
			$node->appendChild($userName);
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
	?>