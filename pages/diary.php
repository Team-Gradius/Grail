<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Diary</title>
		<?php include(__dir__.'/../blades/head.blade.html'); ?>
	</head>
	<body>

			<div onclick="Grail.logout()" class="sb-corner-left">Logout</div>
			
			<div onclick="Grail.open('')" class="sb-corner-right">
				<img class="sb-diary-icon" src="assets/img/home.png">
			</div>
	
			<h1 class="sb-title">Diary</h1>

		</div>

	</body>
	<?php include(__dir__.'/../blades/scripts.blade.html'); ?>
</html>