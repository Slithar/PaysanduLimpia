<?php

class Utils{

	public function enviarCorreoContacto($email,$asunto,$mensaje){

	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;

	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;

	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "paysandulimpia@gmail.com";

	//Password to use for SMTP authentication
	$mail->Password = "Paysandulimpia2017";

	//Set who the message is to be sent from
	$mail->setFrom('paysandulimpia@gmail.com', 'Paysandu Limpia');

	//Set an alternative reply-to address
	$mail->addReplyTo('paysandulimpia@gmail.com', 'Paysandu Limpia');

	//Set who the message is to be sent to
	$mail->addAddress('paysandulimpia@gmail.com', 'Paysandu Limpia');

	//Set the subject line
	$mail->Subject = $asunto;;

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	$mail->Body    = "Se ha recibido el siguiente correo de contacto de parte de un usuario del sistema: <b>'".$mensaje."'</b>.<br><br>Correo electrónico: ".$email;

	//Replace the plain text body with one created manually
	$mail->AltBody = "Se ha recibido el siguiente correo de contacto de parte de un usuario del sistema: <b>'".$mensaje."'</b>.<br><br>Correo electrónico: ".$email;

	
	//send the message, check for errors
	if (!$mail->send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
	    $res=false;
	} else {
	    //echo "Message sent!";
	    $res=true;
	}	


	return $res;

	}	

	public function enviarCorreoNotificacion($email,$asunto,$mensaje){

	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;

	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;

	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "paysandulimpia@gmail.com";

	//Password to use for SMTP authentication
	$mail->Password = "Paysandulimpia2017";

	//Set who the message is to be sent from
	$mail->setFrom('paysandulimpia@gmail.com', 'Paysandu Limpia');

	//Set an alternative reply-to address
	$mail->addReplyTo('paysandulimpia@gmail.com', 'Paysandu Limpia');

	//Set who the message is to be sent to
	$mail->addAddress($email, 'Paysandu Limpia');

	//Set the subject line
	$mail->Subject = $asunto;

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	$mail->Body    = $mensaje;

	//Replace the plain text body with one created manually
	$mail->AltBody = $mensaje;

	
	//send the message, check for errors
	if (!$mail->send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
	    $res=false;
	} else {
	    //echo "Message sent!";
	    $res=true;
	}	


	return $res;

	}	
}
?>