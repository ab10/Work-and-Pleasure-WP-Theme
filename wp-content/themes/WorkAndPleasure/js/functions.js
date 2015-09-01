$(window).load(function () {
	setScrubber ();
	$('.square').mouseenter(function(){
		$square = $(this);
		if (!$square.hasClass('tit')){
			setHomeQuote ($square);
		}
	});
	$('.head-nav ul li a').click(function (e) {
		e.preventDefault();
		//Get clicked URL
		$('#main').addClass("get-out");
		href = ($(this).attr("href"));
		$("body").animate({ scrollTop: "0px" }, {"duration": 700, "easing":"easeInOutCubic", complete: function () {
			$('.loader').fadeIn();
			console.log("a = "+ href)
			getNewMain(href);
		}});

	});
	$(document).on('click', '.story-thumb a[data-click="thumb"]',function (e) {
		e.preventDefault();
		if ($(this).hasClass("hovered") || $(this).hasClass("qlink") ) {
			//Get clicked URL
			href = ($(this).attr("href"));
			$('#main').addClass("get-out");
			$("body").animate({ scrollTop: "0px" }, {"duration": 700, "easing":"easeInOutCubic", complete: function () {
				$('.loader').fadeIn();
				getNewMain(href);
			}});
		} else {
			$(this).addClass("hovered");
		}
	});
	$(document).on('mouseenter', '.story-thumb',function (e) {
		$(this).addClass("hovered");
	});
	$(document).on('mouseleave', '.story-thumb',function (e) {
		$(this).removeClass("hovered");
	});


	setHomeQuote($('body > section > div.home-wrapper.container > section.squares-wrapper > div.set-wrapper.set1 > div:nth-child(2)'));
	$(".wp-caption").removeAttr('style');
	$('.to-top').click(function () {
		 $('body').animate({
                scrollTop: 0
            },  {"duration": 700, "easing":"easeInOutCubic"});
	});
	$('.backpage').click(function () {
		window.history.back();
	});
	$('.enlarge').click(function () {
		$("#the-post").toggleClass('larger');
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
$('.head-nav').affix({
  offset: {
    top: $('.head-nav').offset().top-10
  }
});



$( window ).scroll(function() {
		if ($('.timeline').length) {
		var percentage = ($(window).scrollTop()  )/ ( $(document).height()-$(window).height());
		$('.the-scrubber').css({"right": percentage * ($('.the-line').outerWidth()) })
	}
});



});
function setScrubber () {

	$('.timeline').affix({
	  offset: {
	    top: $('.timeline').offset().top-$('.timeline').outerHeight()-$('.head-nav').outerHeight()
	  }
	});
	$( ".the-scrubber" ).draggable({
  drag: function() {///$('.the-line').width()
  	var invpercent = $('.the-scrubber').css('left');
  	invpercent = (invpercent.replace("px", ""));
  	invpercent = $('.the-line').width() - invpercent;

  	invpercent = (invpercent/$('.the-line').width());
console.log(invpercent)
  	$(window).scrollTop(invpercent*($(document).height()-$(window).height()))
  }, axis: "x",
  containment: ".the-line"
});
}
$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#main').append('<div id="search"><button type="button" class="close">×</button><form method="get"  id="seachform" action="http://risk.com/search/"><input type="text" name="search" id="searchstring" placeholder="type keyword(s) here" /><input type="submit" class="btn btn-primary"  value="Search"></form></div>');
        $('#search > form > input[type="text"]').focus();
        $('#search').addClass('open');
    });
	$(document).on('submit', '#search form', function (e) {
		e.preventDefault();
		href = $('#search form').attr('action')+$('#searchstring').val();
		$('#search').removeClass('open');
		getNewMain(href);
	});
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $('#search').removeClass('open');
        }
    });
});
function getNewMain(href) {
	console.log("g = "+ href)
	$('#main').load(href + " #main > *", showContent);
}
function showContent() {
	stateObj = {page: $(this).text()}
	history.pushState(stateObj, $(this).text(), href);
	setTimeout(function(){$('#main').removeClass("get-out");
	$('.loader').fadeOut("fast");; }, 500);
	FB.XFBML.parse();
	setScrubber();
}

