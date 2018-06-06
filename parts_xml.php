<?php
	
	include 'core/initial.php';
	
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		$query="SELECT * from parts";
		
		$ret=mysqli_query($con,$query);
		$num_results=mysqli_num_rows($ret);
		$doc=new DOMDocument();
		$doc->formatOutput=TRUE;
		$root=$doc->createElement("all_information");
		$doc->appendChild($root);
		for($i=0;$i<$num_results;$i++){
			$row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
			$node=$doc->createElement("information");
			$pID=$doc->createElement("pID");
			$pName=$doc->createElement("pName");
			$pPrice=$doc->createElement("pPrice");
			
			
			$pID->appendChild($doc->createTextNode($row["pID"]));
			$pName->appendChild($doc->createTextNode($row["pName"]));
			$pPrice->appendChild($doc->createTextNode($row["pPrice"]));
			
			
			$node->appendChild($pID );
			$node->appendChild($pName);
			$node->appendChild($pPrice);
			
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
	?>