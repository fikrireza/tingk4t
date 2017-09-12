	window.setTimeout(function() {
	    $("#home").addClass('show-discrip');
	}, 3832);

	$("#project-content-list .project-bg").click(function(){
		var image		= $(this).data('image');
		var location 	= $(this).data('location');
		var scope 		= $(this).data('scope');
		var title 		= $(this).children().children().html();

		$("#view-project #img").css('background-image', image);
		$("#view-project h1#title").html(title);
		$("#view-project p#location").html(location);
		$("#view-project p#scope").html(scope);

		window.setTimeout(function() {
		    $("#view-project").addClass('actived');
		}, 232);
	});
	$("#view-project #close img#close").click(function(){
		$("#view-project").removeClass('actived');
	});

	$(".list.slide-down-actived").click(function(){
		$('.slide-down-content').toggle();
	});

	$(document).ready(function() {

	    var win = $(window);
	    if( win.width() < 740 && win.width() > 480){
	    	$('#navigasi img#block-w').click(function(){
	    		// alert('ok');
	    		if ($('#navigasi').hasClass('open')) {
	    			$('#navigasi').removeClass('open');	
	    		}
	    		else{
		    		$('#navigasi').addClass('open');
	    		}
			});
			$('#navigasi #nav-wrapper-list .list a').click(function(){
				$('#navigasi').removeClass('open');	
			});
	    }
	});
// publict
	
	// scroll to soft
		$(function() {
		    $('a[href*="#"]:not([href="#"])').click(function() {
		        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		            var target = $(this.hash);
		            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		            if (target.length) {
		                $('html, body').animate({
		                    scrollTop: target.offset().top
		                    }, 1000);
		                return false;
		            }
		        }
		    });
		});
	// scroll to soft

	// animate in view
		var $animation_elements = $('.animation-element');
	    var $window = $(window);

	    function check_if_in_view() {
	      var window_height = $window.height();
	      var window_top_position = $window.scrollTop();
	      var window_bottom_position = (window_top_position + window_height);

	      $.each($animation_elements, function() {
	        var $element = $(this);
	        var element_height = $element.outerHeight();
	        var element_top_position = $element.offset().top;
	        var element_bottom_position = (element_top_position + element_height);

	        //check to see if this current container is within viewport
	        if ((element_bottom_position >= window_top_position) &&
	          (element_top_position <= window_bottom_position)) {
	          	$element.addClass('in-view');
	        } else {
	          $element.removeClass('in-view');
	        }
	      });
	    }

	    $window.on('scroll resize', check_if_in_view);
	    $window.trigger('scroll');
	// animate in view
// publict
