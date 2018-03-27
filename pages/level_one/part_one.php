<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level 1.1</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		

		

		<input type="text" class="standard-input" placeholder="Answer">

		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

		</div><br><br>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
	
	</script>
</html>