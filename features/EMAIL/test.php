<?php

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
$mail->Username = 'laravel58test@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'wapcac-cexxi6-fIjnyx'; 

//Set who the message is to be sent from
$mail->setFrom('laravel58test@gmail.com', '');

//Set who the message is to be sent to
$mail->addAddress('alaminwindows10pc@gmail.com', 'Alamin');

//Set the subject line
$mail->Subject = 'Check link 2';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->Body = "THE BODY OF THE EMAIL <a href='http://localhost/Counselling_Manager/index.php?function=sign_in'>Sign in</a>";
  
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

?> 