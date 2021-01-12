<?php 
	require('PHPMailer/PHPMailerAutoload.php'); 
	require('crediantial.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="css/aos.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>
	  AOS.init();
	</script>

</head>
<body>
<?php 
$conn = mysqli_connect("localhost","root","","login_register");

if(isset($_POST['register'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	$token = md5(rand('10000', '99999'));
	if ($password !== $repassword) {
		$msg =  "Password & Retype password not match";
	}else{
		$select = "INSERT INTO register(name,email,password,token,status)VALUES('".$name."','".$email."','".$password."','".$token."','Inactive')";
		$result = mysqli_query($conn,$select);

		$lastId = mysqli_insert_id($conn);

		//$url = 'http://'.$_SERVER['SERVER_NAME'].'/send-mail/verify.php?id='.$lastId.'&token='.$token;
		$url = 'http://'.$_SERVER['SERVER_NAME'].'/Counselling_Manager/features/send_mail_login_register/verify.php?id='.$lastId.'&token='.$token;                                // Set email format to HTML
		
		$output = '<div>Thanks for registering with localhost. Please click this link to complete this registation <br>'.$url.'</div>';

		if ($result == true) {

			$mail = new PHPMailer();
			$mail->isSMTP();  
			//$mail->SMTPDebug = 2;                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 		// SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'info');
			$mail->addAddress($email, $name);     // Add a recipient
			
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
			
			$mail->isHTML(true);

			$mail->Subject = 'Register confirmation';
			$mail->Body    = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$msg = '<div class="alert alert-success">Congratulation, Your registration has been successful. please verify your account.</div>';
			}
		}
	}
}

?>

	<br><br><br><br>
	<div class="container">
		<center>
			<h1>Registraion with email verify link using phpmailer</h1>
		</center>
		<hr>
		<center>
			<?php if (isset($msg)) { echo $msg; } ?>
		</center>
		<form action="" method="post">
			<div class="row" style="background:#e6ebe5">
				<div class="col-md-12" style="padding:20px;width:40%">
					<div class="form-group">
						<label>Enter Name</label>
						<input class="form-control" type="text" name="name" placeholder="Enter Name" required="">
					</div>
					
					<div class="form-group">
						<label>Enter Email</label>
						<input class="form-control" type="email" name="email" placeholder="Enter Email">
					</div>
					
					<div class="form-group">
						<label>Enter Password</label>
						<input class="form-control" type="password" name="password" placeholder="Enter Password">
					</div>

					<div class="form-group">
						<label>Enter Re Password</label>
						<input class="form-control" type="password" name="repassword" placeholder="Enter Re Password">
					</div>

					<div class="form-group">
						<input class="btn btn-success pull-left" type="submit" name="register" value="Register">
						<a href="login.php" class="btn btn-warning pull-right">Log In</a>
					</div>
				</div>
			</div>
			
		</form>
	</div>

	<div class="container">

		
	</div>
				

						
					
	
	

</body>
</html>
<script src="js/aos.js"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });
</script>