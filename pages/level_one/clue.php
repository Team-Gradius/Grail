<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Level One Clue</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('diary')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/diary.png">
		</div>		

		<h1 class="clue-title">The First Step</h1>
		<p class="clue-text-smaller">
			All roads lead to glory,
			<br>to one of quizzes, three.
			<br>Upon the top your name might show
			<br>if clever, you can be.
			<br><br>
			<br>The first will test your luck,
			<br>from crying you’ll refrain.
			<br>To find it look upon the screen
			<br>and tell me the Doc’s name.
			<br><br>
			<br>The second is a simple lot
			<br>Quite easy to contrive
			<br>to play it isn't difficult
			<br>just five and seven and five.
			<br><br>
			<br>The third is opened in front,
			<br>littered, full, with fables
			<br>but will this help to get you there?
			<br>For that you'll need Green Gables.
			<br><br>
			<br>And if you are sharp-witted
			<br>or find yourself behind,
			<br>for you there are some extra points
			<br>a bonus you can find.
		</p>

		<input type="text" class="standard-input" placeholder="Answer">

		<div class="submit-button disabled-state">Enter</div>

		</div><br><br>

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
					url: '/data/8c154af9ac2bf94569cb67a89d09b05e',
					type: 'POST',
					data: {'answer': $.trim($('input').val())},
					success: function(result) {
						console.log(result);
						var data = $.parseJSON(result);
						if (data.response == 'true') {
							$('.submit-button').text('Correct!');
							// 
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