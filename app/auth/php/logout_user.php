<?php 

	setcookie("_uaa", "", time()-3600, "/");
	setcookie("_aun", "", time()-3600, "/");
	setcookie("_apw", "", time()-3600, "/");

	header('Location: /');

 ?>