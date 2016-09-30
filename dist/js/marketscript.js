//Probaze marke script file. 
//where each of them are custom

 $(document).ready(function () {

    $('#content-slider').lightSlider({
        auto: true,
        adaptiveHeight: true,
        item: 1,
        slideMargin: 0,
        loop: true,
        speed: 1000, 
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        pauseOnHover:true, 
        vertical:false,
        verticalHeight:300,
        currentPagerPosition: 'middle',
        autoWidth: true,
        
    });
      //-------------------Search event --------------   
   $('#searchIcon').on('click', function(e) {
    e.preventDefault();
    $('.search-top-left').toggleClass('activeForm');
}); 

});
$(document).ready(function () {
    $('.productSlidrHome').lightSlider({
        
        auto:true,
        item: 6,
        loop: true,
        slideMove: 1,
        slideMargin: 0,
        adaptiveHeight: true,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 600,
        pauseOnHover: true,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    item: 4,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    item: 3,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    item: 2,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    item: 1,
                    slideMove: 1
                }
            }
        ]
    });
});


$(document).ready(function () {
    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 300) {
            $('.toTop').addClass('toView').fadeIn();
        } else {
            $('.toTop').removeClass('toView').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.toTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    // jQuery for page scrolling feature - requires jQuery Easing plugin
   
    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1200);
    });
    
    
    
    
});


//Produc hove effect
$(document).ready(function () {
    $(".image").each(function (i) {
        var $this = $(this);
        if ($this.children().last().css("display", "none") !== 1) {
            $this.children().last().css("display", "none");
        } else {
            $this.children().last().css("display", "");
        }
    });
    $(".image").hover(
            function () {
                $(this).children().last().fadeIn(900).css("display", "block");
                $(this).children().first().fadeOut(900).css("display", "none");

            }, function () {
        $(this).children().last().fadeOut(900).css("display", "none");
        $(this).children().first().fadeIn(900).css("display", "block");
    }
    );
});

//wizard-wrapper
$(document).ready(function () {
    $("div").hasClass("widget-content") && ($(".demo-wizard").on("change", function (e, t) {
        if ($("#form" + t.step).length > 0) {
            var a = $("#form" + t.step).parsley();
            if (a.validate(), !a.isValid())
                return !1
        }
        $btnNext = $(this).parents(".wizard-wrapper").find(".btn-next"),
                3 === t.step && "next" == t.direction ? $btnNext.text(" Next").prepend('<i class="fa fa-check-circle"></i>').removeClass("btn-primary").addClass("btn-success") :
                $btnNext.text("Next ").append('<i class="fa fa-arrow-right"></i>').removeClass("btn-success").addClass("btn-primary")
    }).on("finished", function () {
        alert("Order Placed Successfully")
    }), $(".wizard-wrapper .btn-next").click(function () {
        $(".demo-wizard").wizard("next")
    }), $(".wizard-wrapper .btn-prev").click(function () {
        $(".demo-wizard").wizard("previous")
    }));
});


      
//fancybox Gallary and action



(function ($) {
    var o = $('.lightSliderproduct-gallery');
	if (o.length > 0) {	
	$(document).ready( function () {
            o.find('a:first-child').addClass('active');
                $('.product-image').bind("click", function (e) {
                    var imgArr = [];
                        o.find('a').each(function () {
			    img_src = $(this).data("image");
                            //put the current image at the start
			    if (img_src == $('.product-image').find('img').attr('src')) {
				imgArr.unshift({
				    href: '' + img_src + '',
				    title: $(this).find('img').attr("title")  
				});
                            }   else {
				imgArr.push({
				    href: '' + img_src + '',
				    title: $(this).find('img').attr("title")
				});
			    }
			});
			$.fancybox(imgArr);
			    return false;
			});
			o.find('[data-image]').click(function (e) {
			    e.preventDefault();
			    o.find('.active').removeClass('active');
			    var img = $(this).data('image');
			    $(this).addClass('active');
			    $('.product-image').find('img').each(function () {
				$(this).attr('src', img);
			    });
			});
		    });
	        }
        
})(jQuery);

$(function () {
    //initiate the plugin and pass the id of the div containing gallery images 
    $("#img1").elevateZoom({
        gallery:'image-additional', 
        cursor: 'pointer', 
        galleryActiveClass: 'active', 
        imageCrossfade: true,
        borderSize : 1,
        
        
    }); 
 });
$(document).ready(function() {
    $(".lightSliderproduct-gallery").lightSlider({
        item: 4,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    item: 4,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    item: 3,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    item: 2,
                    slideMove: 1,
                    slideMargin: 0,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    item: 1,
                    slideMove: 1
                }
            }
        ]
    }); 
  });

      