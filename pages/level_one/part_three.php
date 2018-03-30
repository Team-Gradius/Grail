<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level 1.3</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>	

		<div class="haiku-count">1 out of 3</div>
		<br>

		<?php 

		$json = json_decode(file_get_contents('pages/level_one/book_quotes.json'));
		$first_visible = true;

		function grail_crypt($string, $action = 'e') {
	   	 	$secret_key = 'Anoraks';
	    	$secret_iv = 'Basement';
	    	$output = false;
		    $encrypt_method = "AES-256-CBC";
		    $key = hash( 'sha256', $secret_key );
		    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		    if ($action == 'e') {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		    } else if ($action == 'd') {
		        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		    }
	    	return $output;
		}

		for ($i = 1; $i <= 3; $i++) {
		  $book_key = array_rand($json, 1);
		  $quote = $json[$book_key]->books;
		  $quote = $quote[array_rand($quote)];


			echo '<div data-ans="'.grail_crypt($quote->title, 'e').'" class="';

			if ($first_visible == true) {
				echo 'book-active';
				$first_visible = false;
			}

			echo ' book-wrapper">
				<h1 class="diary-title">'.$json[$book_key]->genre.'</h1><br>
				<p class="clue-text-center">"'.$quote->quote.'"</p>
			</div>';

		  unset($json[$book_key]);

		}

		 ?>

		<input type="text" class="long-input" placeholder="Title">
		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

		<br><br>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
		$('input').on('input', function() {
			$('.success-text').hide();
			if ($.trim($(this).val().length) > 0)
				$('.submit-button').removeClass('disabled-state');
			else
				$('.submit-button').addClass('disabled-state');
		});

		$count = 1;
		$('.submit-button').on('click', function() {
			if (!$(this).hasClass('disabled-state') && !$(this).hasClass('loading-state')) {
				$('.submit-button').text('Checking');
				$('.submit-button').addClass('loading-state');
				$.ajax({
					url: '/data/ae50750d2fcdbf4e7d8fbc6e31281f3c',
					type: 'POST',
					data: {'input': $.trim($('input').val()), 'answer': $('.book-active').attr('data-ans'), 'count': $count},
					success: function(result) {
						console.log(result);
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							setTimeout(function() {
								if (data.complete) {
									Grail.open('diary');
								} else {
									$active = $('.book-active');
									$active.next().addClass('book-active');
									$active.removeClass('book-active');
									$('.submit-button').text('Enter');
									$('.submit-button').removeClass('loading-state');
									$count++;
									$('input').val('');
									$('.haiku-count').text($count+' out of 3');
								}
							}, 500);
						} else {
							$('.success-text').text('');
							$('.success-text').hide();
							$('.submit-button').text('Wrong!');
							setTimeout(function() {
								$('.submit-button').text('Enter');
								$('.submit-button').removeClass('loading-state');
							}, 500);
						}
					}
				});
			}
		});
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>