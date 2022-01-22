<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite PHPMailer 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMMail;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
	public function send($TOEmail, $TOName, $subject, $body, $altBody)
	{
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = MAIL_ENCRYPTION;
		$mail->Port       = MAIL_PORT;
		$mail->Host       = MAIL_HOST;
		$mail->Username   = MAIL_USERNAME;
		$mail->Password   = MAIL_PASSWORD;
		$mail->AddAddress($TOEmail, $TOName);
		$mail->SetFrom(MAIL_USERNAME, "Eduardo");
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		$mail->msgHTML($body);
		$mail->AltBody = $altBody;
		// $mail->ErrorInfo
		if (!$mail->send()) return [false, "Erro interno (Email)"];
		return [true];
	}
}
