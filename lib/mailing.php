<?php 
require 'PHPMailerAutoload.php';

function mailit($mailto, $topic, $message, $noreply = false, $from = false, $name = '') {
	
	if(!($from)) {
	
		$name = MAILERNAME;
	
		// Sprawdzamy czy mail ma byc no-reply (czyli wyslany z automatu)
		// I chcemy podkreslic, ze nie mozna odpowiadac na tego maila
		if($noreply) {
			$email = MAILER_NOREPLY;
		} else {
			$email = MAILER;
		}	
		
	} else {
		$email = $from;
	}
	
	$mail = new PHPMailer;
	$mail->CharSet = 'utf-8';
	$mail->SMTPDebug  = 0;  
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'olgroup.nazwa.pl';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'noreply@sayen.co';                 // SMTP username
	$mail->Password = 'NOreply2015!!';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->From = 'noreply@sayen.co';
	$mail->FromName = 'MSK Legal Kancelaria Radcy Prawnego';
	$mail->addAddress($mailto);
	$mail->addReplyTo($email, $name);
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $topic;
	$mail->Body    = stripslashes($message);
	$mail->AltBody = strip_tags($message);

	if(!$mail->send()) {
		//echo 'Message could not be sent.';
		//echo 'Mailer Error: ' . ;
		//exit(1);
		return $mail->ErrorInfo;
	} else {
		return true;
	}
}