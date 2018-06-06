<?php
include 'core/initial.php';
protect_page();
include 'interface/headerAdmin.php';

	if(logged_in()==TRUE){

		$con=mysqli_connect("localhost", "root", "" , "car");
		
		$query = "select * from parts where pID = '".$_GET['pID']."'";
		$result=mysqli_query($con, $query);
		
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$pID=$row['pID'];
			$pName=$row['pName'];
			$pPrice=$row['pPrice'];
			
		}
		
		if($_POST){
			
			$pID=$_POST['pID'];
			$pName=$_POST['pName'];
			$pPrice=$_POST['pPrice'];
		
			$con=mysqli_connect("localhost", "root", "" , "car");
			$query="update parts set pName='$pName', pPrice='$pPrice' where pID='$pID'";
			if(mysqli_query($con,$query)){
				header('location: parts_admin.php');
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
		<div class="panel-heading"><legend>Parts insertation</legend></div>
			<div class="panel-body" id="panelbody">
				
				
				<form class="form-horizontal" action="pEdit.php" method="POST">
					<fieldset>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="pName">Parts Name</label>  
					  <div class="col-md-4">
					  <input id="pName" name="pName" type="text" placeholder="Parts Name" class="form-control input-md" value="<?php echo $pName ?>" required="">
						
					  </div>
					</div>
			
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="pPrice">Parts Price</label>  
					  <div class="col-md-4">
					  <input id="pPrice" name="pPrice" type="number" placeholder="Parts Price" class="form-control input-md" value="<?php echo $pPrice ?>" required="">
						
					  </div>
					</div>

					
					<!-- Button -->
					<div class="row" align="right">
						<div class="col-md-8  padding-top-10">	
							<input type="hidden" name="pID" value="<?php echo $pID ?>"/>		
							<input type="submit" class="btn btn-primary" name="insert" value="Update Parts">
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
