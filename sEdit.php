<?php
include 'core/initial.php';
protect_page();
include 'interface/header.php';

	if(logged_in()==TRUE){

		$con=mysqli_connect("localhost", "root", "" , "car");
		
		$query = "select * from services where sID = '".$_GET['sID']."'";
		$result=mysqli_query($con, $query);
		
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$sID=$row['sID'];
			$vName=$row['vName'];
			$dateForServiceFrom=$row['dateForServiceFrom'];
			$dateForServiceTo=$row['dateForServiceTo'];
			$bookingdate=$row['bookingdate'];
			$bookingtime=$row['bookingtime'];
		}
		
		if($_POST){
			
			$sID=$_POST['sID'];
			$vehicle=$_POST['vehicle'];
			$dateForServiceFrom=$_POST['dateForServiceFrom'];
			$dateForServiceTo=$_POST['dateForServiceTo'];
		
			$con=mysqli_connect("localhost", "root", "" , "car");
			$query="update services set vName='$vehicle', dateForServiceFrom='$dateForServiceFrom', dateForServiceTo='$dateForServiceTo', bookingdate=NOW(), bookingtime=NOW() where sID='$sID'";
			if(mysqli_query($con,$query)){
				header('location: getService.php');
			}else{
				mysqli_error($con);
			}
		}else{
			mysqli_error($con);
		}
	}


?>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default" align="center">
		<div class="panel-heading"><legend>Service Booking Update</legend></div>
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="sEdit.php" method="POST">
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
					<input class="form-control" type="text" name="dateForServiceFrom" id="datepicker" value="<?php echo $dateForServiceFrom ?>" required="required" placeholder="From" style="margin-bottom:15px;"/>
					</div>

					<div class="col-md-2">
					<input class="form-control" type="text" name="dateForServiceTo" id="datepick" value="<?php echo $dateForServiceTo ?>" required="required" placeholder="To" style="margin-bottom:15px;"/>
					</div>
				</div>
		
			
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="sID" value="<?php echo $sID ?>" />							
						<input type="submit" class="btn btn-primary" id="btnSubmit" value="Update Request">
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
