<?php
/*
* Author: Aditya
* date: 08-Aug-2014
* CSS Document 
*
*/
?>
<?php
if(isset($_GET)){
	$output	=	0;
	if(isset($_GET['sendMail'])){
		function includeWrapperAndSendMail($recipients, $mailSubject, $MailBody){
			require_once '../Common/php/sharedHostingMailWrapper.php';
			return send_Email($recipients, $mailSubject, $MailBody);
		}
	
		if($_GET['sendMail'] == 'queryForm'){
			$recipients	=	'aditya@aapastech.com, guptaaditya24@gmail.com';
			$mailSubject=	'Urgent action required. Query from aapastech.com';
			$MailBody	=	'<div style="margin-left:5%">';
				extract($_GET);
				$MailBody	.=	'<br /><span>Sent By:</span> '.$senderName;
				$MailBody	.=	'<br /><span>Senders Email address:</span> '.$senderEmail;
				$MailBody	.=	'<br /><span>Query Subject:</span> '.$querySubject;
				$MailBody	.=	'<br /><span>Query Description:</span> '.$queryDescription;
			$MailBody	.=	'</div>';
			
			$mailSent	=	includeWrapperAndSendMail($recipients, $mailSubject, $MailBody);
			if($mailSent){
				$output	=	1;
			}
			
		}//send mail for queryForm
	}//Send mail action
	echo $output;
}
?>