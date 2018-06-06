<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Cost Calculation</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="costManager.php" method="POST">
				<fieldset>
				<?php
					$fID=$_GET['fID'];
				?>
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $fID?>" class="form-control"/>
				</div>
					
				<div class="form-group">
				  <label class="col-md-4 control-label" for="sCharge">Service Charge</label>  
				  <div class="col-md-4">
				  <input id="sCharge" name="sCharge" value="1000" disabled="disabled" type="Number" placeholder="Service Charge" class="form-control input-md" required="">
					
				  </div>
				</div>
		
				<!-- Text input-->
				
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
				  <input id="eCost" name="eCost" type="Number" placeholder="Extra Cost" class="form-control input-md">
					
				  </div>
				</div>

				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="fID" value="<?php echo $fID ?>"/>					
						<input type="submit" class="btn btn-primary" name="insert" value="Insert">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	

	
</div>


<?php
include 'interface/footer.php';
?>
