<?php
	require_once "Mail.php";
	
	/************************************************************/
	/* this five lines you have to change */
	$from = "noreply@some-domain.com";
	$to = "some-mail@gmail.com"; /* it can be the same tha you created it before */
	$host = "mail.some-domain.com";
	$username = "noreply@some-domain.com";
	$password = "some-pass";		
	/************************************************************/
	
	$subject = 'A message from your web-site';	
	$messageBody = "";
	
	$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	$headers = array ('From' => $from,
	   'To' => $to,
	   'Subject' => $subject);
	$smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
	 
	$mail = $smtp->send($to, $headers, $messageBody);
	 
	if (PEAR::isError($mail)) {
	  echo("<p>" . $mail->getMessage() . "</p>");
	} else {
		echo("<p>Message successfully sent!</p>");
	}

?>