<?php
include 'core/initial.php';
protect_page();
include 'interface/header.php';

?>
		
		
<div class="container" id="midDiv-adminReg">
	
	
	<div class="panel panel-default" align="center">
		<div class="panel-heading"><legend>Service Booking</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="getServiceManager.php" method="POST">
				<fieldset>
					
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="vehicle">Your Vehicle</label>  
				  <div class="col-md-4">
						<select class="form-control" id="vehicle" name="vehicle" style="margin-bottom:15px;">
						<?php 
						$connection = mysqli_connect("localhost", "root", "", "car");
						$query = "select * from vreg where userName= '". $_SESSION['userName']."'" ;	
						$result = mysqli_query($connection, $query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
								echo "<option value='".$row['vName']."'>".$row['vName']."</option>";
							}
						}else{
							header ("location: vehicleReg.php?issue=1");
						}
						?>
					  </select>
				  </div>
				</div>
				
				
				<script>
				 $( function() {
					$( "#datepicker" ).datepicker({ minDate: 1, maxDate: "+1M +10D" });
				  } );
				</script>
				
				<script>
				 $( function() {
					$( "#datepick" ).datepicker({ minDate: 1, maxDate: "+1M +10D" });
				  } );
				</script>
				
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="datepicker">Date For Service you want</label>
					<div class="col-md-2">
					<input class="form-control" type="text" name="dateForServiceFrom" id="datepicker" required="required" placeholder="From" style="margin-bottom:15px;"/>
					</div>

					<div class="col-md-2">
					<input class="form-control" type="text" name="dateForServiceTo" id="datepick" required="required" placeholder="To" style="margin-bottom:15px;"/>
					</div>
				</div>
		
			
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">					
						<input type="submit" class="btn btn-primary" id="btnSubmit" value="Submit Request">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	
	<div class="panel panel-default" >
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong>Service Information</strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","services_xml.php",false);
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
				document.write("<th colspan=2>Operation</th>");
				
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
					document.write("<td><a href='sEdit.php?sID="+sID+"'>Edit</a></td>");
					document.write("<td><a href='sDelete.php?sID="+sID+"'>Delete</a></td>");
					document.write("</tr>");
				}
				document.write("</table>");
		
		</script>
	</div>
	
</div>

<?php
include 'interface/footer.php';
?>