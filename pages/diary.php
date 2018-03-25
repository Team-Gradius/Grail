<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Diary</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

			<?php 
				if (authSuccess())
					echo '<div onclick="Grail.logout()" class="sb-corner-left">Logout</div>';
			 ?>
			
			<div onclick="Grail.open('')" class="sb-corner-right">
				<img class="sb-diary-icon" src="/assets/img/home.png">
			</div>
	
			<h1 class="diary-title">Grail Diary</h1>

			<h3 class="diary-message">
				Your Score is <span style="color: gold;"><?php getCurrentScore() ?></span>
				<br>Current Rank <span style="color: gold;"><?php getCurrentRank() ?></span>
			</h3>

			<div class="diary-wrapper">

				<h1 style="font-size: 18px;" class="diary-sub">Starters</h1>
				<div class="diary-item part-solved unclickable-part">
					<h3 class="diary-item-title">Konami Code</h3>
					<div style="right: 10px" class="score-awarded">0</div>
				</div>
				
				<div onclick="Grail.open('048A3A56B014940E73F89C2F98DB2C06')" class="diary-item part-solved">
					<h3 class="diary-item-title">126</h3>
					<div style="right: 10px" class="score-awarded"><?php echo getPuzzleStatus('first_puzzle') ?></div>
				</div>

				<h1 class="diary-sub">Level 1 <div onclick="Grail.open('clue/level-one')" class="clue-button">Clue</div></h1>
				<?php 

					if (getPuzzleStatus('one_part_one') == 0) {
						echo '<div class="diary-item part-disabled">
								<h3 class="diary-item-title">Part One</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
							</div>';
					} else if (getPuzzleStatus('one_part_one') == 1) {
						echo '<div class="diary-item">
								<h3 class="diary-item-title">Part One</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					} else {
						echo '<div class="diary-item part-solved">
								<h3 class="diary-item-title">Part One</h3>
								<div class="score-awarded">'.getPuzzleStatus('one_part_one').'</div>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					}

					if (getPuzzleStatus('one_part_two') == 0) {
						echo '<div class="diary-item part-disabled">
								<h3 class="diary-item-title">Part Two</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
							</div>';
					} else if (getPuzzleStatus('one_part_two') == 1) {
						echo '<div class="diary-item">
								<h3 class="diary-item-title">Part Two</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					} else {
						echo '<div class="diary-item part-solved">
								<h3 class="diary-item-title">Part Two</h3>
								<div class="score-awarded">'.getPuzzleStatus('one_part_two').'</div>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					}

					if (getPuzzleStatus('one_part_three') == 0) {
						echo '<div class="diary-item part-disabled">
								<h3 class="diary-item-title">Part Three</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
							</div>';
					} else if (getPuzzleStatus('one_part_three') == 1) {
						echo '<div class="diary-item">
								<h3 class="diary-item-title">Part Three</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					} else {
						echo '<div class="diary-item part-solved">
								<h3 class="diary-item-title">Part Three</h3>
								<div class="score-awarded">'.getPuzzleStatus('one_part_three').'</div>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					}

					if (getPuzzleStatus('one_bonus') == 0) {
						echo '<div class="diary-item part-disabled">
								<h3 class="diary-item-title">Bonus</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
							</div>';
					} else if (getPuzzleStatus('one_bonus') == 1) {
						echo '<div class="diary-item">
								<h3 class="diary-item-title">Bonus</h3>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					} else {
						echo '<div class="diary-item part-solved">
								<h3 class="diary-item-title">Bonus</h3>
								<div class="score-awarded">'.getPuzzleStatus('one_bonus').'</div>
								<img draggable="false" class="lock-icon" src="/assets/img/unlocked.png">
							</div>';
					}

				 ?>

				<h1 class="diary-sub level-locked">Level 2 <div class="clue-button disabled-state">Clue</div></h1>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part One</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Two</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Three</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item bonus-disabled">
					<h3 class="diary-item-title">Bonus</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>

				<h1 class="diary-sub level-locked">Level 3 <div class="clue-button disabled-state">Clue</div></h1>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part One</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Two</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item part-disabled">
					<h3 class="diary-item-title">Part Three</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>
				<div class="diary-item bonus-disabled">
					<h3 class="diary-item-title">Bonus</h3>
					<img draggable="false" class="lock-icon" src="/assets/img/locked.png">
				</div>

			</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script src="assets/js/diary.js"></script>
</html>