<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

	if(logged_in()==TRUE){

		$con=mysqli_connect("localhost", "root", "" , "car");
		
		$query = "select * from costall where cID = '".$_GET['cID']."'";
		$result=mysqli_query($con, $query);
		
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$cID=$row['cID'];
			$sCharge=$row['sCharge'];
			$pNames=$row['pNames'];
			$pCost=$row['pCost'];
			$eCost=$row['eCost'];
			$total=$row['total'];
			
		}
		
		if($_POST){
			$cID=$_POST['cID'];
			$sCharge = 0;
		
			$parts=implode(', ',$_POST['parts']);
			$part=$_POST['parts'];
			$count = count($_POST['parts']);
			//$parts=$_POST['parts'];
			//print_r($count);exit;
			$con=mysqli_connect("localhost","root","","car");
			
			for($i=0; $i<$count; $i++){
				$query="select pPrice from parts where pName='$part[$i]'";
				
				$result= mysqli_query($con,$query);
				if($result){
					$row=mysqli_fetch_array($result);
				}
				$pPrice=$pPrice+$row['pPrice'];
			}
			
			
			//echo $pPrice;
			$ecost = 0;
			$eCost=$ecost+$_POST['eCost'];
			//$fID=$_POST['fID'];
			
			$total = $pPrice + $eCost;
					
			$con=mysqli_connect("localhost", "root", "" , "car");
			$query="update costall set sCharge='$sCharge', pNames='$parts', pCost='$pPrice', eCost='$eCost', total='$total' where cID='$cID'";
			if(mysqli_query($con,$query)){
				header('location: costforExtra.php');
			}else{
				mysqli_error($con);
			}
		}else{
			mysqli_error($con);
		}
	}


?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Extra Billing Calculation</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="ceEdit.php" method="POST">
				<fieldset>
				<?php
					$cID=$_GET['cID'];
				?>
				<div class="form-group">
					<input type="hidden" name="cID" value="<?php echo $cID?>" class="form-control"/>
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
				  <label class="col-md-4 control-label" for="eCost">Extra Cost</label>  
				  <div class="col-md-4">
				  <input id="eCost" name="eCost" value="<?php echo $eCost;?>" type="Number" placeholder="Extra Cost" class="form-control input-md" required="">
					
				  </div>
				</div>

				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="id" value="<?php echo $cID?>" class="form-control"/>					
						<input type="submit" class="btn btn-primary" name="update" value="Update">
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
