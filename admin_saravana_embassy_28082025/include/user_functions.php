<?php
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

	class User_Functions extends Frontend_Functions {
		function send_email_details($to_emails, $detail, $title) {

			$mail = new PHPMailer;                          
	
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;         
			$mail->Username = 'ganeshkumarcgk97@gmail.com';
			$mail->Password = 'hffv gwdc ioer hkoi'; 
			$mail->SMTPSecure = 'tls'; 
			$mail->Port = 587;
	
			$mail->From = 'info@drefresh.com';
			if(!empty($to_emails)) {
				foreach($to_emails as $key => $to) {
					if(!empty($key)) {
						$mail->AddBCC($to);
					}
					if(empty($key)) {
						$mail->addAddress($to);
					}
				}
			}
			$mail->isHTML(true);
	
			$mail->Subject = $title;
			$mail->Body    = $detail;
	
			$msg = "";
			if(!$mail->send()) {
				// $msg = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			} 
			else {
				// $msg = 'Message has been sent';
			}
			return $msg;
		}        
    }