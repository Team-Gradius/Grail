<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Scoreboard</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div class="kc-success-black"></div>
		<div class="kc-success-red"></div>

		<div class="sb-content">

			<?php 
				if (authSuccess()) {
					echo '<div onclick="Grail.logout()" class="sb-corner-left">Logout</div>';
					echo '<div onclick="Grail.open("diary")" class="sb-corner-right"><img class="sb-diary-icon" src="/assets/img/diary.png"></div>';
				} else {
					echo '<div onclick="Grail.login()" class="sb-corner-left">Login</div>';
				}

			 ?>
			

			<div class="kc-combo"></div>

			<div class="kc-combo-menu">
				<div data-key="37" style="line-height: 47px" class="kc-combo-button">&#11013;</div>
				<div data-key="38" style="line-height: 43px" class="kc-combo-button">&#11014;</div>
				<div data-key="40" style="line-height: 47px" class="kc-combo-button">&#11015;</div>
				<div data-key="39" style="transform: rotate(180deg); line-height: 38px;" class="kc-combo-button">&#11013;</div>
				<div data-key="65" style="padding-left: 3px" class="kc-combo-button">A</div>
				<div data-key="66" style="padding-left: 3px" class="kc-combo-button">B</div>
			</div>

			<img draggable="false" src="/assets/img/logo.svg" class="logo">
			<h1 class="sb-title">High Scores</h1>

			<table class="sb-table">
				<tr>
					<th style="width: 30%">Rank</th>
					<th style="width: 30%">Score</th>
					<th style="width: 40%;">Name</th>
				</tr>
				<tr style="color: #ffd700">
					<td>1st</td>
					<td>55,000</td>
					<td class="sb-name">
						<span class="sb-name-value">Robbie</span>
						<div class="score-icons">
							<img draggable="false" class="level-icon" src="/assets/img/lvlOne.png">
							<img draggable="false" class="level-icon" src="/assets/img/lvlTwo.png">
							<img draggable="false" class="level-icon" src="/assets/img/lvlThree.png">
						</div>
					</td>
				</tr>
			</table>

			<div class="footer">&copy; Konami 1983</div>

		</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script src="assets/js/scoreboard.js"></script>
	<script type="text/javascript">
	</script>
</html>