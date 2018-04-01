<?php 

	error_reporting(E_ALL);
	if (isset($_POST['key'])) {

		$key = $_POST['key'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			if ($key == md5($_COOKIE['_aun'])) {
				
				// Update SQL
				$mysqli = mysqli_connect("localhost","root","root","grail");
				$username = $mysqli->real_escape_string($_COOKIE['_aun']);
				$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'final_puzzle'");
				$point_data = $points->fetch_object();
				$points_awarded = $point_data->points_awarded;
				$minimum_points = $point_data->minimum_points;
				if ($points_awarded != $minimum_points) {
					$new_award = $points_awarded - 1000000;
				} else {
					$new_award = $minimum_points;
				}

				if (getPartStatus('final_puzzle') == 0) {
					$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'final_puzzle'");
					$mysqli->query("UPDATE `players` SET `final_puzzle` = '$points_awarded' WHERE `username` = '$username'");
					updateTotalScore();
					echo json_encode(array('response' => 'true'));	
				} else {
					echo json_encode(array('response' => 'true'));	
				}

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