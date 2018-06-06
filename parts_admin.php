<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Parts insertation</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="parts_adminManager.php" method="POST">
				<fieldset>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="pName">Parts Name</label>  
				  <div class="col-md-4">
				  <input id="pName" name="pName" type="text" placeholder="Parts Name" class="form-control input-md" required="">
					
				  </div>
				</div>
		
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="pPrice">Parts Price</label>  
				  <div class="col-md-4">
				  <input id="pPrice" name="pPrice" type="number" placeholder="Parts Price" class="form-control input-md" required="">
					
				  </div>
				</div>

				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">					
						<input type="submit" class="btn btn-primary" name="insert" value="Insert">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	
	
	
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong>Parts Information</strong></div>

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
				
				document.write("<th colspan=2>Operation</th>");
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				
				for(i=0;i<x.length;i++){
					pID=x[i].getElementsByTagName("pID")[0].childNodes[0].nodeValue;
					pName=x[i].getElementsByTagName("pName")[0].childNodes[0].nodeValue;
					pPrice=x[i].getElementsByTagName("pPrice")[0].childNodes[0].nodeValue;		
					
					document.write("<tr>");
					document.write("<td>"+pID+"</td>");
					document.write("<td>"+pName+"</td>");
					document.write("<td>"+pPrice+"</td>");
				
					document.write("<td><a href='pEdit.php?pID="+pID+"'>Edit</a></td>");
					document.write("<td><a href='pDelete.php?pID="+pID+"'>Delete</a></td>");
					document.write("</tr>");
				}
				
				
				document.write("</table>");
		
		</script>
	</div>
	

	
</div>


<?php
include 'interface/footer.php';
?>
