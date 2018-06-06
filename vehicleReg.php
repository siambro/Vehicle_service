<?php
include 'core/initial.php';
protect_page();
include 'interface/header.php';

?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Vehicle Registration</legend>
			<?php
			if(isset($_GET['issue']) == true){
				echo '<h3>
				NO VEHICLE REGISTERED!<br/> 
				Register your Vehicle First.</h3>';
			}	
			?>
		</div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="vehicleRegManager.php" method="POST">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="vType">Vehicle Type</label>  
				  <div class="col-md-4">
				  <select id="vType" name="vType" class="form-control">
					  <option value="Car">Car</option>
					  <option value="Motorcycle">Motorcycle</option>
					</select>
				  </div>
				</div>
				
		
				<div class="form-group">
				  <label class="col-md-4 control-label" for="vName">Vehicle Name</label>  
				  <div class="col-md-4">
				  <input id="vName" name="vName" type="text" placeholder="Name" class="form-control input-md" required="">
					
				  </div>
				</div>
		
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="model">Model No</label>  
				  <div class="col-md-4">
				  <input id="model" name="model" type="text" placeholder="Model" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="engineNo">Engine No</label>  
				  <div class="col-md-4">
				  <input id="engineNo" name="engineNo" type="text" placeholder="Engine No" class="form-control input-md" required="">
					
				  </div>
				</div>


				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="chassisNo">Chassis No</label>  
				  <div class="col-md-4">
				  <input id="chassisNo" name="chassisNo" type="text" placeholder="Chassis No" class="form-control input-md" required="">
					
				  </div>
				</div>

				
				<!-- Button -->
				
				
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">					
						<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	
	
	
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong>Vehicle Information</strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","vehicle_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				document.write("<th>ID</th>");
				document.write("<th>Type</th>");
				document.write("<th>Name</th>");
				document.write("<th>Model</th>");
				document.write("<th>Engine</th>");
				document.write("<th>Chassis</th>");
				
				document.write("<th colspan=2>Operation</th>");
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				//alert(x);
				for(i=0;i<x.length;i++){
					vID=x[i].getElementsByTagName("vID")[0].childNodes[0].nodeValue;
					vType=x[i].getElementsByTagName("vType")[0].childNodes[0].nodeValue;
					vName=x[i].getElementsByTagName("vName")[0].childNodes[0].nodeValue;
					model=x[i].getElementsByTagName("model")[0].childNodes[0].nodeValue;
					engineNo=x[i].getElementsByTagName("engineNo")[0].childNodes[0].nodeValue;
					chassisNo=x[i].getElementsByTagName("chassisNo")[0].childNodes[0].nodeValue;
					
					document.write("<tr>");
					document.write("<td>"+vID+"</td>");
					document.write("<td>"+vType+"</td>");
					document.write("<td>"+vName+"</td>");
					document.write("<td>"+model+"</td>");
					document.write("<td>"+engineNo+"</td>");
					document.write("<td>"+chassisNo+"</td>");
					
					
					document.write("<td><a href='vEdit.php?vID="+vID+"'>Edit</a></td>");
					document.write("<td><a href='vDelete.php?vID="+vID+"'>Delete</a></td>");
					document.write("</tr>");
				}
				
				
				document.write("</table>");
		
		</script>
	</div>
	

	
</div>


<?php
include 'interface/footer.php';
?>
