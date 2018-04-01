<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level 2.2</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body style="text-align: center;">

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		
		
		<img class="wall-image" src="/assets/img/levels/2/tv_guide.png"><br>

		<input style="margin-bottom: 20px;" id="input-1" type="text" class="standard-input" placeholder="Answer One">
		<input style="margin-bottom: 20px;" id="input-2" type="text" class="standard-input" placeholder="Answer Two">

		<div style="margin-top: 0px;" class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div><br><br>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
	$('input').on('input', function() {
			$('.success-text').hide();
			if ($.trim($('#input-1').val().length) > 0 && $.trim($('#input-2').val().length) > 0)
				$('.submit-button').removeClass('disabled-state');
			else
				$('.submit-button').addClass('disabled-state');
		});

		$('.submit-button').on('click', function() {
			if (!$(this).hasClass('disabled-state') && !$(this).hasClass('loading-state')) {
				$('.submit-button').text('Checking');
				$('.submit-button').addClass('loading-state');
				$.ajax({
					url: '/data/2b83fae2eec0b8e2f4e6daaeacbbd086',
					type: 'POST',
					data: {'answer_one': $.trim($('#input-1').val()), 'answer_two': $.trim($('#input-2').val())},
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