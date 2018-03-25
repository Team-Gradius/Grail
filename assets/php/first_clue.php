<?php 

	if (isset($_POST['answer'])) {
		$answer = $_POST['answer'];
		if (is_numeric($answer)) {
			if ($answer == 126) {
				if (isset($_COOKIE['_aun']) && isset($_COOKIE['_apw'])) {
					echo json_encode(array('response' => 'true', 'url' => '/diary'));
				} else {
					setcookie('_uaa', true, time() + (60 * 5), '/');
					echo json_encode(array('response' => 'true', 'url' => '/auth/create'));
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