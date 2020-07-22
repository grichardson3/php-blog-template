<?php

	function redirect_to($location) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}

	function submitMessage($name, $email, $subject, $message, $direct) {
		$to = "hello@garethrichardsonmedia.com";
		$subj = $subject;
		$extra = "Reply-To: ".$email;
		$msg = "Name: ".$name."\n\nEmail: ".$email."\n\nComments: ".$message;

		// Can't test locally
		mail($to,$subj,$msg,$extra);

		//$direct = $direct."?name={$name}";
		redirect_to($direct);
	}
?>