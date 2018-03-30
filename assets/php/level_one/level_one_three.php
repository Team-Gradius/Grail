<?php 

	error_reporting(E_ALL);
	if (isset($_POST['input']) && isset($_POST['answer']) && isset($_POST['count'])) {

		$input = $_POST['input'];
		$count = $_POST['count'];
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
				if ($count == 3) {
					// Update SQL Record
					$mysqli = mysqli_connect("localhost","root","root","grail");
					$username = $mysqli->real_escape_string($_COOKIE['_aun']);
					$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'one_part_three'");
					$point_data = $points->fetch_object();
					$points_awarded = $point_data->points_awarded;
					$minimum_points = $point_data->minimum_points;
					if ($points_awarded != $minimum_points) {
						$new_award = $points_awarded - 100;
					} else {
						$new_award = $minimum_points;
					}

					if (getPartStatus('one_part_three') == 1) {
						$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'one_part_three'");
						$mysqli->query("UPDATE `players` SET `one_part_three` = '$points_awarded' WHERE `username` = '$username'");
						updateTotalScore();
						echo json_encode(array('complete' => 'true', 'response' => 'true', 'text' => 'Part 3 Complete'));	
					} else {
						echo json_encode(array('complete' => 'true', 'response' => 'true', 'text' => 'Already Complete'));	
					}
				} else {
					echo json_encode(array('response' => 'true'));
				}
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