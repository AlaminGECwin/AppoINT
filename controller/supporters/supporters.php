<?php
/*
class Schedule
{
	$schedule_id;
	$slot_schedule;

	function __construct()
	{
		# code...
	}
}
class Appointment
{
	$appointment_id;
	$appointment_problem;
	$appointment_slot;
	
	function __construct()
	{
		# code...
	}
}
class Profile
{
	$profile_link;
	$profile_type;
	function __construct()
	{
		# code...
	}
}*/
class Register
{
	
	function __construct()
	{
		# code...
		
	}
	function check_new_user_information($first_name,$last_name,$email,$password,$confirm_password,$user_type){
		$validation=false;

		
		if ($first_name!=$last_name) {
			# code...
			echo "\n name ok";
			$validation=true;

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  	$emailErr = "Invalid email format";
			  	$validation=false;
			}else{
				echo "\n email ok";
				$validation=true;
				if ($password==$confirm_password) {
					# code...
					echo "\n password ok";
					$validation=true;
				}else{
					$validation=false;
				}
			}
			
		}else{
			$validation=false;

		}
		return $validation;
		
	}
	
}

/**
 * 
 */
class Security_Guard
{
	
	function __construct()
	{
		# code...
	}
	function encrypt($email,$password){
		for($i=0;$i<strlen($email);$i++){
			$password=md5($password);			
		}
		return $password;
	}
}

/**
 * 
 */
class Email
{
	
	function __construct()
	{
		# code...

	}
	function send_mail($sender_mail,$sender_password,$receiver_mail,$subject,$message){
		

	
	require_once('PHPMailer/PHPMailerAutoload.php');
	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// SMTP::DEBUG_OFF = off (for production use)
	// SMTP::DEBUG_CLIENT = client messages
	// SMTP::DEBUG_SERVER = client and server messages
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;

	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;

	//Set the encryption mechanism to use - STARTTLS or SMTPS
	$mail->SMTPSecure = 'tls';

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = $sender_mail;

	//Password to use for SMTP authentication
	$mail->Password = $sender_password; 

	//Set who the message is to be sent from
	$mail->setFrom($sender_mail, '');

	//Set who the message is to be sent to
	$mail->addAddress($receiver_mail, 'Alamin');

	//Set the subject line
	$mail->Subject = $subject;

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

	//Replace the plain text body with one created manually
	$mail->Body = $message;
	  
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "error mail<br>";
	    //echo 'Mailer Error: '. $mail->ErrorInfo;
	} else {
	    echo 'Message sent!';
	    //Section 2: IMAP
	    //Uncomment these to save your message in the 'Sent Mail' folder.
	    #if (save_mail($mail)) {
	    #    echo "Message saved!";
	    #}
	}

	
	}
}	