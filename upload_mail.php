<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
/* upload forms */
if($_POST && isset($_FILES['file']))
{
	$recipient_email 	= "info@htmlbasket.com"; //recepient
	$from_email 		= "info@htmlbasket.com"; //from email using site domain.
	$subject			= "Get Quote Enquire!"; //email subject line

	$sender_name = filter_var($_POST["s_name"], FILTER_SANITIZE_STRING); //capture sender name
	$sender_email = filter_var($_POST["s_email"], FILTER_SANITIZE_STRING); //capture sender email
	$sender_pan = filter_var($_POST["s_pan"], FILTER_SANITIZE_STRING); //capture sender email
	$sender_phone = filter_var($_POST["s_phone"], FILTER_SANITIZE_STRING); //capture message
	$attachments = $_FILES['file'];
	
	$file_count = count($attachments['name']); //count total files attached
	$boundary = md5("sanwebe.com"); 
			
	if($file_count > 0){ //if attachment exists
		//header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$sender_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //message text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        //$body .= chunk_split(base64_encode($sender_phone));
        $body .= chunk_split(base64_encode("Name: ".$sender_name."\r\n Pan: ".$sender_pan."\r\n Email: ".$sender_email."\r\n Phone:".$sender_phone.""));
        
		//attachments
		for ($x = 0; $x < $file_count; $x++){		
			if(!empty($attachments['name'][$x])){
				
				if($attachments['error'][$x]>0) //exit script and output error if we encounter any
				{
					$mymsg = array( 
					1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
					2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
					3=>"The uploaded file was only partially uploaded", 
					4=>"No file was uploaded", 
					6=>"Missing a temporary folder" ); 
					die($mymsg[$attachments['error'][$x]]); 
				}
				
				//get file info
				$file_name = $attachments['name'][$x];
				$file_size = $attachments['size'][$x];
				$file_type = $attachments['type'][$x];
				
				//read file 
				$handle = fopen($attachments['tmp_name'][$x], "r");
				$content = fread($handle, $file_size);
				fclose($handle);
				$encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)
				
				$body .= "--$boundary\r\n";
				$body .="Content-Type: $file_type; name=\"$file_name\"\r\n";
				$body .="Content-Disposition: attachment; filename=\"$file_name\"\r\n";
				$body .="Content-Transfer-Encoding: base64\r\n";
				$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
				$body .= $encoded_content; 
			}
		}
	}else{ //send plain email otherwise
		
		$headers = "From:".$from_email."\r\n".
			"Reply-To: ".$sender_email. "\n".
			"X-Mailer: PHP/" . phpversion();
		
        //$body = $sender_name;
		$body = "<table class='table'>
			<thead>
				<tr><th colspan=2 style='text-align: justify'>Upload document details::</th></tr>
			</thead>
			<tbody>
				<tr><td class='red'>Name : </td><td> <strong>".$sender_name."</strong></td></tr>
				<tr><td>Email : </td><td> <strong>".$sender_email."</strong></td></tr>
				<tr><td>Phone : </td><td> <strong>".$sender_phone."</strong></td></tr>
				
				<tr><td>Name : </td><td> <strong>".$_POST["s_name"]."</strong></td></tr>
				<tr><td>Email : </td><td> <strong>".$_POST["s_email"]."</strong></td></tr>
				<tr><td>Phone : </td><td> <strong>".$_POST["s_phone"]."</strong></td></tr>
			</tbody>
		</table>";
	}
		
	 $sentMail = @mail($recipient_email, $subject, $body, $headers);
	if($sentMail) //output success or failure messages
	{       
		die("<script>
			alert('Thank you for your email');
			window.location.href='upload-document.php';
			</script>");
	}else{
		die("<script>
			alert('Something wrong!!!');
			window.location.href='upload-document.php';
			</script>");  
	}
}
 ?>
