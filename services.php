<?php
include 'core/initial.php';
include 'interface/header.php';

?>

<div class="container" id="midDiv">
	<div class="row">
	
		<div class="col-md-4 portfolio-item" >
		<div class="panel panel-primary" style="height:500px;" >
		  <div class="panel-heading">
			<h3 class="panel-title">Monthly Servicing</h3>
		  </div>
		  <div class="panel-body">
			<p style="margin-top:15px;">Mothly service is important for every vehicle. It's keep your vehicle up to date and fresh. Also it's kepp engine more active.</p>
			<img src="img/img4.jpg" class="img-rounded" alt="Motorcycle" style="height:300px; width: 320px;" style="margin-top:15px;">
			<input class="btn btn-success btn-block" type="button" name="btnMonthly" value="Buy Service" onclick='window.location.href="getService.php"' style="margin-top:15px;">
		  </div>
		</div>
		</div>
		
		
		<div class="col-md-4 portfolio-item">
		<div class="panel panel-primary" style="height:500px;">
		  <div class="panel-heading">
			<h3 class="panel-title">Accidental Issue</h3>
		  </div>
		  <div class="panel-body">
			<p style="margin-top:15px;">Mothly service is important for every vehicle. It's keep your vehicle up to date and fresh. Also it's kepp engine more active.</p>
			<img src="img/img6.jpg" class="img-rounded" alt="Motorcycle" style="height:300px; width: 320px;">
			<input class="btn btn-success btn-block" type="button" name="btnAccidental" value="Buy Service" onclick='window.location.href="getService.php"' style="margin-top:15px;">
		  </div>
		</div>
		</div>
		
		
		<div class="col-md-4 portfolio-item">	
		<div class="panel panel-primary" style="height:500px;" >
		  <div class="panel-heading">
			<h3 class="panel-title">Engine Work</h3>
		  </div>
		  <div class="panel-body">
			<p style="margin-top:15px;">Mothly service is important for every vehicle. It's keep your vehicle up to date and fresh. Also it's kepp engine more active.</p>
			<img src="img/img7.jpg" class="img-rounded" alt="Motorcycle" style="height:300px; width: 320px;" style="margin-top:15px;">
			<input class="btn btn-success btn-block" type="button" name="btnEngine" value="Buy Service" onclick='window.location.href="getService.php"' style="margin-top:15px;">
		  </div>
		</div>
		</div>
		
	
	</div>
	
	
</div>


<?php
include 'interface/footer.php';
?>
