<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - 1.4</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>	

		<p class="clue-text">
			"It is pitch black. You are likely to be eaten"
		</p>

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

		$('.submit-button').on('click', function() {
			if (!$(this).hasClass('disabled-state')) {
				$('.submit-button').text('Checking');
				$('.submit-button').addClass('loading-state');
				$.ajax({
					url: '/data/791d06485df518a37077645f5d9568bc',
					type: 'POST',
					data: {'answer': $.trim($('input').val())},
					success: function(result) {
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							$('.success-text').show();
							$('.success-text').text(data.text);
							setTimeout(function() {
								Grail.open('diary');
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
</html>