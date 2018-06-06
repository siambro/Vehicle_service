<?php
include 'core/initial.php';
include 'interface/header.php';

?>
<script> src="jquery.js"</script>
<script type="text/javascript">
	function validate(form)
	{
		fail  = validateName(form.txtname.value)
		fail += validateemail(form.email.value)
		fail += validateaddress(form.address.value)
		fail += validatecity(form.city.value)
		fail += validatezip(form.zip.value)
		fail += validatephone(form.phone.value)	
		fail += validateuserName(form.userName.value)
		fail += validatePassword(form.pass.value)
		fail += validateConfirmPassword(form.cpass.value)
		
		if (fail == "") {
			return true;
			}
		else { 
			alert(fail); 
		}	
			return false ;
	}
	
	function validateName(field) {
		if (field == "") {
			return "Enter FirstName\n";
		}else if (field.length < 4) {
			return "use name length minimum 4 character long\n";
		}
		return "";
	}
	function validateemail(field) {
		if (field == "") {
			return "Enter Email Address\n";
		}
		else if (!((field.indexOf(".") > 0) &&(field.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(field)){
			return "The Email address is invalid\n";
			
		}
		return "";
	}
	function validateaddress(field){
		if (field == ""){ 
			return "Enter address\n";
		}else if (field.length < 10) {
			return "Address must be at least 10 characters\n";
		}
		return "";
	}
	function validatecity(field){
		if (field == "") {
			return "Enter City Name\n";
		}else if (field.length < 4) {
			return "City must be at least 6 characters\n";
		}
		return "";
	}
	function validatezip(field){
		if (field == "") {
			return "Enter Postal Code\n";
		}else if (field.length < 3) {
			return "zip code must be at least 3 characters\n";
		}
		return "";
	}
	function validatephone(field) {
		if(field==""){
			return "Enter Phone Number\n";
		}
		else if (isNaN(field)) {
			return "Enter numeric value\n";
			}
		else if(field.length < 11 || field.length > 11 )	{
			return "Phone Number must be 11 characters\n";
		}
		return "";
	}

	
	function validateuserName(field){
		if (field == "") {
			return "Enter User Name\n";
		}else if (field.length < 4) {
			return "username must be at least 6 characters\n";
		}
		return "";
	}
	function validatePassword(field) {
		if (field == "") {
			return "Enter Password\n";
		}
		else if (field.length < 6) {
			return "Passwords must be at least 6 characters\n";
		}
		else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) || ! /[0-9]/.test(field)){
		return "Passwords require one each of a-z, A-Z and 0-9\n";
		
		}
		return "";
	}
	function validateConfirmPassword(field) {
		if (field == "") {
			return "Enter Confirmation Password\n";
		}	
		else if (field.length < 6) {
			return "Passwords must be at least 6 characters\n";
		}
		else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) || ! /[0-9]/.test(field)){
			return "Passwords require one each of a-z, A-Z and 0-9\n";
			
		}
		return "";
	}
	
</script>

<div class="container" id="midDiv-adminReg">
	
	<div class="panel panel-default">
		<div class="panel-heading"><legend>Customer Registration</legend> 
			<div id="errorMessege">
			<?php
				if(isset($_GET['error1']) == true){
					echo 'This Username already exist, try another...!';
				}
				else if(isset($_GET['error2']) == true){
					echo 'Password doesn\'t match';
				}
			?>
			</div>
		</div>
		
		 <div class="panel-body" id="panelbody">
			
			
			<form class="form-horizontal" action="customerRegManager.php" method="POST" onsubmit="return validate(this)">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="txtname">Name</label>  
				  <div class="col-md-4">
				  <input id="txtname" name="txtname" type="text" placeholder="Customer Name" class="form-control input-md" />
					
				  </div>
				</div>
				
		
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="email">Email</label>  
				  <div class="col-md-4">
				  <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" >
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					  <label  class="col-md-4 control-label" for="address">Address</label>
					  <div class="col-md-4">
						  <textarea class="form-control input-md" name="address" id="address" rows="3" ></textarea>
						</div>
				</div>


				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="city">City</label>  
				  <div class="col-md-4">
				  <input id="city" name="city" type="text" placeholder="city" class="form-control input-md">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="zip">Zip Code</label>  
				  <div class="col-md-4">
				  <input id="zip" name="zip" type="text" placeholder="Zip Code" class="form-control input-md" >
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="phone">Phone</label>  
				  <div class="col-md-4">
				  <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" >
					
				  </div>
				</div>


				
				<div class="form-group">
				<label for="userName" class="col-md-4 control-label padding-top-10">User Name</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-md" id="userName" name="userName" placeholder="User Name">
					</div>
				</div>
				
				
				<div class="form-group">
				<label for="password" class="col-md-4 control-label">Password</label>
					<div class="col-md-2">					
						<input type="password" class="form-control" id="password" name="pass" placeholder="Password" >
					</div>
					<div class="col-md-2">					
						<input type="password" class="form-control" id="password" name="cpass" placeholder="Confirm Password">
					</div>
				</div>
				
				<!-- Button -->
				
				
				<div class="row" align="right">
					<div class="col-md-8  padding-top-10">					
						<input type="submit" class="btn btn-primary" id="btnSubmit" value="Submit">
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
