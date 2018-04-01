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

		<div class="chatbox">
			<div class="messages">
				<div class="message"><speaker>Keeper:</speaker> Stop. Who would cross the Bridge of Death must answer me these questions three, ere the other side he see.</div>
			</div>
			<input type="text" autofocus="true" placeholder="Message...">
		</div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
		$count = 0;
		$('input').on('keydown', function(e) {
			if (e.keyCode == 13 && !$(this).hasClass('readonly') && $.trim($(this).val()).length > 0) {
				$count++;
				$('input').attr('readonly', true);
				$('input').addClass('readonly');
				$('.messages').append('<div class="message"><you>You: </you>'+$('input').val()+'</div>');
				$('input').val('');
				setTimeout(function() {
					if ($count == 1)
					$('.messages').append('<div class="message"><speaker>Keeper:</speaker> What... is your name?</div>');
					else if ($count == 2)
						$('.messages').append('<div class="message"><speaker>Keeper:</speaker> What... is your quest?</div>');
					else if ($count == 3)
						$('.messages').append('<div class="message"><speaker>Keeper:</speaker> What... is your favourite colour?</div>');
					else {
						$.ajax({
							url: '/data/d800eb0f85ee8f9832c871071a5d095f',
							data: {'key': '<?php echo md5($_COOKIE['_aun']); ?>'},
							type: 'POST',
							success: function(result) {
								setTimeout(function() {
								$('.messages').append('<div style="color: gold;" class="message"><speaker>Keeper:</speaker> Go on. Off you go.</div>');
									setTimeout(function() {
										location.reload();
									}, 2000);
								}, 1000);
							}
						});
					}
					$('input').attr('readonly', false);
					$('input').removeClass('readonly');
				}, 1200);
			}
		});
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>