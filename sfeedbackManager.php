<?php

include 'core/initial.php';
	
	if(isset($_POST['send'])){
		$dateForService=$_POST['fDate'];
		$timeForService=$_POST['fTime'];
		$sms=$_POST['sms'];
		
		$sID =$_POST['sID'];
			
		$con=mysqli_connect("localhost","root","","car");
		
		$query="insert into feedback values('','$dateForService','$timeForService','$sms', NOW(), NOW(),'$sID')";
		$result=mysqli_query($con,$query);
		if($result){
			header("location:servicesGiven.php");
		}
	}
	
	if(isset($_POST['sendAndEmail'])){
		
		$dateForService=$_POST['fDate'];
		$timeForService=$_POST['fTime'];
		$sms=$_POST['sms'];
		$sID =$_POST['sID'];
		$userName=$_SESSION['userName'];
				
		$con=mysqli_connect("localhost","root","","car");
		
		$query="insert into feedback values('','$dateForService','$timeForService','$sms', NOW(), NOW(),'$sID')";
		$result=mysqli_query($con,$query);
		
		
			//Mail sending ...
			
			//import mail id ...
			//$sID=$_POST['sID']
			//$con=mysqli_connect("localhost","root","","car");
			
			
			$sID="select sID from services where sID='$sID'";
			$result= mysqli_query($con,$sID);
			if($result){
				$row=mysqli_fetch_array($result);
			}
			$sID=$row['sID'];
			
			
			$con=mysqli_connect("localhost","root","","car");
			$userName="select userName from services where sID='$sID'";
			$result= mysqli_query($con,$userName);
			if($result){
				$row=mysqli_fetch_array($result);
			}
			$userName=$row['userName'];
			
			
			$con=mysqli_connect("localhost","root","","car");
			$email="select email from creg where userName='$userName'";
			$result= mysqli_query($con,$email);
			if($result){
				$row=mysqli_fetch_array($result);
			}
			$email=$row['email'];
			
			//echo $email;
			
			require 'PHPMailer/PHPMailerAutoload.php';
			//require 'PHPMailer/class.phpmailer.php';
			
			$mail = new PHPMailer;

			$mail->isSMTP();                            // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                     // Enable SMTP authentication
			$mail->Username = 'localmail00@gmail.com';          // SMTP username
			$mail->Password = 'localmail'; // SMTP password
			$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                          // TCP port to connect to

			$mail->setFrom('localmail00@gmail.com', 'Metro Vehicle Service');
			$mail->addReplyTo('localmail00@gmail.com', 'Feedback');
			$mail->addAddress($email,'');   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = '<h1>hello Customer ! </h1>';
			$bodyContent = '<p>Your requested Booking schedule has booked for you.<br/>
			Message - '.$sms.'
			<br/>
			Time -' .$timeForService.'<br/>
			Date -' .$dateForService.'<br/>
			
			Service Center address- <br/>
			62/b, Gulshan-2, Dhaka 1212.
			</p>';
			

			$mail->Subject = 'Confirmation of Schedule';
			$mail->Body    = $bodyContent;
								
					
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				
				echo "<script>
					alert('Message could not be sent. Mailer Error: $mail->ErrorInfo');
					window.location.href='sFeedback.php';
					</script>";
					//echo "ok";
					exit;
				
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				//echo 'A confirmation mail has been sent to your mail.';
				echo "<script>
					alert('Message sent to $email');
					window.location.href='servicesTaken.php';
					</script>";
					//echo "ok";
					exit;
			}
	
		
	}
	
?>