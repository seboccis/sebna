<?php

	foreach($_GET as $key => $value){
		$$key = trim(strip_tags($value));
	}

	$validateForm = '0';

	$errorName = '0';
	$errorMail = '0';
	$errorMsg = '0';

	$responseMail = '0';

	if(empty($name)){
		$errorName = '1';
	}

	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		$errorMail = '1';
	}

	if(empty($msg)){
		$errorMsg = '1';
	}

	if($errorName == '0' && $errorMail == '0' && $errorMsg == '0'){
		$validateForm = '1';
	}

	if($validateForm == '1'){

		require('../config.php');
		require('../vendor/autoload.php');

		$mail = new PHPMailer;

		//config de l'envoi
		$mail->isSMTP();
		$mail->setLanguage('fr');
		$mail->CharSet = 'UTF-8';

		//debug
		$mail->SMTPDebug = 0;	//0 pour désactiver les infos de débug
		$mail->Debugoutput = 'html';

		//config du serveur smtp
		$mail->Host = SMTPHOST;
		$mail->Port = SMTPPORT;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = SMTPUSER;
		$mail->Password = SMTPPASS;

		//qui envoie, et qui reçoit
		$mail->setFrom(SMTPALIAS, 'Service de messagerie de SebNa');
		$mail->addAddress(MAILSEB, 'Sébastien OCCIS');
		$mail->addAddress(MAILNADIA, 'Nadia ARAB'); 

		//mail au format HTML
		$mail->isHTML(true); 

		//sujet 
		$mail->Subject = 'Nouveau contact';

		//message (avec balises possibles)
		// $mail->Body = 'Message envoyé avec <b>succès</b> !';
		$message = $msg;
		$mail->Body = $message;

		//send the message, check for errors
		if ($mail->send()){
			$responseMail = '1';
		} 

	}

	$arrayResponse =	[
					'validateForm'	=>	$validateForm,
					'errorSpans'	=>	[
											'errorName'	=> $errorName,
											'errorMail'	=> $errorMail,
											'errorMsg'	=> $errorMsg,
										],
					'responseMail'	=>	$responseMail,
				];

	$response = json_encode($arrayResponse);

	die($response);

?>