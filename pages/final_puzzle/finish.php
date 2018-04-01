<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - The Grail</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		
		
		<h1 class="grail-title"><img class="grail-image" src="assets/img/favicon.png">You Found The Holy Grail!<img class="grail-image" src="assets/img/favicon.png"></h1>

		<h2 class="grail-sub">Congratulations! your quest is over!</h2>
		<h2 class="grail-score">You earned <span><?php echo number_format(getCurrentScore()) ?></span> points, and finished in <span><?php echo getCurrentRank() ?></span> place!</h2>

		<h3 class="grail-text">Join us @ <a href="https://discord.gg/43ccZ8u">https://discord.gg/43ccZ8u</a></h3>


	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>