<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv">
	
	<div class="panel panel-default" align="center">
	  
	  <div class="panel-heading"><strong><h1>Schedule Given For Customer</h1></strong></div>


		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","myScheduleAdmin_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				
				document.write("<th>Feedback ID</th>");
				document.write("<th>Your Date</th>");
				document.write("<th>Your Time</th>");
				document.write("<th>Service ID</th>");
				document.write("<th>Date</th>");
				document.write("<th>Time</th>");
				document.write("<th>Cost</th>");
				document.write("<th colspan=2>Operation</th>");
				
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				
				for(i=0;i<x.length;i++){
					fID=x[i].getElementsByTagName("fID")[0].childNodes[0].nodeValue;
					dateForService=x[i].getElementsByTagName("dateForService")[0].childNodes[0].nodeValue;		
					timeForService=x[i].getElementsByTagName("timeForService")[0].childNodes[0].nodeValue;		
					sID=x[i].getElementsByTagName("sID")[0].childNodes[0].nodeValue;		
					fdate=x[i].getElementsByTagName("fdate")[0].childNodes[0].nodeValue;		
					ftime=x[i].getElementsByTagName("ftime")[0].childNodes[0].nodeValue;		
					
					document.write("<tr>");
					
					document.write("<td>"+fID+"</td>");
					document.write("<td>"+dateForService+"</td>");
					document.write("<td>"+timeForService+"</td>");
					document.write("<td>"+sID+"</td>");
					document.write("<td>"+fdate+"</td>");
					document.write("<td>"+ftime+"</td>");
					
					document.write("<td><a href='cost.php?fID="+fID+"'>Cost</a></td>");
					
					document.write("<td><a href='sgEdit.php?fID="+fID+"'>Edit</a></td>");
					document.write("<td><a href='sgDelete.php?fID="+fID+"'>Delete</a></td>");
					
								
					document.write("</tr>");
				}
							
				document.write("</table>");
		
		</script>
	</div>
	
</div>


<?php
include 'interface/footer.php';
?>
