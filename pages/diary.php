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

			<!-- <div class="popup-wrapper">
				<div class="popup">
					<div class="diary-close">X</div>
					<h1 class="popup-title">Welcome</h1>
					<p class="popup-text">This is your Grail Diary, here you can monitor your progress and access unlocked levels, parts and bonuses.</p>
				</div>	
			</div> -->
	
			<h1 class="diary-title">Grail Diary</h1>

			<h3 class="diary-message">
				Your Score is <span style="color: gold;">55,000</span>
				<br>Current Rank <span style="color: gold;">30th</span>
			</h3>

			<div class="diary-wrapper">
			
				<h1 class="diary-sub">Level 1 <div class="clue-button">Clue</div></h1>
				<div class="diary-item">
					<h3 class="diary-item-title">Part One</h3>
					<img class="lock-icon" src="assets/img/unlocked.png">
				</div>
				<div class="diary-item">
					<h3 class="diary-item-title">Part Two</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item">
					<h3 class="diary-item-title">Part Three</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item bonus-disabled">
					<h3 class="diary-item-title">Bonus</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>

				<h1 class="diary-sub level-locked">Level 2 <div class="clue-button disabled-state">Clue</div></h1>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part One</h3>
					<img class="lock-icon" src="assets/img/unlocked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Two</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Three</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item bonus-disabled">
					<h3 class="diary-item-title">Bonus</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>

				<h1 class="diary-sub level-locked">Level 3 <div class="clue-button disabled-state">Clue</div></h1>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part One</h3>
					<img class="lock-icon" src="assets/img/unlocked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Two</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Three</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>
				<div class="diary-item bonus-disabled">
					<h3 class="diary-item-title">Bonus</h3>
					<img class="lock-icon" src="assets/img/locked.png">
				</div>

			</div>

	</body>
	<?php include(__dir__.'/../blades/scripts.blade.html'); ?>
	<script src="assets/js/diary.js"></script>
</html>