<?php
	require_once("phpMailer/PHPMailerAutoload.php");


				$name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$message = $_POST['mailMessage'];
	
				if(empty($name)){
					print "<p>Please enter a name.</p>";
					
				}else if (empty($email)){
					print "<p>Please enter an e-mail address.</p>";
					
				}else{
					send_email($name,$email,$subject,$message);
				}
				function send_email($fromEmail,$fromName,$subject,$message){
					$mailer = new PHPMailer();
					$mailer -> isSMTP();
		
					$mailer -> SMTPAuth = TRUE;
					$mailer -> Host = "ssl://smtp.gmail.com:465";
		
					$mailer -> Username="geogumd@gmail.com";
					$mailer -> Password="mps12345";
		
					$mailer ->From=$fromEmail;
					$mailer ->FromName=$fromName . "(" . $fromEmail . ")";
		
					$mailer -> Subject = $subject;
					$mailer -> Body = $message;
		
					$mailer -> addAddress("mkah91@gmail.com", "Mohammed Kemal");
					$mailer -> addBCC("mkemal1@terpmail.umd.edu");
						    $upload_dir= "uploads/";
							
							//nested if to check a file is uploaded
							if (($_FILES["imgFile"]["type"] == "image/gif")||($_FILES["imgFile"]["type"] == "image/jpeg")
							||($_FILES["imgFile"]["type"] == "image/jpg")||($_FILES["imgFile"]["type"] == "image/pjpeg")
							||($_FILES["imgFile"]["type"] == "image/x-png")||($_FILES["imgFile"]["type"] == "image/png")
							&& ($_FILES["imgFile"]["size"] < 1000000)){//file size unit byte
								
								
								if ($_FILES["imgFile"]["error"] > 0){
									print('<p>File Upload Error:" . $_FILES["imgFile"]["error"] . </p>');
									
								}else{
										$filename = $_FILES["imgFile"]["name"];
										$tempname = $_FILES["imgFile"]["tmp_name"];
									if (file_exists($upload_dir . $filename)){
										print ("<p>Error file name ". $filename ." already exists!</p>");
									
										}else{
											if(move_uploaded_file($tempname, $upload_dir . $filename) == True){
											$imgURL = $upload_dir ."/". $filename;
											print ("<p>Uploaded successfully.</p>");
												
											}else {
												print ("<p>Could not upload file.</p>");
											}
											
									}
		
								}//else
							}		
					if(!$mailer->send()){
						$h = "Mailer Error" . $mailer->ErrorInfo;
						$m = "Mailer Error was not sent";
						print "<h1>$h</h1>";
						print "<pre>$m</pre>";
					}else{
						print "<h1>Mail Sent</h1>";
						print "<p>Thank you. Message has been sent successfully.</p>";
					}
			}

?>			

