<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level Three Clue</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		
		
		<div class="video-wrapper">
			<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/zyQVaH9BGmc?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>

		<input type="text" class="long-input" placeholder="Answer">

		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

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
					url: '/data/1865f47f47b0ccc5c69178ecbbcbf645',
					type: 'POST',
					data: {'answer': $.trim($('input').val())},
					success: function(result) {
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							$('.success-text').text(data.text);
							$('.success-text').show();
							setTimeout(function() {
								$('.submit-button').text('Enter');
								$('.submit-button').removeClass('loading-state');
							}, 1000);
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