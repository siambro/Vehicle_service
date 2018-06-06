
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Metro Vehicle Servicing</title>
    <meta charset="utf-8">
	
	<link type="text/css" rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<!-- Latest compiled and minified CSS
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	-->
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Metro Vehicle Servicing</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="customerReg.php">Customer Registration</a></li>
        <li><a href="vehicleReg.php">Vehicle Registration</a></li>
        <li><a href="services.php">Services</a></li>
		 <li><a href="parts.php">Parts</a></li>
        <li><a href="mySchedule.php">My Schedules</a></li>
       
        
      </ul>
	 
      <ul class="nav navbar-nav navbar-right">
		
		<li style="margin-top: 20px; margin-right: 5px;"><?php if(logged_in()==true){
					echo('Hello <b> '.$_SESSION['userName'].'</b>'); 
				}else{
					echo "No User Logged In";
				}?>
		</li>


		<li>
		<input type="button" class="btn btn-success" value= "<?php if(logged_in()==true){
																		echo "Logout";
																		}else{
																			echo "Login";
																		}?>" onclick='<?php if (logged_in()== true){
																									echo 'window.location.href="logout.php"';
																									}else{
																										echo 'window.location.href="login.php"';
																									}?>' style="margin-top: 5px; margin-right: 5px;"/>
		</li>			
		<li>
		<input type="button" class="btn btn-success" value= "Admin" onclick='window.location.href="login_admin.php"' style="margin-top: 5px; margin-right: 5px;"/>
		</li>			
		
		
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>