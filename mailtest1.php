$to = $emailid;
$subject = "ACNFoundation membership Signup";
$message = "Click the link below to complete your application.<a href=http://acnfoundation.org/activate.php?email=".$emailid."&activate=".$activatecode."></a>";
$from = "noreply@acnfoundation.org";
$headers = 'To: '.$to. "\n";
$headers .= 'From: Africa Caribbean Network Foundation<acnfoundation.org>' . "\n";
$headers .= 'Cc: info@acnfoundation.org' . "\n";
$headers .= 'Bcc: info@acnfoundation.org' . "\n";
$success = @mail($to, $subject, $message, $headers);