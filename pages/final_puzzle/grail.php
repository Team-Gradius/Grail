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
		
		<div class="grail-wrapper">

			<?php 

				$colours = array('#F44336', '#FF9800', '#2196F3', '#673AB7', '#00C853', '#FFFFFF', '#FFEB3B');
				$increment = rand(1, 9);
				$increment_2 = rand(1, 2);
				for ($i=1; $i <= 9; $i++) { 
					if ($i == $increment) {
						if ($increment_2 == 1) {
							$first = '#00C853';
							$second = '#F06292';
						} else {
							$second = '#00C853';
							$first = '#F06292';
						}
						echo '<div id="2332" class="grail-holder"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="58px" viewBox="0 0 19 58" enable-background="new 0 0 19 58" xml:space="preserve"><polygon fill="'.$first.'" points="0,0 0,26 4,26 4,30 8,30 8,34 15,34 15,50 11,50 11,54 7,54 7,58 15,58 19,58 19,0 "/></svg><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="58px" viewBox="0 0 19 58" enable-background="new 0 0 19 58" xml:space="preserve"><polygon fill="'.$second.'" points="0,0 0,58 4,58 12,58 12,54 8,54 8,50 4,50 4,34 11,34 11,30 15,30 15,26 19,26 19,0 "/></svg></div>';
					} else {
						$r = str_shuffle("01234");
						$colour_1 = $colours[$r[0]];
						$colour_2 = $colours[$r[1]];
						$id = rand(2334, 9474);
						echo '<div id="'.$id.'" class="grail-holder"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="58px" viewBox="0 0 19 58" enable-background="new 0 0 19 58" xml:space="preserve"><polygon fill="'.$colour_1.'" points="0,0 0,26 4,26 4,30 8,30 8,34 15,34 15,50 11,50 11,54 7,54 7,58 15,58 19,58 19,0 "/></svg>';

						echo '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="58px" viewBox="0 0 19 58" enable-background="new 0 0 19 58" xml:space="preserve"><polygon fill="'.$colour_2.'" points="0,0 0,58 4,58 12,58 12,54 8,54 8,50 4,50 4,34 11,34 11,30 15,30 15,26 19,26 19,0 "/></svg></div>';
					}
				}

			 ?>

		</div>

		 <div style="margin-top: 30px; display:block" class="success-text"></div>

	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/blades/scripts.blade.html'); ?>
	<script type="text/javascript">
		$('.grail-holder').click(function() {
			$id = $(this).attr('id');
			$.ajax({
				url: '/data/dc8260de4ce9340741acadd190760a1e',
				type: 'POST',
				data: {'id': $id},
				success: function(result) {
					var data = $.parseJSON(result);
					if (data.response == 'true') {
						$('.success-text').text('Correct!');
						setTimeout(function() {
							location.reload();	
						}, 500);
					} else {
						$('.success-text').css('color', 'red');
						$('.success-text').text('Wrong!');
						setTimeout(function() {
							Grail.open('diary');
						}, 500);
					}
				}
			});
		});
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90403256-4"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-90403256-4');</script>
</html>