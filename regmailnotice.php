<?php

$to = $emailid;
			$subject = "African Caribbean Network Foundation (ACNF) Membership Signup";
			$message = '
			
			
			You have commenced a registration process with ACNF, to confirm your interest and activate your account, please
			click the link below or copy and paste it into your address bar to complete your application http://acnfoundation.org/activate.php?email='.$emailid.'&activate='.$activatecode.'
			
			
			Thank you for interest to become a member.
			
			';
			$from = "noreply@acnfoundation.org";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers = 'To: '.$to. "\n";
            $headers .= 'From: Africa Caribbean Network Foundation<acnfoundation.org>' . "\n";
            //$headers .= 'Cc: info@acnfoundation.org' . "\n";
            $headers .= 'Bcc: info@acnfoundation.org' . "\n";

            $success = @mail($to, $subject, $message, $headers);
			
			 if ($success)
			 {
			  $flag="sent";
			  $title = "";
			  $surname =  "";
			  $firstname =  "";
			  $othernames =  "";

			  $city =  "";
			  $profession =  "";
			  $phone =  "";
			  $emailid =  "";
		     }
			 else
			 {
			  $flag="failed"; 
			  $errmsg.="There was a failure sending the activation mail to the email you provided";
			 }

?>
