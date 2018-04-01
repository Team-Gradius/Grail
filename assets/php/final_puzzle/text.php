<?php 

	error_reporting(E_ALL);
	if (isset($_POST['input']) && isset($_POST['answer'])) {

		$input = $_POST['input'];
		$answer = $_POST['answer'];

		function grail_crypt($string, $action = 'e') {
	   	 	$secret_key = 'Anoraks';
	    	$secret_iv = 'Basement';
	    	$output = false;
		    $encrypt_method = "AES-256-CBC";
		    $key = hash( 'sha256', $secret_key );
		    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		    if ($action == 'e') {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		    } else if ($action == 'd') {
		        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		    }
	    	return $output;
		}

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			
			$real_answer = strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", grail_crypt($answer, 'd')));
			$formatted_input = strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $input));
			if ($formatted_input == $real_answer) {
				setcookie('final_puzzle_stage', 1, time()+1, '/');
				echo json_encode(array('response' => 'true'));
			} else {
				echo json_encode(array('response' => 'false'));
			}

		} else {
			echo json_encode(array('response' => 'false'));
		}

	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>