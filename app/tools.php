<?php 

	function authRequired($type, $location) {
		if (authSuccess()) {
			switch ($type) {
				case 'page':
					page($location);
					break;
				case 'app':
					app($location);
					break;
				case 'code':
					code($location);
					break;
			}
		} else {
			header('Location: /');
		}
	}


	function authSuccess() {
		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			$mysqli = mysqli_connect("localhost","root","root","grail");
			$username = $mysqli->real_escape_string($_COOKIE['_aun']);
			$password = $mysqli->real_escape_string($_COOKIE['_apw']);
			$data = $mysqli->query("SELECT `username`, `passwordHash` FROM `players` WHERE `username` = '$username' AND `passwordHash` = '$password'");
			if ($data->num_rows > 0)
				return true;
			else
				return false;
		} else {
			return false;
		}
	}

	function addSuffix($num) {
	    if (!in_array(($num % 100),array(11,12,13))){
	      switch ($num % 10) {
	        case 1:  return $num.'st';
	        case 2:  return $num.'nd';
	        case 3:  return $num.'rd';
	      }
	    }
	    return $num.'th';
	}

	function getCurrentScore() {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT `totalScore` FROM `players` WHERE `username` = '$username'");
		echo $data->current_field;
	}

	function getCurrentRank() {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT `username`, `totalScore`, `dateCreated` FROM `players` WHERE 1 ORDER BY `totalScore` DESC, `dateCreated` ASC");
		$i = 1;
		while ($info = $data->fetch_assoc()) {
			if ($info['username'] == $username) {
				echo addSuffix($i);
			}
			$i++;
		}
	}

 ?>