<?php 

	error_reporting(E_ALL);
	if (isset($_POST['id'])) {

		$id = $_POST['id'];

		if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
			if ($id == '2332') {
				setcookie('final_puzzle_stage', 2, time()+1, '/');
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