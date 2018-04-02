<?php 

	if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

		date_default_timezone_set('Australia/Adelaide');

		$mysqli = mysqli_connect("localhost","root","root","grail");
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (strlen($username) <= 10 && strlen($username) >= 3) {

			$username = str_replace(' ', '', $username);
			$username = strtolower($username);
			$email = strtolower($email);

			$username_check = $mysqli->real_escape_string($username);
			$email_check = $mysqli->real_escape_string($email);

			$salt = substr(uniqid(rand(), true), 16, 16);
			$hash = crypt($password, $salt);

			$data = $mysqli->query("SELECT `username` FROM `players` WHERE `username` = '$username_check'");
			$data_2 = $mysqli->query("SELECT `email` FROM `players` WHERE `email` = '$email_check'");

			if ($data->num_rows > 0 || $data_2->num_rows > 0)
				$status = true;

			if ($status == false) {
				setcookie("_aun", $username, 2147483647, '/');
				setcookie("_apw", $hash, 2147483647, '/');
				setcookie("_uaa", false, -1, '/');

				$points = $mysqli->query("SELECT * FROM `points` WHERE `point_name` = 'first_puzzle'");
				$point_data = $points->fetch_object();
				$points_awarded = $point_data->points_awarded;
				$minimum_points = $point_data->minimum_points;
				if ($points_awarded != $minimum_points) {
					$new_award = $points_awarded - 10;
				} else {
					$new_award = $minimum_points;
				}

				$mysqli->query("UPDATE `points` SET `points_awarded`= '$new_award' WHERE `point_name` = 'first_puzzle'");
				$query = "INSERT INTO players (username, email, passwordHash, passwordSalt, totalScore, first_puzzle)  VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = $mysqli->prepare($query);
				$stmt->bind_param("ssssss", $username, $email, $hash, $salt, $points_awarded, $points_awarded);
				$stmt->execute();

				echo json_encode(array('response' => 'true', 'url' => '/diary'));
			} else {
				echo json_encode(array('response' => 'false'));
			}

		} else {
			echo json_encode(array('response' => 'long'));
		}

	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>