<?php

# This function will perform a direct (authenticated) login to
# a SMTP Server to use for mail relaying if 'wgSMTP' specifies an
# array of parameters. It requires PEAR:Mail to do that.
# Otherwise it just uses the standard PHP 'mail' function.
function userMailer( $to, $from, $subject, $body )
{
	global $wgUser, $wgSMTP, $wgOutputEncoding;
	
  	$qto = wfQuotedPrintable( $to );
	
	if (is_array( $wgSMTP ))
	{
		include_once( "Mail.php" );
		
		$timestamp = time();
	
		$headers["From"] = $from;
		$headers["To"] = $qto;
		$headers["Subject"] = $subject;
		$headers["MIME-Version"] = "1.0";
		$headers["Content-type"] = "text/plain; charset={$wgOutputEncoding}";
		$headers["Content-transfer-encoding"] = "8bit";
		$headers["Message-ID"] = "<{$timestamp}" . $wgUser->getName() . "@" . $wgSMTP["IDHost"] . ">";
		$headers["X-Mailer"] = "MediaWiki interuser e-mailer";
	
		// Create the mail object using the Mail::factory method
		$mail_object =& Mail::factory("smtp", $wgSMTP);
	
		$mailResult =& $mail_object->send($to, $headers, $body);
		
		# Based on the result return an error string, 
		if ($mailResult === true)
			return "";
		else if (is_object($mailResult))
			return $mailResult->getMessage();
		else
			return "Mail object return unknown error.";
	}
	
	else
	{
		$headers =
			"MIME-Version: 1.0\r\n" .
			"Content-type: text/plain; charset={$wgOutputEncoding}\r\n" .
			"Content-transfer-encoding: 8bit\r\n" .
			"From: {$from}\r\n" .
			"Reply-To: {$from}\r\n" .
			"To: {$qto}\r\n" .
			"X-Mailer: MediaWiki interuser e-mailer";
		mail( $to, $subject, $body, $headers );
		
		return "";
	}
}

?>