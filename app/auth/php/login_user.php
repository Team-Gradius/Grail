<?php 

	if (isset($_POST['email']) && isset($_POST['password'])) {

		date_default_timezone_set('Australia/Adelaide');

		$mysqli = mysqli_connect("localhost","root","root","grail");
		$email = $_POST['email'];
		$password = $_POST['password'];
		$email_check = $mysqli->real_escape_string($email);

		$data = $mysqli->query("SELECT `username`,`passwordHash`,`passwordSalt` FROM `players` WHERE `email` = '$email_check'");

		$status = false;
		$hash = "";
		$username = "";
		if ($data->num_rows > 0) {
			while ($test = $data->fetch_assoc()) {
				if (crypt($password, $test['passwordSalt']) == $test['passwordHash']) {
					$status = true;
					$username = $test['username'];
					$hash = $test['passwordHash'];
				}
			}
		}


		if ($status == true) {
			setcookie("_aun", $username, 2147483647, '/');
			setcookie("_apw", $hash, 2147483647, '/');

			echo json_encode(array('response' => 'true', 'url' => '/diary'));
		} else {
			echo json_encode(array('response' => 'false'));
		}

	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>