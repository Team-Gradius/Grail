<?php 

	error_reporting(E_ALL);
	if (isset($_POST['id']) && isset($_POST['answer'])) {

		$id = $_POST['id'];
		$answer = $_POST['answer'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			
			if ($id == '3947304') {
				if (strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $answer)) == 'spice girls') {
					echo json_encode(array('response' => 'true', 'id' => '593740', 'video_id' => 'DnsD0B7dRic'));
				} else {
					echo json_encode(array('response' => 'false'));
				}
			} else if ($id == '593740') {
				if (strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $answer)) == 'new order') {
					echo json_encode(array('response' => 'true', 'id' => '1394739', 'video_id' => 'e3vBmIvKgMM'));
				} else {
					echo json_encode(array('response' => 'false'));
				}
			} else if ($id == '1394739') {
				if (strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $answer)) == 'nickelback') {
					// Update SQL
					$mysqli = mysqli_connect("localhost","root","root","grail");
					$username = $mysqli->real_escape_string($_COOKIE['_aun']);
					$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'three_part_three'");
					$point_data = $points->fetch_object();
					$points_awarded = $point_data->points_awarded;
					$minimum_points = $point_data->minimum_points;
					if ($points_awarded != $minimum_points) {
						$new_award = $points_awarded - 10000;
					} else {
						$new_award = $minimum_points;
					}

					if (getPartStatus('three_part_three') == 1) {
						$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'three_part_three'");
						$mysqli->query("UPDATE `players` SET `three_part_three` = '$points_awarded' WHERE `username` = '$username'");
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