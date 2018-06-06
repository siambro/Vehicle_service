<?php
include 'core/initial.php';
include 'interface/headerAdmin.php';

?>

<div class="container"  align="center">

	<div class="panel panel-default">
		<div class="panel-heading"><legend>Search</legend></div>
		 <div class="panel-body" id="panelbody">
			
			<script>
			 $( function() {
				$( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M" });
			  } );
			</script>
			
			<form class="form-horizontal" action="search_services.php" method="POST">
				<fieldset>
				
		
				<div class="form-group">
				  <label class="col-md-4 control-label" for="date">Date</label>  
				  <div class="col-md-4">
				  <input id="datepicker" name="date" type="text" placeholder="Date" class="form-control input-md" required="">
					
				  </div>
				</div>
				
				
				<!-- Button -->
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">
						<input type="submit" class="btn btn-primary" name="search" value="SEARCH">
					</div>
				</div>

				</fieldset>
			</form>

		 </div>
	</div>
	
	
	<div class="panel panel-default" align="center">
	  
	<div class="panel-heading"><strong>Search Result</strong></div>
	<?php	
	if(isset($_POST["search"])){	
		
		$date=$_POST['date'];
		$con=mysqli_connect("localhost","root","","car");
		$query="select * from services where dateForServiceFrom='$date'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			echo "<table align='center' border='1' class='table table-bordered'";
			
			echo "<tr>";
			echo "<th>ServiceID</th>";
			echo "<th>Vehicle Name</th>";
			echo "<th>Date from</th>";
			echo "<th>Date to</th>";
			echo "<th>Username</th>";
			echo "<th>Feedback</th>";
			
			echo "</tr>";
			
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				
				echo "<tr>";
				echo "<td>".$row['sID']."</td>";
				echo "<td>".$row['vName']."</td>";
				echo "<td>".$row['dateForServiceFrom']."</td>";
				echo "<td>".$row['dateForServiceTo']."</td>";
				echo "<td>".$row['userName']."</td>";	
				echo "<td><a href='sFeedback.php?sID=".$row['sID']."'>Feedback</a></td>";	
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo "<center><strong>No Request</strong></center>";	}
		}
	?>
	</div>
	
</div>



<?php
include 'interface/footer.php';
?>
