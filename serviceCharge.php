<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv-adminReg">
	
	
	<div class="panel panel-default" align="center">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong><h1>Cost Information<h1/></strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","cost_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				document.write("<th>ID</th>");
				document.write("<th>Service Charge</th>");
				document.write("<th>Parts Names</th>");
				document.write("<th>Parts Cost</th>");
				document.write("<th>Extra Cost</th>");
				document.write("<th>Total Cost</th>");
				document.write("<th>Feedback ID</th>");
				
				document.write("<th colspan=2>Operation</th>");
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				
				for(i=0;i<x.length;i++){
					cID=x[i].getElementsByTagName("cID")[0].childNodes[0].nodeValue;
					sCharge=x[i].getElementsByTagName("sCharge")[0].childNodes[0].nodeValue;
					pNames=x[i].getElementsByTagName("pNames")[0].childNodes[0].nodeValue;
					pCost=x[i].getElementsByTagName("pCost")[0].childNodes[0].nodeValue;		
					eCost=x[i].getElementsByTagName("eCost")[0].childNodes[0].nodeValue;		
					total=x[i].getElementsByTagName("total")[0].childNodes[0].nodeValue;		
					fID=x[i].getElementsByTagName("fID")[0].childNodes[0].nodeValue;		
					
					document.write("<tr>");
					document.write("<td>"+cID+"</td>");
					document.write("<td>"+sCharge+"</td>");
					document.write("<td>"+pNames+"</td>");
					document.write("<td>"+pCost+"</td>");
					document.write("<td>"+eCost+"</td>");
					document.write("<td>"+total+"</td>");
					document.write("<td>"+fID+"</td>");
				
					document.write("<td><a href='cEdit.php?cID="+cID+"'>Edit</a></td>");
					document.write("<td><a href='cDelete.php?cID="+cID+"'>Delete</a></td>");
					document.write("</tr>");
				}
				
				
				document.write("</table>");
		
		</script>
	</div>
	

	
</div>


<?php
include 'interface/footer.php';
?>
