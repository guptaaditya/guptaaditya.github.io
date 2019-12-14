<?php
/*
* Author: Aditya
* date: 08-Aug-2014
* CSS Document 
*
*/
?>
<?php
$smtpSettings	=	array(
	'sender'	=>	'aditya@aapastech.com'
);
	
function get_Mail_Content($MailBody	=	"")
{
	if($MailBody == "")
		$output	=	false;
	else
	$output	=	'<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<title>Aapastech</title></head>
						<style type="text/css">
							.internalTextNormal{
								font-family: Arial, Helvetica, sans-serif;
								font-size: 11px;
								color: #000000;
								font-weight: normal;	 
							}
						</style>
				</head>
				<body>'.$MailBody.'</body></html>';
				
	return $output;	
}

function send_Email($recipients, $mailSubject, $MailBody){
	$MailBody	=	get_Mail_Content($MailBody);
	$headers	=	"From: aditya@aapastech.com \r\n" .	"Reply-To: webmaster@" . $_SERVER['SERVER_NAME'] . "\r\n" .	"X-Mailer: PHP/" . phpversion();
	$headers	.=	'MIME-Version: 1.0' . "\r\n";
	$headers	.=	'Content-type: text/html; charset=utf-8' . "\r\n";
	mail($recipients, $mailSubject, $MailBody, $headers);
	return true;
}
?>