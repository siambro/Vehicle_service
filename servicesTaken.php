<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv">
	
	<div class="panel panel-default" align="center">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong><h1>Service Information</h1></strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","servicesAdmin_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				
				document.write("<th>ServiceID</th>");
				document.write("<th>Vehicle Name</th>");
				document.write("<th>Date From</th>");
				document.write("<th>To</th>");
				document.write("<th>Username</th>");
				document.write("<th>Date</th>");
				document.write("<th>Time</th>");
				document.write("<th>Feedback</th>");
				
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				
				for(i=0;i<x.length;i++){
					sID=x[i].getElementsByTagName("sID")[0].childNodes[0].nodeValue;
					vName=x[i].getElementsByTagName("vName")[0].childNodes[0].nodeValue;
					dateForServiceFrom=x[i].getElementsByTagName("dateForServiceFrom")[0].childNodes[0].nodeValue;		
					dateForServiceTo=x[i].getElementsByTagName("dateForServiceTo")[0].childNodes[0].nodeValue;		
					userName=x[i].getElementsByTagName("userName")[0].childNodes[0].nodeValue;		
					bookingdate=x[i].getElementsByTagName("bookingdate")[0].childNodes[0].nodeValue;		
					bookingtime=x[i].getElementsByTagName("bookingtime")[0].childNodes[0].nodeValue;		
					
					document.write("<tr>");
					
					document.write("<td>"+sID+"</td>");
					document.write("<td>"+vName+"</td>");
					document.write("<td>"+dateForServiceFrom+"</td>");
					document.write("<td>"+dateForServiceTo+"</td>");
					document.write("<td>"+userName+"</td>");
					document.write("<td>"+bookingdate+"</td>");
					document.write("<td>"+bookingtime+"</td>");
					
					document.write("<td><a href='sFeedback.php?sID="+sID+"'>Feedback</a></td>");
			
					document.write("</tr>");
				}
				
				
				document.write("</table>");
		
		</script>
	</div>
	
</div>


<?php
include 'interface/footer.php';
?>
