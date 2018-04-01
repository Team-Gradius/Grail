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
				Your Score is <span style="color: gold;"><?php echo number_format(getCurrentScore()) ?></span>
				<br>Current Rank <span style="text-transform: uppercase; color: gold;"><?php echo getCurrentRank() ?></span>
			</h3>

			<div class="diary-wrapper">

				<h1 style="font-size: 18px;" class="diary-sub">Starters</h1>
				<div class="diary-item part-solved unclickable-part">
					<h3 class="diary-item-title">Konami Code</h3>
					<div style="right: 10px" class="score-awarded"></div>
				</div>
				
				<div onclick="Grail.open('048A3A56B014940E73F89C2F98DB2C06')" class="diary-item part-solved">
					<h3 class="diary-item-title">126</h3>
					<div style="right: 10px" class="score-awarded"><?php displayPuzzleScore('first_puzzle') ?></div>
				</div>

				<h1 class="diary-sub">Level 1 <div onclick="Grail.open('clue/level-one')" class="clue-button">Clue</div></h1>

				<div <?php getPartPage('one_part_one', 'level_one/part_one') ?> class="diary-item <?php getPuzzleStyle('one_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php displayPuzzleScore('one_part_one'); ?></div>
					<?php getPuzzleLock('one_part_one'); ?>
				</div>

				<div <?php getPartPage('one_part_two', 'level_one/part_two') ?> class="diary-item <?php getPuzzleStyle('one_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php displayPuzzleScore('one_part_two'); ?></div>
					<?php getPuzzleLock('one_part_two'); ?>
				</div>

				<div <?php getPartPage('one_part_three', 'level_one/part_three') ?> class="diary-item <?php getPuzzleStyle('one_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php displayPuzzleScore('one_part_three'); ?></div>
					<?php getPuzzleLock('one_part_three'); ?>
				</div>

				<div <?php getPartPage('one_bonus', 'level_one/bonus') ?> class="diary-item <?php getPuzzleStyle('one_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php displayPuzzleScore('one_bonus'); ?></div>
					<?php getPuzzleLock('one_bonus'); ?>
				</div>

				<?php 

					if (getCurrentScore() >= 1500) {
						echo '<h1 class="diary-sub">Level 2 <div onclick="Grail.open(\'clue/level-two\')" class="clue-button">Clue</div></h1>';
					} else {
						echo '<h1 class="diary-sub level-locked">Level 2 <div class="clue-button disabled-state">Clue</div></h1>';
					}

				?>

				<div <?php getPartPage('two_part_one', 'level_two/part_one') ?> class="diary-item <?php getPuzzleStyle('two_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php displayPuzzleScore('two_part_one'); ?></div>
					<?php getPuzzleLock('two_part_one'); ?>
				</div>

				<div <?php getPartPage('two_part_two', 'level_two/part_two') ?> class="diary-item <?php getPuzzleStyle('two_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php displayPuzzleScore('two_part_two'); ?></div>
					<?php getPuzzleLock('two_part_two'); ?>
				</div>

				<div <?php getPartPage('two_part_three', 'level_two/part_three') ?> class="diary-item <?php getPuzzleStyle('two_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php displayPuzzleScore('two_part_three'); ?></div>
					<?php getPuzzleLock('two_part_three'); ?>
				</div>

				<div <?php getPartPage('two_bonus', 'level_two/bonus') ?> class="diary-item <?php getPuzzleStyle('two_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php displayPuzzleScore('two_bonus'); ?></div>
					<?php getPuzzleLock('two_bonus'); ?>
				</div>

				<?php 

					if (getCurrentScore() >= 15000) {
						echo '<h1 class="diary-sub">Level 3 <div onclick="Grail.open(\'clue/level-three\')" class="clue-button">Clue</div></h1>';
					} else {
						echo '<h1 class="diary-sub level-locked">Level 3 <div class="clue-button disabled-state">Clue</div></h1>';
					}

				?>

				<div <?php getPartPage('three_part_one', 'level_three/part_one') ?> class="diary-item <?php getPuzzleStyle('three_part_one'); ?>">
					<h3 class="diary-item-title">Part One</h3>
					<div class="score-awarded"><?php displayPuzzleScore('three_part_one'); ?></div>
					<?php getPuzzleLock('three_part_one'); ?>
				</div>

				<div <?php getPartPage('three_part_two', 'level_three/part_two') ?> class="diary-item <?php getPuzzleStyle('three_part_two'); ?>">
					<h3 class="diary-item-title">Part Two</h3>
					<div class="score-awarded"><?php displayPuzzleScore('three_part_two'); ?></div>
					<?php getPuzzleLock('three_part_two'); ?>
				</div>

				<div <?php getPartPage('three_part_three', 'level_three/part_three') ?> class="diary-item <?php getPuzzleStyle('three_part_three'); ?>">
					<h3 class="diary-item-title">Part Three</h3>
					<div class="score-awarded"><?php displayPuzzleScore('three_part_three'); ?></div>
					<?php getPuzzleLock('three_part_three'); ?>
				</div>

				<div <?php getPartPage('three_bonus', 'level_three/bonus') ?> class="diary-item <?php getPuzzleStyle('three_bonus'); ?>">
					<h3 class="diary-item-title">Bonus</h3>
					<div class="score-awarded"><?php displayPuzzleScore('three_bonus'); ?></div>
					<?php getPuzzleLock('three_bonus'); ?>
				</div>

				<?php 

					if (getCurrentScore() >= 150000) {
						echo '<h1 style="text-transform: uppercase;" class="diary-sub">The Grail</h1><div onclick="Grail.open(\'final_puzzle\')" class="diary-item"><h3 class="diary-item-title">Final Puzzle</h3><div class="score-awarded">'.displayPuzzleScore('final_puzzle').'</div><img draggable="false" class="lock-icon" src="/assets/img/unlocked.png"></div>';
					} else {
						echo '<h1 style="text-transform: uppercase;" class="diary-sub level-locked">The Grail</h1><div class="diary-item part-disabled"><h3 class="diary-item-title">Final Puzzle</h3><div class="score-awarded"></div><img draggable="false" class="lock-icon" src="/assets/img/locked.png"></div>';
					}

				?>

			</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script src="assets/js/diary.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>