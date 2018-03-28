<?php 

	error_reporting(E_ALL);
	if (isset($_POST['input']) && isset($_POST['answer'])  && isset($_POST['fails']) && isset($_POST['count'])) {

		$input = $_POST['input'];
		$answer = $_POST['answer'];
		$count = $_POST['count'];
		$fails = $_POST['fails'];

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
			$real_answer = grail_crypt($answer, 'd');
			$formatted_input = strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $input));
			if ($formatted_input == 'test') {
				if ($count == 3 && $fails == 0) {
					echo json_encode(array('response' => 'true', 'final' => '27ae2ea731cd1ef325264d1255d00a94'));
				} else {
					echo json_encode(array('response' => 'true'));
				}
			} else {
				echo json_encode(array('response' => 'false'));
			}


		} else {
			echo json_encode(array('response' => 'false'));
		}


	} else if (isset($_POST['final_key'])) {
		if ($_POST['final_key'] == '27ae2ea731cd1ef325264d1255d00a94') {
			$username = $_COOKIE['_aun'];
			// Update SQL Record
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'one_part_one'");
			$point_data = $points->fetch_object();
			$points_awarded = $point_data->points_awarded;
			$minimum_points = $point_data->minimum_points;
			if ($points_awarded != $minimum_points) {
				$new_award = $points_awarded - 100;
			} else {
				$new_award = $minimum_points;
			}

			$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'one_part_one'");

			if (getPartStatus('one_part_one') == 1) {
				$mysqli->query("UPDATE `players` SET `one_part_one` = '$points_awarded' WHERE `username` = '$username'");
				updateTotalScore();
				echo json_encode(array('response' => 'true', 'text' => 'Part 1 Complete'));	
			} else {
				echo json_encode(array('response' => 'true', 'text' => 'Already Complete'));	
			}
			echo json_encode(array('response' => 'complete'));
		}
	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>