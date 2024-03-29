<!DOCTYPE html>
<html>
	<head>
		<title>Grail! - Signup</title>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/head.blade.html'); ?>
	</head>
	<body>

		<div onclick="Grail.open('')" class="sb-corner-right">
			<img class="sb-diary-icon" src="/assets/img/home.png">
		</div>	

		<br>
		<h1 class="clue-title">Congratulations!</h1>
		<p class="standard-text">You've completed the first two puzzles, it's time to get your name on the scoreboard!</p>	

		<input autocomplete="off" id="email" type="email" class="detail-input" placeholder="Email"><br><br>
		<input maxlength="10" autocomplete="off" id="username" style="text-transform: uppercase;" type="text" class="detail-input" placeholder="Username"><br><br>
		<input autocomplete="off" id="password" type="password" class="detail-input" placeholder="Password">

		<div class="submit-button disabled-state">Enter</div>
		<h1 class="submit-failed">Username/Email in use</h1>

		</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
		
		function isEmail($email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (regex.test($email) == true)
				return true;
			else
				return false;
		}

		$('input').on('input', function() {
			this.value = this.value.replace(/\s/g, "");
			$('.submit-failed').hide();
			if (isEmail($.trim($('#email').val())) && $.trim($('#username').val()).length >= 3 && $.trim($('#password').val()).length > 0) {
				$('.submit-button').removeClass('disabled-state');
			} else {
				$('.submit-button').addClass('disabled-state');
			}
		});

		$('.submit-button').on('click', function() {
			if (!$(this).hasClass('disabled-state')) {
				$('.submit-button').text('Loading');
				$('.submit-button').addClass('loading-state');
					$.ajax({
						url: '/auth/data/create_user',
						type: 'POST',
						data: {'email': $.trim($('#email').val()), 'username': $.trim($('#username').val()), 'password': $.trim($('#password').val())},
						success: function(result) {
							var data = $.parseJSON(result);
							if (data.response == 'true') {
								$('.submit-button').text('Welcome!');
								setTimeout(function() {
									window.location.href = data.url;
								}, 500);
							} else if (data.response == 'long') {
								alert('Name must be between 3-10 characters!');
							}else {
								$('.submit-failed').show();
								$('.submit-button').text('Enter');
								$('.submit-button').removeClass('loading-state');
							}
						}
					});
				}
			});
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>