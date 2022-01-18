

jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 100) {
		jQuery('.header_top').addClass("fix");
	} else {
		jQuery('.header_top').removeClass("fix");
	}
});



jQuery(document).ready(function(){	
	onloadmethod();	
	
	



  


	
	jQuery('.blog-carousel').owlCarousel({
		loop:true,
		autoplay:false,
		margin:30,
		dots:true,
		nav:false,
		navText:[],
		responsive:{
			0:{
				items:2
			},
			480:{
				items:3
			},
			768:{
				items:3
			}
		}
	})
	
	
	jQuery('.testimonials-carousel').owlCarousel({
		loop:true,
		autoplay:true,
		margin:30,
		dots:true,
		nav:false,
		animateOut: 'fadeOut',
       animateIn: 'fadeIn',
		navText:[],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			768:{
				items:1
			}
		}
	})
	
});

jQuery(window).resize(function(){	
	onloadmethod();	  
});

function onloadmethod(){	

}



/*-------- back to top jquery start ---------*/

// BY KAREN GRIGORYAN

$(document).ready(function() {
  /******************************
      BOTTOM SCROLL TOP BUTTON
   ******************************/

  // declare variable
  var scrollTop = $(".scrollTop");

  $(window).scroll(function() {
    // declare variable
    var topPos = $(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > 900) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  }); // scroll END

  //Click event to scroll to top
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  }); // click() scroll top EMD

  /*************************************
    LEFT MENU SMOOTH SCROLL ANIMATION
   *************************************/
  // declare variable
  var h1 = $("#h1").position();
  var h2 = $("#h2").position();
  var h3 = $("#h3").position();

  $('.link1').click(function() {
    $('html, body').animate({
      scrollTop: h1.top
    }, 500);
    return false;

  }); // left menu link2 click() scroll END

  $('.link2').click(function() {
    $('html, body').animate({
      scrollTop: h2.top
    }, 500);
    return false;

  }); // left menu link2 click() scroll END

  $('.link3').click(function() {
    $('html, body').animate({
      scrollTop: h3.top
    }, 500);
    return false;

  }); // left menu link3 click() scroll END

}); // ready() END

/*-------- back to top jquery stop ---------*/

