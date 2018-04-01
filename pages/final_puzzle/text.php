<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Final Puzzle</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		
		
		<?php 

		function grail_crypt($string, $action = 'e') {
	   	 	$secret_key = 'Anoraks';
	    	$secret_iv = 'Basement';
	    	$output = false;
		    $encrypt_method = "AES-256-CBC";
		    $key = hash( 'sha256', $secret_key );
		    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		    if( $action == 'e' ) {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		    }
		    else if( $action == 'd' ){
		        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		    }
	    	return $output;
		}

		$array = array(
			array(
				'answer' => 'night',
				'video' => 'Fvb_rXA4EnA'
			),
			array(
				'answer' => 'grail',
				'video' => '9vE7CGg8UnY'
			),
			array(
				'answer' => 'vessel',
				'video' => 'UF7EurZVyfo'
			),
			array(
				'answer' => 'moment',
				'video' => '2uXq9RxbOzw'
			),
			array(
				'answer' => 'treasure',
				'video' => '8z-GJZdlTPg'
			),
			array(
				'answer' => 'given',
				'video' => 'Oxta6YO_I8w'
			),
			array(
				'answer' => 'question',
				'video' => 'P05yFDrShGQ'
			),
			array(
				'answer' => 'granted',
				'video' => 'r3HWmCkXVQg'
			),
			array(
				'answer' => 'devote',
				'video' => 'UL8J7B0p1uk'
			),
			array(
				'answer' => 'lifetime',
				'video' => '3njYov7lQak'
			),
			array(
				'answer' => 'infant',
				'video' => 'AuSpw3agIU4'
			)
		);

		$item = $array[array_rand($array)];
		$answer = $item['answer'];
		$video = $item['video'];
		$answer = grail_crypt($answer, 'e');

		echo '<div data-ans="'.$answer.'" class="video-wrapper">
			<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/'.$video.'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>';

		 ?>

		<input type="text" class="standard-input" placeholder="Answer">

		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div><br><br>

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

		$('.submit-button').on('click', function() {
			if (!$(this).hasClass('disabled-state') && !$(this).hasClass('loading-state')) {
				$('.submit-button').text('Checking');
				$('.submit-button').addClass('loading-state');
				$.ajax({
					url: '/data/f801c0e62aefd20b2d33dd2ab43e4784',
					type: 'POST',
					data: {'input': $.trim($('input').val()), 'answer': $('.video-wrapper').attr('data-ans')},
					success: function(result) {
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							setTimeout(function() {
								location.reload();	
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