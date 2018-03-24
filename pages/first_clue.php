<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - First Clue</title>
		<?php include(__dir__.'/../blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('')" class="sb-corner-right">
			<img class="sb-diary-icon" src="assets/img/home.png">
		</div>		

		<p class="clue-text">
			In your knowledge and <span style="color: #f3f7db;">Charity</span> of others
			<br>the first integer found will bring <span style="color: #f3f7db;">Hope</span>
			<br>keep your <span style="color: #f3f7db;">Faith</span> and apply both the numbers
			<br>The second within Deep Thought’s scope
		</p>

		<input type="number" class="standard-input" placeholder="Answer">

		<div class="submit-button">Enter</div>

		</div>

	</body>
	<?php include(__dir__.'/../blades/scripts.blade.html'); ?>
</html>