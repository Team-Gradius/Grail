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

		<!-- <h1 class="clue-title">1 - Part One</h1> -->

		<?php 

		$json = json_decode(file_get_contents('pages/level_one/movie_quotes.json'));
		$first_visible = true;

		for ($i = 1; $i <= 3; $i++) {
		  $movie_key = array_rand($json, 1);
		  $quote = $json[$movie_key]->quotes;
		  $quote = $quote[array_rand($quote)];

		  // echo '<h1>'.$json[$movie_key]->title.'</h1>';
		  // echo '<h2>'.$json[$movie_key]->year.'</h2>';
		  // echo '<h4>'.$quote->spoken_by.'</h4>';
		  // echo '<p>'.$quote->line.'</p>';
		  // echo '<h4>'.$quote->character.'</h4>';
		  // echo '<p>'.$quote->answer.'</p>';

		  unset($json[$movie_key]);

		}

		 ?>

		 <div class="ms-count">1 out of 3</div>
		 <div class="ms-timer">0:30</div>
		 <div class="ms-wrapper">
		 	<h1 class="ms-title">Blade Runner <span>1982</span></h1>
		 	<h3 class="ms-line"><span>Holden:</span> You're in a desert, walking along in the sand, when all of a sudden you look down...</h3>
		 	<h3 class="ms-answer">Leon:</h3>
		 	<input type="text" class="left-input" placeholder="Answer">
		 </div>

		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

		</div><br><br>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
	
	</script>
</html>