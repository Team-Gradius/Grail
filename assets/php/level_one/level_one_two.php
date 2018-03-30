<?php 

	error_reporting(E_ALL);
	if (isset($_POST['id']) && isset($_POST['answer'])) {

		$id = $_POST['id'];
		$answer = $_POST['answer'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			
			if ($id == '234902384') {
				if (is_numeric($answer) && $answer == 69105) {
					echo json_encode(array('response' => 'true', 'id' => '634502644', 'text' => 'To fight, bare knuckle<br>in the streets, a hunter must<br>defeat a great foe.'));
				} else {
					echo json_encode(array('response' => 'false'));
				}
			} else if ($id == '634502644') {
				if (strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $answer)) == 'mr x') {
					echo json_encode(array('response' => 'true', 'id' => '134545634', 'text' => 'A processing plant<br>The spy will unlock for you,<br>Now fight each other.'));
				} else {
					echo json_encode(array('response' => 'false'));
				}
			} else if ($id == '134545634') {
				if (strtolower($answer) == 'facility') {
					// Update SQL
					$mysqli = mysqli_connect("localhost","root","root","grail");
					$username = $mysqli->real_escape_string($_COOKIE['_aun']);
					$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'one_part_two'");
					$point_data = $points->fetch_object();
					$points_awarded = $point_data->points_awarded;
					$minimum_points = $point_data->minimum_points;
					if ($points_awarded != $minimum_points) {
						$new_award = $points_awarded - 100;
					} else {
						$new_award = $minimum_points;
					}

					if (getPartStatus('one_part_two') == 1) {
						$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'one_part_two'");
						$mysqli->query("UPDATE `players` SET `one_part_two` = '$points_awarded' WHERE `username` = '$username'");
						updateTotalScore();
						echo json_encode(array('response' => 'true', 'complete' => 'true'));
					} else {
						echo json_encode(array('response' => 'true', 'complete' => 'true'));
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

	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>