<?php
	include 'core/initial.php';
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		$query="SELECT * from costall where sp = 'p'";
		
		$ret=mysqli_query($con,$query);
		$num_results=mysqli_num_rows($ret);
		$doc=new DOMDocument();
		$doc->formatOutput=TRUE;
		$root=$doc->createElement("all_information");
		$doc->appendChild($root);
		for($i=0;$i<$num_results;$i++){
			$row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
			$node=$doc->createElement("information");
			
			$cID=$doc->createElement("cID");
			$pNames=$doc->createElement("pNames");
			$eCost=$doc->createElement("eCost");
			$total=$doc->createElement("total");
			
			$cID->appendChild($doc->createTextNode($row["cID"]));
			$pNames->appendChild($doc->createTextNode($row["pNames"]));
			$eCost->appendChild($doc->createTextNode($row["eCost"]));
			$total->appendChild($doc->createTextNode($row["total"]));
			
			$node->appendChild($cID );
			$node->appendChild($pNames);
			$node->appendChild($eCost);
			$node->appendChild($total);
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
?>