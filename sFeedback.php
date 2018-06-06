<?php
include 'core/initial.php';
include 'interface/headerAdmin.php';
$sID=$_GET['sID'];
$con = mysqli_connect("localhost","root","","car");
$query = "select * from services where sID='$sID'";
$result=mysqli_query($con,$query);
if($result){
	$row=mysqli_fetch_array($result);
}
$datefrm=$row['dateForServiceFrom'];
$dateto=$row['dateForServiceTo'];

//echo $datefrm;
//echo $dateto;
//exit;

?>

<div class="container"  align="center">

	<div class="panel panel-default">
		<div class="panel-heading"><legend>Feedback</legend></div>
		 <div class="panel-body" id="panelbody">
			
			<script>
			 $( function() {
				$( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M" });
			  } );
			</script>
			
			<form class="form-horizontal" action="sfeedbackManager.php" method="POST">
				<fieldset>
				
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $sID?>" class="form-control"/>
				</div>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fDate">Date</label>  
				  <div class="col-md-4">
				  <input id="datepicker" name="fDate" type="text" placeholder="Date" class="form-control input-md" required="">
					
				  </div>
				</div>
		
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fTime">Time</label>  
				  <div class="col-md-4">
				  <input id="time" name="fTime" type="time" placeholder="Time" class="form-control input-md" required="">
					
				  </div>
				</div>

				<div class="form-group">
					  <label  class="col-md-4 control-label" for="sms">Message</label>
					  <div class="col-md-4">
						  <textarea class="form-control input-md" name="sms" id="sms" rows="4" value="" ></textarea>
						</div>
				</div>
				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="hidden" name="sID" value="<?php echo $sID ?>" />
						<input type="submit" class="btn btn-primary" name="send" value="Send">
						<input type="submit" class="btn btn-primary" name="sendAndEmail" value="Send & Email">
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
