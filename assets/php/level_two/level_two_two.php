<?php 

	error_reporting(E_ALL);
	if (isset($_POST['answer_one']) && isset($_POST['answer_two'])) {
		$answer_one = $_POST['answer_one'];
		$answer_two = $_POST['answer_two'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$username = $mysqli->real_escape_string($_COOKIE['_aun']);
			if (strtolower($answer_one) == "happy days" && strtolower($answer_two) == "lost" || strtolower($answer_two) == "happy days" && strtolower($answer_one) == "lost") {

				$username = $mysqli->real_escape_string($_COOKIE['_aun']);
				$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'two_part_two'");
				$point_data = $points->fetch_object();
				$points_awarded = $point_data->points_awarded;
				$minimum_points = $point_data->minimum_points;
				if ($points_awarded != $minimum_points) {
					$new_award = $points_awarded - 1000;
				} else {
					$new_award = $minimum_points;
				}

				if (getPartStatus('two_part_two') == 1) {
					$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'two_part_two'");
					$mysqli->query("UPDATE `players` SET `two_part_two` = '$points_awarded' WHERE `username` = '$username'");
					updateTotalScore();
					echo json_encode(array('response' => 'true', 'text' => 'Part 2 Complete'));	
				} else {
					echo json_encode(array('response' => 'true', 'text' => 'Already Complete'));	
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