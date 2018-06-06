<?php
include 'core/initial.php';
protect_page();
include 'interface/header.php';
	if(logged_in()==TRUE){
		$con=mysqli_connect("localhost", "root", "" , "car");	
		$query = "select * from vreg where vID = '".$_GET['vID']."'";
		$result=mysqli_query($con, $query);
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
			$vID=$row['vID'];
			$vType=$row['vType'];
			$vName=$row['vName'];
			$model=$row['model'];
			$engineNo=$row['engineNo'];
			$chassisNo=$row['chassisNo'];
		}
		if($_POST){	
			$vID=$_POST['vID'];
			$vType=$_POST['vType'];
			$vName=$_POST['vName'];
			$model=$_POST['model'];
			$engineNo=$_POST['engineNo'];
			$chassisNo=$_POST['chassisNo'];	
			$con=mysqli_connect("localhost", "root", "" , "car");
			$query="update vreg set vType='$vType' ,vName='$vName', model='$model', engineNo='$engineNo', chassisNo='$chassisNo' where vID='$vID'";
			if(mysqli_query($con,$query)){
				header('location:vehicleReg.php');
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
		<div class="panel-heading"><legend>Vehicle Registration Update</legend>
			
		</div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="vEdit.php" method="POST">
				<fieldset>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="vType">Vehicle Type</label>  
				  <div class="col-md-4">
				  <select id="vType" name="vType" class="form-control">
					  <option value="Car" <?php if($vType =='Car') echo "selected"?>>Car</option>
					  <option value="Motorcycle" <?php if($vType =='Motorcycle') echo "selected"?>>Motorcycle</option>
					</select>
				  </div>
				</div>
				
		
				<div class="form-group">
				  <label class="col-md-4 control-label" for="vName">Vehicle Name</label>  
				  <div class="col-md-4">
				  <input id="vName" name="vName" type="text" placeholder="Name" class="form-control input-md" value="<?php echo $vName ?>" required="">
					
				  </div>
				</div>
		
			
				<div class="form-group">
				  <label class="col-md-4 control-label" for="model">Model No</label>  
				  <div class="col-md-4">
				  <input id="model" name="model" type="text" placeholder="Model" class="form-control input-md" value="<?php echo $model ?>" required="">
					
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="engineNo">Engine No</label>  
				  <div class="col-md-4">
				  <input id="engineNo" name="engineNo" type="text" placeholder="Engine No" class="form-control input-md" value="<?php echo $engineNo ?>" required="">
					
				  </div>
				</div>


				<div class="form-group">
				  <label class="col-md-4 control-label" for="chassisNo">Chassis No</label>  
				  <div class="col-md-4">
				  <input id="chassisNo" name="chassisNo" type="text" placeholder="Chassis No" class="form-control input-md" value="<?php echo $chassisNo ?>" required="">
					
				  </div>
				</div>


				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="vID" value="<?php echo $vID ?>" />					
						<input type="submit" class="btn btn-primary" name="update" value="Update Data">
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
