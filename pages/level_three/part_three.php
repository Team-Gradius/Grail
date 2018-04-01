<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level 3.3</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>	

		 <div style="text-transform: uppercase; margin-bottom: -70px;" class="haiku-count">1 out of 3</div>

		<div id="3947304" class="video-wrapper">
			<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/UUsyX6Wc1GY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>

		<input type="text" class="standard-input" placeholder="Answer">
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
			if (!$(this).hasClass('disabled-state')) {
				$('.submit-button').text('Checking');
				$('.submit-button').addClass('loading-state');
				$.ajax({
					url: '/data/c1c3898ea45aaeb742a0a56482a89108',
					type: 'POST',
					data: {'id': $('.video-wrapper').attr('id'), 'answer': $.trim($('input').val())},
					success: function(result) {
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							setTimeout(function() {
								if (data.complete) {
									Grail.open('diary');
								} else {
									$('iframe').attr('src', 'https://www.youtube-nocookie.com/embed/'+data.video_id+'?rel=0&amp;showinfo=0');
									$('.video-wrapper').attr('id', data.id);
									$('.submit-button').text('Enter');
									$('.submit-button').removeClass('loading-state');
									$count++;
									$('.haiku-count').text($count+' out of 3');
									$('input').val('');
								}
							}, 600);
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