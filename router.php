<?php 

	error_reporting(E_ALL);
	$url_base = rtrim($_SERVER['REQUEST_URI'], '/');

	function page($name) { include('pages/'.$name.'.php'); }
	function app($name) { include('app/'.$name.'.php'); }
	function code($name) { include('assets/php/'.$name.'.php'); }

		// Core Pages
		if ($url_base == '')  {
			page('landing');
		} else if ($url_base == '/diary')  {
			page('diary');

		} else if ($url_base == '/048A3A56B014940E73F89C2F98DB2C06')  {
			page('first_clue');

		} else if ($url_base == '/clue/level-one')  {
			page('level_one/clue');

		// Other
		} else {
			page('error');
		}

 ?>