<?php
require("PHPMailer/class.phpmailer.php");
require_once('PHPMailer/class.smtp.php');

// Check for empty fields
/*if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }*/
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
//$to = 'chris@sparkway.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@sparkway.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "mail.emailsrvr.com"; // SMTP server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'chris@sparkway.com';                 // SMTP username
$mail->Password = 'Sp@rk%13';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;               

$mail->From     = "noreply@sparkway.com";
$mail->FromName = $name;
$mail->AddAddress('chris@sparkway.com');
$mail->addReplyTo('noreply@sparkway.com', 'No Reply');

$mail->Subject  = $email_subject;
$mail->Body     = $email_body;
$mail->WordWrap = 50;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}

//return true;			
?>