<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level 1.2</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>	

		 <div class="haiku-count">1 out of 3</div>

		<p id="234902384" class="clue-text">
			In an open field 
			<br>outdoors. Still much left to do.
			<br>Time to count the leaves.
		</p>

		<input type="text" class="standard-input" placeholder="Answer">
		<div class="submit-button disabled-state">Enter</div>
		<div class="success-text"></div>

		</div><br><br>

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
					url: '/data/d3d84d54a99c8cac66e9e06fca546304',
					type: 'POST',
					data: {'id': $('.clue-text').attr('id'), 'answer': $.trim($('input').val())},
					success: function(result) {
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							$('.clue-text').html(data.text);
							$('.clue-text').attr('id', data.id);
							$('.submit-button').text('Enter');
							$('.submit-button').removeClass('loading-state');
							$('.haiku-count').text($count+' out of 3');
							if (data.complete) {
								Grail.open('diary');
							}
							$('input').val('');
							$count++;
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