<?php
	
	include 'core/initial.php';
	
	header('Content-Type:text/xml;charset=utf-8');
	$host="localhost";
	$user="root";
	$pass="";
	$database="car";
	
	
	
	if(logged_in()=== true){
		$con=mysqli_connect($host,$user,$pass,$database);
		//$query="SELECT * from feedback";
		$uquery="select sID from services where username='".$_SESSION['userName']."'";
		$result= mysqli_query($con,$uquery);
        if($result){
            $row=mysqli_fetch_array($result);
        }
        $sID=$row['sID'];
		
		$query="SELECT * from feedback where sID='".$sID."'";
		
		$ret=mysqli_query($con,$query);
		$num_results=mysqli_num_rows($ret);
		$doc=new DOMDocument();
		$doc->formatOutput=TRUE;
		$root=$doc->createElement("all_information");
		$doc->appendChild($root);
		for($i=0;$i<$num_results;$i++){
			$row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
			$node=$doc->createElement("information");
			$fID=$doc->createElement("fID");
			$dateForService=$doc->createElement("dateForService");
			$timeForService=$doc->createElement("timeForService");
			$sID=$doc->createElement("sID");
			$fdate=$doc->createElement("fdate");
			$ftime=$doc->createElement("ftime");
			
			
			$fID->appendChild($doc->createTextNode($row["fID"]));
			$dateForService->appendChild($doc->createTextNode($row["dateForService"]));
			$timeForService->appendChild($doc->createTextNode($row["timeForService"]));
			$sID->appendChild($doc->createTextNode($row["sID"]));
			$fdate->appendChild($doc->createTextNode($row["fdate"]));
			$ftime->appendChild($doc->createTextNode($row["ftime"]));
			
			
			$node->appendChild($fID );			
			$node->appendChild($dateForService);
			$node->appendChild($timeForService);
			$node->appendChild($sID);
			$node->appendChild($fdate);
			$node->appendChild($ftime);
			
			
			$root->appendChild($node);
			
		}
		echo $doc->SaveXML();
	}	
	?>