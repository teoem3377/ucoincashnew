<?php 
       $url="https://www.google.com/recaptcha/api/siteverify";
		$privatekey="6LcbtjoUAAAAAJ-fOCCgWi4UV6PoYeksSYOtH08z";
		$captcha = @$_POST['g-recaptcha-response'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeWvDoUAAAAAMxsjA2uw8WYhODEZrYM0U06RKqp&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$data=json_decode($response,TRUE);
		if($data['success'])
			echo "1";
		else echo "0";
		var_dump($response);