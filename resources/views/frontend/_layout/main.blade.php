<!DOCTYPE html>
<html>
<head>

	@yield("title-page")
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	@yield("meta-page")

	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/navigation.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/public.css') }}">
	<style type="text/css">
		#navigasi #copy-right{
			background-image: url("{{ asset('amadeo/images-base/dekstop-dot-tekstur.png') }}");
		}
	</style>
	@yield("style")

	
</head>
<body>
	<div id="navigasi" class="animation-element">
		<a href="{{ route('frontend.dekstop') }}">
			<img id="logo-tingkat" src="{{ asset('amadeo/images-base/logo-tingkat.png') }}">
		</a>
		<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
		<div id="nav-wrapper-list">
			<div class="list">
				<a 
					href="{{ route('frontend.home') }}"
					class="{{ route::is('frontend.home') ? 'active' : '' }}">
					home
				</a>
			</div>
			<div class="list slide-down-actived">
				<a class="{{ route::is('frontend.about*') ? 'active' : '' }}">
					about us
				</a>
				<div class="slide-down-content">
					<a 
						href="{{ route('frontend.about.our-commitment') }}"
						class="{{ route::is('frontend.about.our-commitment') ? 'active' : '' }}" 
					>
						our commitment
					</a>
					<br>
					<a 
						href="{{ route('frontend.about.flow-design') }}"
						class="{{ route::is('frontend.about.flow-design') ? 'active' : '' }}" 
					>
						flow of design
					</a>
				</div>
			</div>
			<div class="list">
				<a 
					href="{{ route('frontend.services') }}"
					class="{{ route::is('frontend.services') ? 'active' : '' }}">
					services
				</a>
			</div>
			<div class="list">
				<a href="">
					projects
				</a>
			</div>
			<div class="list">
				<a href="">
					contact
				</a>
			</div>
		</div>
		<img id="block-n" src="{{ asset('amadeo/images-base/block-n.png') }}">
		<div id="copy-right">
			<p>copyright 2017 tingkat</p>
		</div>
	</div>
	@yield("content")

	<script type="text/javascript" src="{{ asset('amadeo/plugin/jquery/jquery-3.2.0.min.js') }}"></script>
	<script type="text/javascript">
		// animate scroll in
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
		// animate scroll in
	</script>
	@yield("script")
</body>
</html>
