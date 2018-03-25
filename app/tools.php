<?php 

	function authRequired($location) {
		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$username = $mysqli->real_escape_string($_COOKIE['_aun']);
			$password = $mysqli->real_escape_string($_COOKIE['_apw']);
			$data = $mysqli->query("SELECT `username`, `passwordHash` FROM `players` WHERE `username` = '$username' AND `passwordHash` = '$password'");
			if ($data->num_rows > 0)
				page($location);
			else
				header('Location: /');
		} else {
			header('Location: /');
		}
	}

 ?>