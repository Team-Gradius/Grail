$('.sb-name').on('mouseover', function() {
	if ($(document).width() <= 750 && $(this).children('.score-icons').children('.level-icon').length > 0) {
		$(this).children('.sb-name-value').hide();
		$(this).children('.score-icons').show();
	}
});

$('.sb-name').on('mouseout', function() {
	if ($(document).width() <= 750) {
		$(this).children('.sb-name-value').show();
		$(this).children('.score-icons').hide();
	}
});

$(window).on('resize', function(){
      if ($(this).width() > 750) {
      	$('.sb-name-value').show();
      	$('.score-icons').show();
      } else {
      	$('.score-icons').hide();
      }
});

$key_chain_stack = 0;
$key_chain_array = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
$('body').on('keydown', function(e) {
	if (e.keyCode == $key_chain_array[$key_chain_stack]) {
		if ($key_chain_array[$key_chain_stack] == 38) {
			$('.kc-combo').html($('.kc-combo').html() + '&#11014;'); 
		} else if ($key_chain_array[$key_chain_stack] == 40){
			$('.kc-combo').html($('.kc-combo').html() + '&#11015;'); 
		} else if ($key_chain_array[$key_chain_stack] == 37){
			$('.kc-combo').html($('.kc-combo').html() + '&#11013;'); 
		} else if ($key_chain_array[$key_chain_stack] == 39){
			$('.kc-combo').html($('.kc-combo').html() + '&#10145;'); 
		} else if ($key_chain_array[$key_chain_stack] == 66){
			$('.kc-combo').html($('.kc-combo').html() + '<span class="kc-combo-letter">B</span>'); 
		} else if ($key_chain_array[$key_chain_stack] == 65){
			$('.kc-combo').html($('.kc-combo').html() + '<span class="kc-combo-letter">A</span>'); 
		}
		$key_chain_stack++;
		if ($key_chain_stack == 10) {
			setTimeout(function() {
				konamiComplete();
			}, 200);
		}
	} else {
		$('.kc-combo').html('');
		$key_chain_stack = 0;
	}
});

$('.kc-combo-button').click(function() {
	if ($(this).attr('data-key') == $key_chain_array[$key_chain_stack]) {
		if ($key_chain_array[$key_chain_stack] == 38) {
			$('.kc-combo').html($('.kc-combo').html() + '&#11014;'); 
		} else if ($key_chain_array[$key_chain_stack] == 40){
			$('.kc-combo').html($('.kc-combo').html() + '&#11015;'); 
		} else if ($key_chain_array[$key_chain_stack] == 37){
			$('.kc-combo').html($('.kc-combo').html() + '&#11013;'); 
		} else if ($key_chain_array[$key_chain_stack] == 39){
			$('.kc-combo').html($('.kc-combo').html() + '&#10145;'); 
		} else if ($key_chain_array[$key_chain_stack] == 66){
			$('.kc-combo').html($('.kc-combo').html() + '<span class="kc-combo-letter">B</span>'); 
		} else if ($key_chain_array[$key_chain_stack] == 65){
			$('.kc-combo').html($('.kc-combo').html() + '<span class="kc-combo-letter">A</span>'); 
		}
		$key_chain_stack++;
		if ($key_chain_stack == 10) {
			konamiComplete();
		}
	} else {
		$('.kc-combo').html('');
		$key_chain_stack = 0;
	}
});

window.addEventListener("keydown", function(e) {
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

function konamiComplete() {
	$('body').prepend('<div class="kc-success-black"></div><div class="kc-success-red"></div>');
	setTimeout(function() {
		$('body').css('overflow', 'hidden');
		$('body').scrollTop(0);
		$('.kc-success-red').css('height', '100%');
		setTimeout(function() {
			$('.kc-success-black').css('height', '100%');
			setTimeout(function() {
				window.location.href = "/048A3A56B014940E73F89C2F98DB2C06";
			}, 350);
		}, 300);
	}, 10);
}

$menu_status = 0;
$('.footer').click(function() {
	if ($menu_status == 0) {
		$('.kc-combo-menu').css('right', '0px');
		$menu_status = 1;
	} else {
		$('.kc-combo-menu').css('right', '-80px');
		$menu_status = 0;
	}
});

function getTintedColor(color, v) {
    if (color.length >6) { color= color.substring(1,color.length)}
    var rgb = parseInt(color, 16); 
    var r = Math.abs(((rgb >> 16) & 0xFF)+v); if (r>255) r=r-(r-255);
    var g = Math.abs(((rgb >> 8) & 0xFF)+v); if (g>255) g=g-(g-255);
    var b = Math.abs((rgb & 0xFF)+v); if (b>255) b=b-(b-255);
    r = Number(r < 0 || isNaN(r)) ? 0 : ((r > 255) ? 255 : r).toString(16); 
    if (r.length == 1) r = '0' + r;
    g = Number(g < 0 || isNaN(g)) ? 0 : ((g > 255) ? 255 : g).toString(16); 
    if (g.length == 1) g = '0' + g;
    b = Number(b < 0 || isNaN(b)) ? 0 : ((b > 255) ? 255 : b).toString(16); 
    if (b.length == 1) b = '0' + b;
    return "#" + r + g + b;
} 

$epic = "#ae00ff";
$gold = "#FFD700";
$silver = "#f8f8f8";
$bronze = "#cd7f32";

$gold_count = 0;
$silver_count = 0;
$bronze_count = 0;

$bronze_consist = false;

$('tr').each(function(i) {
	if (i == 0)
        return true;
	if ($gold_count < 5) {
		if ($gold_count == 0) {
			$(this).css('color', $epic);
		} else {
			$(this).css('color', $gold);
			$gold = getTintedColor($gold, $gold_count * -3);
		}
		$gold_count++;
	} else if ($silver_count < 5) {
		$(this).css('color', $silver);
		$silver = getTintedColor($silver, $silver_count * -3);
		$silver_count++;
	} else {
		$(this).css('color', $bronze);
		if ($bronze_consist == false)
			$bronze = getTintedColor($bronze, $bronze_count * -2);

		if ($bronze == "#a35508")
			$bronze_consist = true;
		$bronze_count++;
	}
});
