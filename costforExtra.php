<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Extra Billing Calculation</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="costforExtraManager.php" method="POST">
				<fieldset>
				<?php
				//	$fID=$_GET['fID'];
				?>
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $fID?>" class="form-control"/>
				</div>
				
		
				<div class="form-group">
				  <label class="col-md-4 control-label" for="parts">Parts Name</label>  
				  <div class="col-md-4">
						<select class="form-control" id="parts" name="parts[]" multiple="multiple" style="margin-bottom:15px;">
						<?php 
						$connection = mysqli_connect("localhost", "root", "", "car");
						$query = "select * from parts" ;	
						$result = mysqli_query($connection, $query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
								//echo "<option value='".$row['pPrice']."'>".$row['pName']."</option>";
								echo "<option>".$row['pName']."</option>";
								//$pName=$row['pName'];
							}
						}else{
							echo mysqli_error($connection);
						}
						?>
					  </select>
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="pCost">Extra Cost</label>  
				  <div class="col-md-4">
				  <input id="eCost" name="eCost" type="Number" placeholder="Extra Cost" class="form-control input-md" >
					
				  </div>
				</div>

				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
											
						<input type="submit" class="btn btn-primary" name="sold" value="Sold">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	
	
	<div class="panel panel-default" align="center">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><strong><h1>Extra Parts Billing Information Information<h1/></strong></div>

	  <!-- Table -->
		<script language = "Javascript">
			if(window.XMLHttpRequest){ 
				xmlhttp=new XMLHttpRequest();
			}else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.open("GET","costforExtra_xml.php",false);
				xmlhttp.send();
				xmlDoc=xmlhttp.responseXML;
				document.write("<table class=table border=1 align=center>");
				
				document.write("<tr>");
				document.write("<th>ID</th>");
				document.write("<th>Parts Name</th>");
				document.write("<th>Extra Cost</th>");
				document.write("<th>Total Cost</th>");
				
				document.write("<th colspan=2>Operation</th>");
				document.write("</tr>");
				
				var x = xmlDoc.getElementsByTagName("information");
				
				for(i=0;i<x.length;i++){
					cID=x[i].getElementsByTagName("cID")[0].childNodes[0].nodeValue;
					
					pNames=x[i].getElementsByTagName("pNames")[0].childNodes[0].nodeValue;		
					eCost=x[i].getElementsByTagName("eCost")[0].childNodes[0].nodeValue;		
					total=x[i].getElementsByTagName("total")[0].childNodes[0].nodeValue;		
					
					
					document.write("<tr>");
					document.write("<td>"+cID+"</td>");
				
					document.write("<td>" +pNames+"</td>");
					document.write("<td>"+eCost+"</td>");
					document.write("<td>"+total+"</td>");
					
				
					document.write("<td><a href='ceEdit.php?cID="+cID+"'>Edit</a></td>");
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
