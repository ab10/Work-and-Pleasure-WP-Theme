$(window).load(function () {
	$('.square').mouseenter(function(){
		$square = $(this);
		if (!$square.hasClass('tit')){
			setHomeQuote ($square);
		}
	});
	setHomeQuote($('body > section > div.home-wrapper.container > section.squares-wrapper > div.set-wrapper.set1 > div:nth-child(2)'));

});
function setHomeQuote (obj) {
	$('.home-quotes .person, .panel').stop( true, true ).animate({opacity: 0}, 'fast', function () {
		$('.home-quotes p.quote').text(obj.attr('data-quote'));
		$('.home-quotes img').attr('src', obj.attr('data-img'));
		$('.home-quotes span').text(obj.attr('data-person'));
		$(this).animate({opacity: 1}, "fast");
	})
}
var navTop = ($('.head-nav').offset().top);
if ($('.timeline').length) {var timeTop = $('.timeline').offset().top-$('.timeline').outerHeight()-0;}
$( window ).scroll(function() {
	if ($(window).scrollTop() > navTop) {
		$('.head-nav').addClass('navbar-fixed-top'); $('body').css('padding-top', '45px');
		if ($('.timeline').length) {
			if ($(window).scrollTop() > timeTop) {
				$('.timeline').addClass('time-fixed-top'); $('body').css({'padding-top': '105px', "padding-bottom":"80px"});
			} else if ($(window).scrollTop() < timeTop) {
				$('.timeline').removeClass('time-fixed-top'); $('body').css({'padding-top': '45px', "padding-bottom":"0px"});
			}
		}
	} else if ($(window).scrollTop() < navTop) {
		$('.head-nav').removeClass('navbar-fixed-top'); $('body').css('padding-top', '0px')
	}


	var percentage = ($(window).scrollTop()  )/ ( $(document).height()-$(window).height());
	$('.the-scrubber').css({"right": percentage * ($('.the-line').outerWidth()) })
});

$( ".the-scrubber" ).draggable({
  drag: function() {///$('.the-line').width()
  	var invpercent = $(this).css('right');
  	invpercent = (invpercent.replace("px", ""));
  	invpercent = (invpercent/$('.the-line').width());
  	$(window).scrollTop(invpercent*($(document).height()-$(window).height()))
  }, axis: "x",
  containment: ".the-line"
});

$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });

    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
});