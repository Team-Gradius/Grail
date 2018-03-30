<?php 

	error_reporting(E_ALL);
	if (isset($_POST['answer'])) {
		$answer = $_POST['answer'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$username = $mysqli->real_escape_string($_COOKIE['_aun']);
			if (strtolower($answer) == 'faserip') {

					if (getPartStatus('two_part_one') == 0) {
						$mysqli->query("UPDATE `players` SET `two_part_one` = '1' WHERE `username` = '$username'");
						echo json_encode(array('response' => 'true', 'text' => 'Part 1 Unlocked!'));	
					} else {
						echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
					}

			} else if (strtolower($answer) == 'soleil') {

					if (getPartStatus('two_part_two') == 0) {
						$mysqli->query("UPDATE `players` SET `two_part_two` = '1' WHERE `username` = '$username'");
						echo json_encode(array('response' => 'true', 'text' => 'Part 2 Unlocked!'));	
					} else {
						echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
					}	

			} else if (strtolower($answer) == 'black sabbath') {

					if (getPartStatus('two_part_three') == 0) {
						$mysqli->query("UPDATE `players` SET `two_part_three` = '1' WHERE `username` = '$username'");
						echo json_encode(array('response' => 'true', 'text' => 'Part 3 Unlocked!'));	
					} else {
						echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
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