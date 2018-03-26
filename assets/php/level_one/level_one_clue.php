<?php 

	error_reporting(E_ALL);
	if (isset($_POST['answer'])) {
		$answer = $_POST['answer'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			$username = $_COOKIE['_aun'];
			if (strtolower($answer) == 'emmett brown') {

					$mysqli = mysqli_connect("localhost","root","root","grail");
					if (getPartStatus('one_part_one') == 0) {
						$mysqli->query("UPDATE `players` SET `one_part_one` = '1' WHERE `username` = '$username'");
						echo json_encode(array('response' => 'true', 'text' => 'Part 1 Unlocked!'));	
					} else {
						echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
					}

			} else if (strtolower($answer) == 'haiku') {

					$mysqli = mysqli_connect("localhost","root","root","grail");
					if (getPartStatus('one_part_two') == 0) {
						$mysqli->query("UPDATE `players` SET `one_part_two` = '1' WHERE `username` = '$username'");
						echo json_encode(array('response' => 'true', 'text' => 'Part 2 Unlocked!'));	
					} else {
						echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
					}	

			} else if (strtolower($answer) == 'megan follows') {

					$mysqli = mysqli_connect("localhost","root","root","grail");
					if (getPartStatus('one_part_three') == 0) {
						$mysqli->query("UPDATE `players` SET `one_part_three` = '1' WHERE `username` = '$username'");
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