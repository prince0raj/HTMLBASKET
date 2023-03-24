<?php
	if ($_POST) {
		ini_set( 'display_errors', 1 );
		error_reporting( E_ALL & ~E_NOTICE);
		require 'PHPSMTPconfig.php';
		require('constant.php');
		
		$full_name     = filter_var($_POST["full_name"], FILTER_SANITIZE_STRING);
		$email     = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
		$contact     = filter_var($_POST["contact"], FILTER_SANITIZE_STRING);
		$message_content    = filter_var($_POST["message_content"], FILTER_SANITIZE_STRING);
		
		if (empty($full_name)) {
			$empty[] = "<b>full_name</b>";
		}
		
		if (empty($email)) {
			$empty[] = "<b>Email</b>";
		}
		
		if (empty($contact)) {
			$empty[] = "<b>Phone </b>";
		}
		
		if (!empty($empty)) {
			$output = json_encode(array('type' => 'error', 'text' => implode(", ", $empty) . ' Required!'));
			die($output);
		}
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //email validation
			$output = json_encode(array('type' => 'error', 'text' => '<b>' . $email . '</b> is an invalid Email, please correct it.'));
			die($output);
		}
		
		if (empty($_POST['g-recaptcha-response']))
		{
			$output = json_encode(array('type' => 'error', 'text' => '<b>Captcha</b> Validation Required!'));
			die($output);
		}
		else 
		{
			$secret_key = SECRET_KEY;
			
			$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
			
			$response_data = json_decode($response);
			
			if (!$response_data->success)
			{
				$output = json_encode(array('type' => 'error', 'text' => '<b>Captcha</b> Validation failed!'));
				die($output);
			}
			else
			{
				//From Mail Details
				$mail->setFrom('info@htmlbasket.com','From: '.$full_name);
				$mail->addReplyTo($email, $full_name);
				// Add multiple recipients
				$mail->addAddress('furqan.sayed@ideasinaflash.com', 'Htmlbasket');
				$mail->addAddress('shahid.shaikh29@gmail.com', 'Htmlbasket');
				$mail->addAddress('ejaz.shaikh99@gmail.com', 'Htmlbasket');
				// Add cc or bcc 
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');
				
				// Email subject
				$mail->Subject = 'Html Basket Website Enquiry';
				// Set email format to HTML
				$mail->isHTML(true);
				
				$mailContent = '<table class="table">
				<colgroup>
				<col class="col-xs-3" />
				<col class="col-xs-9" />
				</colgroup>
				<thead>
				<tr><th colspan=2 style="text-align: justify">Client Details::</th></tr>
				</thead>
				<tbody>
				<tr><td class="red">First Name : </td><td> <strong>' . $full_name . '</strong></td></tr>
				<tr><td>Email : </td><td> <strong>' . $email . '</strong></td></tr>
				<tr><td>Phone : </td><td> <strong>' . $contact . '</strong></td></tr>                    
				<tr><td>Message : </td><td> <strong>' . $message_content . '</strong></td></tr>
				</tbody>
				</table>';
				
				/* Send Email */
				//$headers = 'From: ' . $email . "\r\n" .
                //'Reply-To: ' . $email . "\r\n" .
                //'X-Mailer: PHP/' . phpversion() . "\r\n" .
                //'Content-type: text/html; charset=iso-8859-1';
				//$to = 'furqan.sayed@ideasinaflash.com';
				//$subject = "htmls= basket Website Enquiry";
				//$send_to = mail($to, $subject, $mailContent, $headers);
				
				$mail->Body = $mailContent;
				
				if(!$mail->send())
				{
					$output = json_encode(array('type' => 'error', 'text' => 'Message could not be sent. Mailer Error:'.$mail->ErrorInfo));
					die($output);
				}
				else
				{
					//From Mail Details
					$Replaymail->setFrom('noreply@htmlbasket.com', 'Htmlbasket');
					// Add multiple recipients
					$Replaymail->addAddress($email, $full_name);
					// Email subject
					$Replaymail->Subject = 'From iTax services';
					// Set email format to HTML
					$Replaymail->isHTML(true);
					
					$ReplaymailContent = "<p>Thank you for showing your interest in htmlbasket .</p>
					<p>We will connect you soon...</p>
					<br />
					<p><strong>Html Basket</strong><br />
					address<br>
					
					Mira Road East, Thane – 401107, <br>
					Maharashtra, India
					</p>
					<p>For any query, please contact: <br />
					<strong>Mobile : +91 123456789 </strong><br />
					<strong>Email : info@htmlbasket.com</strong><br />
					<strong>Web : https://www.htmlbasket.com</strong>
					</p>
					<br /><br /><br />
					<p style='font-size: 12px; color: red;'>This is a system generated email.</p>
					";
					
					//$from = "enquiry@itaxservices.in";
					//$sub = "From iTax services";
					//$replyto = 'From: ' . $from . "\r\n" .
					//'Reply-To: ' . $from . "\r\n" .
					//'X-Mailer: PHP/' . phpversion() . "\r\n" .
					//'Content-type: text/html; charset=iso-8859-1';
					// To send HTML mail, the Content-type header must be set
					//$send_replay = mail($email, $sub, $ReplaymailContent, $replyto);
					
					$Replaymail->Body = $ReplaymailContent;
					if(!$Replaymail->send())
					{
						$output = json_encode(array('type' => 'error', 'page_name' => '', 'text' => 'Unable to send email, please contact info@htmlbasket.com'));
						die($output);
						}
					else
					{
						$output = json_encode(array('type' => 'message', 'page_name' => '', 'text' => 'Hi ' . $full_name . ', thank you for contacting us. We will get back to you shortly.'));
						die($output);
					}
				}
			}
		}
	}
