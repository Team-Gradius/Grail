<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - First Clue</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<?php 
			if (authSuccess()) {
				echo '<div onclick="Grail.open(\'diary\')" class="sb-corner-right"><img class="sb-diary-icon" src="/assets/img/diary.png"></div>';
			} else {
				echo '<div onclick="Grail.open(\'\')" class="sb-corner-right"><img class="sb-diary-icon" src="/assets/img/home.png"></div>';
			}
		?>	

		<p class="clue-text">
			In your knowledge and <span style="color: #f3f7db;">Charity</span> of others
			<br>the first integer found will bring <span style="color: #f3f7db;">Hope</span>
			<br>keep your <span style="color: #f3f7db;">Faith</span> and apply both the numbers
			<br>The second within Deep Thought’s scope
		</p>

		<input type="number" class="standard-input" placeholder="Answer">

		<div class="submit-button disabled-state">Enter</div>

		</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
		$('input').on('input', function() {
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
						url: '/data/15ec430e978d726133be311b5d3b1097',
						type: 'POST',
						data: {'answer': $.trim($('input').val())},
						success: function(result) {
							var data = $.parseJSON(result);
							if (data.response == 'true') {
								$('.submit-button').text('Correct!');
								setTimeout(function() {
									window.location.href = data.url;
								}, 300);
							} else {
								$('.submit-button').text('Wrong!');
								$('input').val('');
								setTimeout(function() {
									$('.submit-button').text('Enter');
									$('.submit-button').addClass('disabled-state');
									$('.submit-button').removeClass('loading-state');
								}, 300);
							}
						}
					});
				}
			});
	</script>
</html>