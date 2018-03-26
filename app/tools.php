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
		return $data->fetch_object()->totalScore;  
	}

	function getCurrentRank() {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT `username`, `totalScore`, `dateCreated` FROM `players` WHERE 1 ORDER BY `totalScore` DESC, `dateCreated` ASC");
		$i = 1;
		while ($info = $data->fetch_assoc()) {
			if ($info['username'] == $username) {
				return addSuffix($i);
			}
			$i++;
		}
	}

	function getPuzzleScore($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		return $data->fetch_object()->$item;  
	}

	function getPuzzleStyle($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$item;  
		if ($check == 0) {
			echo 'part-disabled';
		} else if ($check > 1) {
			echo 'part-solved';
		}
	}

	function getScoreboardIcon($name, $location, $username) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$data = $mysqli->query("SELECT $name FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$name;   
		if ($check == 'true') {
			echo '<img draggable="false" class="level-icon" src="/assets/img/'.$location.'.png">';
		}
	}

	function getPuzzleLock($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$item;  
		if ($check == 0) {
			echo '<img draggable="false" class="lock-icon" src="/assets/img/locked.png">';
		} else if ($check > 1) {
			echo '<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">';
		}
	}

 ?>