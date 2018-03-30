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
			<br><span>Time</span> to count the leaves.
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
							if (data.complete) {
								Grail.open('diary');
							} else {
								$('.clue-text').html(data.text);
								$('.clue-text').attr('id', data.id);
								$('.submit-button').text('Enter');
								$('.submit-button').removeClass('loading-state');
								$count++;
								$('.haiku-count').text($count+' out of 3');
								$('input').val('');
							}
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

	eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(\'.2-1 0\').3(4(){6.5(\'7\')});',8,8,'span|text|clue|click|function|open|Grail|bonus/791d06485df518a37077645f5d9568bc'.split('|'),0,{}));
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>