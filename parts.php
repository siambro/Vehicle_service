<?php
include 'core/initial.php';
protect_page();
include 'interface/header.php';

?>

<div class="container" id="midDiv">
	
	<div class="panel panel-default" align="center">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong><h1>Parts Information</h1></strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","parts_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				
				document.write("<th>ID</th>");
				document.write("<th>Parts Name</th>");
				document.write("<th>Parts Price</th>");
				
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				//alert(x);
				for(i=0;i<x.length;i++){
					pID=x[i].getElementsByTagName("pID")[0].childNodes[0].nodeValue;
					pName=x[i].getElementsByTagName("pName")[0].childNodes[0].nodeValue;
					pPrice=x[i].getElementsByTagName("pPrice")[0].childNodes[0].nodeValue;		
					
					document.write("<tr>");
					
					document.write("<td>"+pID+"</td>");
					document.write("<td>"+pName+"</td>");
					document.write("<td>"+pPrice+"</td>");
			
					document.write("</tr>");
				}
				
				
				document.write("</table>");
		
		</script>
	</div>
	
</div>


<?php
include 'interface/footer.php';
?>
