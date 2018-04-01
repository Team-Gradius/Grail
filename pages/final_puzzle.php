<?php 

	if (!isset($_COOKIE['final_puzzle_stage'])) {
		page('final_puzzle/text');
	} else if ($_COOKIE['final_puzzle_stage'] == 1) {
		page('final_puzzle/grail');
	} else if ($_COOKIE['final_puzzle_stage'] == 2) {
		page('final_puzzle/chat');
	} else {
		page('final_puzzle/finish');
	}

 ?>