@extends('frontend._layout.main')

@section('title-page')
	<title>Tingkat</title>
@endsection

@section('meta-page')
	<meta name="title" content="Tingkat">
	<meta name="keywords" content=""/>
	<meta name="description" content="">
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/home.css') }}">
<style type="text/css">
	#navigasi #copy-right{
		background-image: url("{{ asset('amadeo/images-base/dekstop-dot-tekstur.png') }}");
	}
	#main-content #one.main-slide{
		background-image: url("{{ asset('amadeo/images-base/home-bg-one.jpg') }}");
	}
	#main-content.show-discrip #one.main-slide{
		background-image: url("{{ asset('amadeo/images-base/home-bg-two.jpg') }}");
	}
</style>
@endsection

@section('content')
	<div id="navigasi" class="animation-element">
		<a href="{{ route('frontend.dekstop') }}">
			<img id="logo-tingkat" src="{{ asset('amadeo/images-base/logo-tingkat.png') }}">
		</a>
		<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
		<div id="nav-wrapper-list">
			<div class="list">
				<a href="" class="{{ route::is('frontend.home') ? 'active' : '' }}">
					home
				</a>
			</div>
			<div class="list slide-down-actived">
				<a>
					about us
				</a>
				<div class="slide-down-content">
					<a href="">
						our commitment
					</a>
					<br>
					<a href="">
						flow of design
					</a>
				</div>
			</div>
			<div class="list">
				<a href="">
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
	<div id="main-content" class="animation-element">
		<div id="one" class="main-slide">
			<h1>we love to design</h1>
			<h1>beyond your dreams</h1>
		</div>
		<div id="two" class="main-slide">
			<div id="content">
				<h1>we are <big>tingkat</big></h1>
				<p>
					In the year of 2016, we have created our Commercial Interior and Architecture Division that is called TINGKAT. At Tingkat we believe to be effective, design for workspaces needs to be a reflection of your company’s values, your people and your organizational processes. By taking the time to understand your company and your processes, a practical, unique and extraordinary design solution can be achieved.
				</p>
				<p>
					Now we are positioning ourselves as designworks, with the vision to be well known most design-centric company in interior architecture industry.
					Visit our facility and our super team will guide you to experience the transformation of your dreams into reality and even more!
				</p>
			</div>
		</div>

	</div>
@endsection

@section('script')
<script type="text/javascript">
	window.setTimeout(function() {
	    $("#main-content").addClass('show-discrip');
  }, 3832);
</script>
@endsection
