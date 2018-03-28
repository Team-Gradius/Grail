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

		 <div class="ms-count">1 out of 3</div>
		 <div class="ms-timer">0:30</div>
		 <div class="ms-wrong"><span>X</span><span>X</span><span>X</span></div>	

		<?php 

		$json = json_decode(file_get_contents('pages/level_one/movie_quotes.json'));
		$first_visible = true;

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

		for ($i = 1; $i <= 3; $i++) {
		  $movie_key = array_rand($json, 1);
		  $quote = $json[$movie_key]->quotes;
		  $quote = $quote[array_rand($quote)];
		  $answer = grail_crypt($quote->answer, 'e');

		  echo '<div class="';
		  if ($first_visible == true) {
		  	echo 'ms-active ';
		  	$first_visible = false;
		  }
		  echo 'ms-wrapper">
		 	<h1 class="ms-title">'.$json[$movie_key]->title.' <span>'.$json[$movie_key]->year.'</span></h1>
		 	<h3 class="ms-line"><span>'.$quote->spoken_by.':</span> '.$quote->line.'</h3>
		 	<h3 class="ms-answer">'.$quote->character.':</h3>
		 	<input type="hidden" id="msansw" value="'.$answer.'">
		 	<input type="text" class="left-input" placeholder="Answer">
		 </div>';

		  unset($json[$movie_key]);

		}

		 ?>

		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

		</div><br><br>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">

	var counter;
	function countdownTimer() {
	    var count = 29;
	    clearInterval(counter);
	    counter = setInterval(function() { 
		    $('.ms-timer').text('0:'+count);
		    count = count - 1;
		    if (count == 0) {
		    	clearInterval(counter);
		    	failedAnswer();
		    } 
	    }, 1000);
	}

	countdownTimer();
	$('.ms-active .left-input').focus();
	$quote_count = 1;
	function nextQuote() {
		$next = $(".ms-active").next();
		$('.ms-active').removeClass('ms-active');
		$quote_count++;
		$('.ms-count').text($quote_count + ' out of 3');
		$next.addClass('ms-active');
		$('.ms-active .left-input').focus();
		countdownTimer();
	}

	$fail_count = 0;
	function failedAnswer() {
		if ($quote_count >= 3 && $fail_count > 0) {
			$('.ms-wrong span:nth-child('+($quote_count - 1)+')').css('color', 'red');
			$('.success-text').text('');
			$('.success-text').hide();
			$('.submit-button').text('Wrong!');
			setTimeout(function() {
				$('.submit-button').text('Enter');
				$('.submit-button').removeClass('loading-state');
				Grail.open('diary');
			}, 500);
		} else {
			$('.ms-wrong span:eq('+($quote_count - 1)+')').css('color', 'red');
			$fail_count++;
			$('.success-text').text('');
			$('.success-text').hide();
			$('.submit-button').text('Wrong!');
			setTimeout(function() {
				$('.submit-button').text('Enter');
				$('.submit-button').removeClass('loading-state');
				nextQuote();
			}, 500);
		}
	}

	function submitAnswer() {
		$('.submit-button').text('Checking');
		$('.submit-button').addClass('loading-state');
		$input = $('.ms-active .left-input').val();
		$answer = $('.ms-active #msansw').val();
		if ($quote_count == 3 && $fail_count > 0) {
			Grail.open('diary');
		} else {
		$.ajax({
			url: '/data/8acae5da49283f7f59a919dc87b74453',
			type: 'POST',
			data: {'input': $input, 'answer': $answer, 'fails': $fail_count, 'count': $quote_count},
			success: function(result) {
				console.log(result);
				var data = $.parseJSON(result);
				if (data.response == 'true') {
					$('.submit-button').text('Correct!');
					setTimeout(function() {
						$('.submit-button').removeClass('loading-state');
						$('.submit-button').addClass('disabled-state');
						$('.submit-button').text('Enter');
					}, 500);
					if (data.final) {
						$answer = $('.ms-active #msansw').val();
						$.ajax({
							url: '/data/8acae5da49283f7f59a919dc87b74453',
							type: 'POST',
							data: {'final_key': data.final},
							success: function(result) {
								Grail.open('diary');
							}
						});
					} else {
						nextQuote();
					}
				} else {
					failedAnswer();
				}
			}
		});
		}
	}

	$('input').on('keydown', function(e) {
		if (e.keyCode == 13) {
			submitAnswer();
		}
	});

	$('input').on('input', function() {
		if ($.trim($(this).val().length) > 0)
			$('.submit-button').removeClass('disabled-state');
		else
			$('.submit-button').addClass('disabled-state');
	});

	$('.submit-button').on('click', function() {
		if (!$(this).hasClass('disabled-state') && !$(this).hasClass('loading-state')) {
			submitAnswer();
		}
	});
	</script>
</html>