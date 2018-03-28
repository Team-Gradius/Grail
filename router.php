<?php 

	error_reporting(E_ALL);
	$url_base = rtrim($_SERVER['REQUEST_URI'], '/');

	function page($name) { include('pages/'.$name.'.php'); }
	function app($name) { include('app/'.$name.'.php'); }
	function code($name) { include('assets/php/'.$name.'.php'); }
	app('tools');

	// Frontend Pages
		// Core Pages
		if ($url_base == '')  {
			page('scoreboard');
		} else if ($url_base == '/diary')  {
			authRequired('page', 'diary');
		} else if ($url_base == '/048A3A56B014940E73F89C2F98DB2C06')  {
			page('first_clue');

		// Level One
		} else if ($url_base == '/clue/level-one')  {
			authRequired('page', 'level_one/clue');
		} else if ($url_base == '/level_one/part_one')  {
			authAndUnlockRequired('page', 'one_part_one', 'level_one/part_one');
		} else if ($url_base == '/level_one/part_two')  {
			authAndUnlockRequired('page', 'one_part_two', 'level_one/part_two');

	// Backend Pages
		} else if ($url_base == '/data/15ec430e978d726133be311b5d3b1097')  {
			code('first_clue');

		// Level One PHP
		} else if ($url_base == '/data/8c154af9ac2bf94569cb67a89d09b05e')  {
			code('level_one/level_one_clue');
		} else if ($url_base == '/data/8acae5da49283f7f59a919dc87b74453')  {
			code('level_one/level_one_one');
		} else if ($url_base == '/data/d3d84d54a99c8cac66e9e06fca546304')  {
			code('level_one/level_one_two');

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
		} else if ($url_base == '/auth/data/login')  {
			app('auth/php/login_user');
		} else if ($url_base == '/auth/logout')  {
			app('auth/php/logout_user');
		} else {
			page('error');
		}

 ?>