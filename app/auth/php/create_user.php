<?php 

	if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

		date_default_timezone_set('Australia/Adelaide');

		$mysqli = mysqli_connect("localhost","root","root","grail");
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username_check = $mysqli->real_escape_string($username);

		$salt = substr(uniqid(rand(), true), 16, 16);
		$hash = crypt($password, $salt);
		$date = date('d/m/Y H:i:s');

		$data = $mysqli->query("SELECT `username` FROM `players` WHERE `username` = '$username_check'");

		if ($data->num_rows > 0)
			$status = true;

		if ($status == false) {
			setcookie("_aun", $username, 2147483647, '/');
			setcookie("_apw", $hash, 2147483647, '/');
			setcookie("_uaa", false, -1, '/');

			$query = "INSERT INTO players (username, email, passwordHash, passwordSalt, dateCreated)  VALUES (?, ?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("sssss", $username, $email, $hash, $salt, $date);
			$stmt->execute();

			echo json_encode(array('response' => 'true', 'url' => '/diary'));
		} else {
			echo json_encode(array('response' => 'false'));
		}

	} else {
		echo json_encode(array('response' => 'false'));
	}

 ?>