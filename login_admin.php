<?php
include 'core/initial.php';
include 'interface/header.php';

?>
<div class="container" id="midDiv-adminReg">
	
	<div class="row vertical-offset-100">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<div class="row-fluid user-row">
						<strong>Admin Panel</strong>
					</div>
				</div>
				<div class="panel-body">
					<form accept-charset="UTF-8" role="form" class="form-signin" action="login_AdminManager.php" method="POST">
						<fieldset>
							<label class="panel-login">
								<div class="login_result"></div>
								<div id="errorMessege"><?php  

													if(isset($_GET['error']) == true){
														echo 'Wrong Username or Password';
													}
										
												?>
								</div>
							</label>
							<input class="form-control" placeholder="Username" id="username" name="userName" type="text" required="required" style="margin-bottom:15px;">
							<input class="form-control" placeholder="Password" id="password" name="pass" type="password" required="required">
							<br></br>
							<input class="btn btn-lg btn-success btn-block" type="submit" id="login" name="login" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	
</div>

<?php
include 'interface/footer.php';
?>