<?php 

	$mysqli = mysqli_connect("localhost","root","root","grail");
	$username = $mysqli->real_escape_string($_COOKIE['_aun']);
	$data = $mysqli->query("SELECT `final_puzzle` FROM `players` WHERE `username` = '$username'");
	$check = $data->fetch_object()->final_puzzle; 
	if ($check > 1) {

		page('final_puzzle/finish');

	} else {

		if (!isset($_COOKIE['final_puzzle_stage'])) {
			page('final_puzzle/text');
		} else if ($_COOKIE['final_puzzle_stage'] == 1) {
			page('final_puzzle/grail');
		} else {
			page('final_puzzle/chat');
		}
	}

 ?>