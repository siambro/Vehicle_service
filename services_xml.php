<?php
	
	include 'core/initial.php';
	
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		$query="SELECT * from services where userName='".$_SESSION['userName']."'";
		
		$ret=mysqli_query($con,$query);
		$num_results=mysqli_num_rows($ret);
		$doc=new DOMDocument();
		$doc->formatOutput=TRUE;
		$root=$doc->createElement("all_information");
		$doc->appendChild($root);
		for($i=0;$i<$num_results;$i++){
			$row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
			$node=$doc->createElement("information");
			$sID=$doc->createElement("sID");
			$vName=$doc->createElement("vName");
			$dateForServiceFrom=$doc->createElement("dateForServiceFrom");
			$dateForServiceTo=$doc->createElement("dateForServiceTo");
			$userName=$doc->createElement("userName");
			$bookingdate=$doc->createElement("bookingdate");
			$bookingtime=$doc->createElement("bookingtime");
			
			
			$sID->appendChild($doc->createTextNode($row["sID"]));
			$vName->appendChild($doc->createTextNode($row["vName"]));
			$dateForServiceFrom->appendChild($doc->createTextNode($row["dateForServiceFrom"]));
			$dateForServiceTo->appendChild($doc->createTextNode($row["dateForServiceTo"]));
			$userName->appendChild($doc->createTextNode($row["userName"]));
			$bookingdate->appendChild($doc->createTextNode($row["bookingdate"]));
			$bookingtime->appendChild($doc->createTextNode($row["bookingtime"]));
			
			
			$node->appendChild($sID );
			$node->appendChild($vName);
			$node->appendChild($dateForServiceFrom);
			$node->appendChild($dateForServiceTo);
			$node->appendChild($userName);
			$node->appendChild($bookingdate);
			$node->appendChild($bookingtime);
			
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
	?>