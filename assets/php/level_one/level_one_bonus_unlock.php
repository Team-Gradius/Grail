<?php 
	
	if (isset($_POST['answer'])) {
		$answer = $_POST['answer'];
		if (strtolower($answer) == 'grue') {
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$username = $mysqli->real_escape_string($_COOKIE['_aun']);
			if (getPartStatus('one_bonus') == 0) {
				$mysqli->query("UPDATE `players` SET `one_bonus` = '1' WHERE `username` = '$username'");
				echo json_encode(array('response' => 'true', 'text' => 'Bonus Unlocked!'));	
			} else {
				echo json_encode(array('response' => 'true', 'text' => 'Already Unlocked'));	
			}
		} else {
			echo json_encode(array('response' => 'false'));
		}
	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>