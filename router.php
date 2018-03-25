<?php 

	error_reporting(E_ALL);
	$url_base = rtrim($_SERVER['REQUEST_URI'], '/');

	function page($name) { include('pages/'.$name.'.php'); }
	function app($name) { include('app/'.$name.'.php'); }
	function code($name) { include('assets/php/'.$name.'.php'); }
	app('tools');

		// Frontend Pages
		if ($url_base == '')  {
			page('landing');
		} else if ($url_base == '/diary')  {
			authRequired('diary');
		} else if ($url_base == '/048A3A56B014940E73F89C2F98DB2C06')  {
			page('first_clue');
		} else if ($url_base == '/clue/level-one')  {
			page('level_one/clue');

		// Backend Pages
		} else if ($url_base == '/data/15ec430e978d726133be311b5d3b1097')  {
			code('first_clue');

		// Other
		} else if ($url_base == '/auth/create')  {
			if (isset($_COOKIE['_uaa']) && $_COOKIE['_uaa'] == true) {
				app('auth/create');
			} else {
				header('Location: /');
			}
		} else if ($url_base == '/auth/data/create_user')  {
			app('auth/php/create_user');
		} else if ($url_base == '/auth/login')  {
			app('auth/login');
		} else if ($url_base == '/auth/logout')  {
			app('auth/php/logout.php');
		} else {
			page('error');
		}

 ?>