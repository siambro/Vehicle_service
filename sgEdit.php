<?php
include 'core/initial.php';
include 'interface/headerAdmin.php';

if(logged_in()==TRUE){

	$con=mysqli_connect("localhost", "root", "" , "car");
	
	$query = "select * from feedback where fID = '".$_GET['fID']."'";
	$result=mysqli_query($con, $query);
	
	if($result){
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$fID=$row['fID'];
		$dateForService=$row['dateForService'];
		$timeForService=$row['timeForService'];
		$fdate=$row['fdate'];
		$ftime=$row['ftime'];
	}
	
	if($_POST){
		
		$fID=$_POST['fID'];
		$dateForService=$_POST['fDate'];
		$timeForService=$_POST['fTime'];
	
		$con=mysqli_connect("localhost", "root", "" , "car");
		$query="update feedback set dateForService='$dateForService', timeForService='$timeForService', fdate=NOW(), ftime=NOW() where fID='$fID'";
		if(mysqli_query($con,$query)){
			header('location: servicesGiven.php');
		}else{
			mysqli_error($con);
		}
	}else{
		mysqli_error($con);
	}
}



?>

<div class="container"  align="center">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Feedback Update</legend></div>
		 <div class="panel-body" id="panelbody">
			
			<script>
			 $( function() {
				$( "#datepicker" ).datepicker({ minDate: 1, maxDate: "+1M +10D" });
			  } );
			</script>
			
			<form class="form-horizontal" action="sgEdit.php" method="POST">
				<fieldset>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="fDate">Date</label>  
				  <div class="col-md-4">
				  <input id="datepicker" name="fDate" type="text" placeholder="Date" class="form-control input-md" value="<?php echo $dateForService ?>" required="">
					
				  </div>
				</div>
		
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fTime">Time</label>  
				  <div class="col-md-4">
				  <input id="time" name="fTime" type="time" placeholder="Time" class="form-control input-md" value="<?php echo $timeForService ?>" required="">
					
				  </div>
				</div>

				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="fID" value="<?php echo $fID ?>" />
						<input type="submit" class="btn btn-primary" name="send" value="Send Updates">
						<input type="submit" class="btn btn-primary" name="sendAndEmail" value="Send & Email Updates">
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
