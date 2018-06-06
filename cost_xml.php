<?php
	include 'core/initial.php';
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		$query="SELECT * from costall where sp='s'";
		
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
			$sCharge=$doc->createElement("sCharge");
			$pNames=$doc->createElement("pNames");
			$pCost=$doc->createElement("pCost");
			$eCost=$doc->createElement("eCost");
			$total=$doc->createElement("total");
			$fID=$doc->createElement("fID");
			
			
			$cID->appendChild($doc->createTextNode($row["cID"]));
			$sCharge->appendChild($doc->createTextNode($row["sCharge"]));
			$pNames->appendChild($doc->createTextNode($row["pNames"]));
			$pCost->appendChild($doc->createTextNode($row["pCost"]));
			$eCost->appendChild($doc->createTextNode($row["eCost"]));
			$total->appendChild($doc->createTextNode($row["total"]));
			$fID->appendChild($doc->createTextNode($row["fID"]));
			
			
			$node->appendChild($cID );
			$node->appendChild($sCharge);
			$node->appendChild($pNames);
			$node->appendChild($pCost);
			$node->appendChild($eCost);
			$node->appendChild($total);
			$node->appendChild($fID);
			
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
	?>