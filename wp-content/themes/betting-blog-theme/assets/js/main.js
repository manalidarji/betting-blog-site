var $ = jQuery.noConflict();

$(document).ready(function(){
    $('.home-top-slider-wrap').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      cssEase: 'linear',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });

    $('.home-slider-wrap').slick({
    	autoplay: true,
    	dots: true,
    	arrows: false,
    	fade: true
    });

	$('.mob-search-btn').click(function(e){
		if( $('.mobilemenu-icon').hasClass('open') ){
			$('.mobilemenu-icon').removeClass('open');
			$('.nav-menu').css('display','none');
		}
	    $('header .searchform').slideToggle(400);
	    setTimeout(function() {
            $('header .search-input').focus();
        }, 600);
	});

	$('.mobilemenu-icon').on('click', function(){
		var width = $(window).width();
		if (window.innerWidth <= 767 && $('header .searchform').attr('display', 'block') ){
			$('header .searchform').css('display','none');
		}
	    $('.nav-menu').slideToggle(500);
	    $(this).toggleClass('open');
	});
});

$(window).load(function(){
    $('.searchform-header').submit(function(){
        if($('.search-input-header').val() == ''){
            return false;
        }
    }); 

    $('.searchform-footer').submit(function(){
        if($('.search-input-footer').val() == ''){
            return false;
        }
    });
});

var cachedWidth = $(window).width();
$(window).resize(function(){
    var newWidth1 = $(window).width();
    if(newWidth1 !== cachedWidth){
        if (window.innerWidth > 1024){
            $('.nav-menu').css('display','block');
        }else if (window.innerWidth <= 1024) {
            $('.nav-menu').css('display','none');
            $('.mobilemenu-icon').removeClass('open');
        }

        if (window.innerWidth > 767){
            $('header .searchform').css('display','block');
            $('.mob-search-btn').css('display','none');
        }else if (window.innerWidth <= 767) {
            $('header .searchform').css('display','none');
            $('.mob-search-btn').css('display','block');
        }
        cachedWidth = newWidth1;
    }
});