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

	function getPuzzleUnlockStatus($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$item; 
		if ($check >= 1) {
			return true;
		} else {
			return false;
		}
	}

	function authAndUnlockRequired($type, $field, $location) {
		if (authSuccess()) {
			if (getPuzzleUnlockStatus($field)) {
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
		} else {
			header('Location: /');
		}
	}

	function scoreRequired($type, $score, $location) {
		if (authSuccess()) {
			if (getCurrentScore() >= $score) {
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
		} else {
			header('Location: /');
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

	function updateTotalScore() {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT * FROM `players` WHERE `username` = '$username'");
		$info = $data->fetch_object();  
		$first_puzzle = $info->first_puzzle;
		$one_part_one = $info->one_part_one;
		$one_part_two = $info->one_part_two;
		$one_part_three = $info->one_part_three;
		$one_bonus = $info->one_bonus;
		$two_part_one = $info->two_part_one;
		$two_part_two = $info->two_part_two;
		$two_part_three = $info->two_part_three;
		$two_bonus = $info->two_bonus;
		$three_part_one = $info->three_part_one;
		$three_part_two = $info->three_part_two;
		$three_part_three = $info->three_part_three;
		$three_bonus = $info->three_bonus;
		$final_puzzle = $info->final_puzzle;
		
		$newTotalScore = 0;
		if ($first_puzzle > 1) {$newTotalScore = $newTotalScore + $first_puzzle;}
		if ($one_part_one > 1) {$newTotalScore = $newTotalScore + $one_part_one;}
		if ($one_part_two > 1) {$newTotalScore = $newTotalScore + $one_part_two;}
		if ($one_part_three > 1) {$newTotalScore = $newTotalScore + $one_part_three;}
		if ($one_bonus > 1) {$newTotalScore = $newTotalScore + $one_bonus;}
		if ($two_part_one > 1) {$newTotalScore = $newTotalScore + $two_part_one;}
		if ($two_part_two > 1) {$newTotalScore = $newTotalScore + $two_part_two;}
		if ($two_part_three > 1) {$newTotalScore = $newTotalScore + $two_part_three;}
		if ($two_part_three > 1) {$newTotalScore = $newTotalScore + $two_part_three;}
		if ($three_part_one > 1) {$newTotalScore = $newTotalScore + $three_part_one;}
		if ($three_part_two > 1) {$newTotalScore = $newTotalScore + $three_part_two;}
		if ($three_part_three > 1) {$newTotalScore = $newTotalScore + $three_part_three;}
		if ($three_bonus > 1) {$newTotalScore = $newTotalScore + $three_bonus;}
		if ($final_puzzle > 1) {$newTotalScore = $newTotalScore + $final_puzzle;}

		$data = $mysqli->query("UPDATE `players` SET `totalScore` = '$newTotalScore' WHERE `username` = '$username'");
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

	function getPartStatus($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		return $data->fetch_object()->$item;  
	}

	function getPuzzleScore($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		return $data->fetch_object()->$item;  
	}

	function displayPuzzleScore($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$score = $data->fetch_object()->$item;
		if ($score > 1) {
			echo $score;
		}  
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

	function getPartPage($item, $location) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$item;  
		if ($check >= 1) {
			echo 'onclick="Grail.open(\''.$location.'\')"';
		}
	}

	function getScoreboardIcon($score, $location, $username) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$data = $mysqli->query("SELECT `totalScore` FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->totalScore;   
		if ($check >= $score) {
			echo '<img draggable="false" class="level-icon" src="/assets/img/'.$location.'.png">';
		}
	}

	function getGrailIcon($username) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$data = $mysqli->query("SELECT `final_puzzle` FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->final_puzzle;   
		if ($check > 1) {
			echo '<img draggable="false" class="level-icon" src="/assets/img/favicon.png">';
		}
	}

	function getPuzzleLock($item) {
		$mysqli = mysqli_connect("localhost","root","root","grail");
		$username = $mysqli->real_escape_string($_COOKIE['_aun']);
		$data = $mysqli->query("SELECT $item FROM `players` WHERE `username` = '$username'");
		$check = $data->fetch_object()->$item;  
		if ($check == 0) {
			echo '<img draggable="false" class="lock-icon" src="/assets/img/locked.png">';
		} else if ($check >= 1) {
			echo '<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">';
		}
	}

 ?>