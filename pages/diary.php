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

				<div class="diary-item <?php getPuzzleStyle('one_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php getPuzzleScore('one_part_one'); ?></div>
					<?php getPuzzleLock('one_part_one'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('one_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php getPuzzleScore('one_part_two'); ?></div>
					<?php getPuzzleLock('one_part_two'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('one_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php getPuzzleScore('one_part_three'); ?></div>
					<?php getPuzzleLock('one_part_three'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('one_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php getPuzzleScore('one_bonus'); ?></div>
					<?php getPuzzleLock('one_bonus'); ?>
				</div>


				<h1 class="diary-sub level-locked">Level 2 <div class="clue-button disabled-state">Clue</div></h1>

				<div class="diary-item <?php getPuzzleStyle('two_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php getPuzzleScore('two_part_one'); ?></div>
					<?php getPuzzleLock('two_part_one'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('two_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php getPuzzleScore('two_part_two'); ?></div>
					<?php getPuzzleLock('two_part_two'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('two_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php getPuzzleScore('two_part_three'); ?></div>
					<?php getPuzzleLock('two_part_three'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('two_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php getPuzzleScore('two_bonus'); ?></div>
					<?php getPuzzleLock('two_bonus'); ?>
				</div>

				<h1 class="diary-sub level-locked">Level 3 <div class="clue-button disabled-state">Clue</div></h1>

				<div class="diary-item <?php getPuzzleStyle('three_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php getPuzzleScore('three_part_one'); ?></div>
					<?php getPuzzleLock('three_part_one'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('three_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php getPuzzleScore('three_part_two'); ?></div>
					<?php getPuzzleLock('three_part_two'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('three_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php getPuzzleScore('three_part_three'); ?></div>
					<?php getPuzzleLock('three_part_three'); ?>
				</div>

				<div class="diary-item <?php getPuzzleStyle('three_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php getPuzzleScore('three_bonus'); ?></div>
					<?php getPuzzleLock('three_bonus'); ?>
				</div>

			</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script src="assets/js/diary.js"></script>
</html>