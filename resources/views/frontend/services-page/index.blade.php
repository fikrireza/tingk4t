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
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/sevices.css') }}">
	<style type="text/css">
		#main-content #banner{
			background-image: url("{{ asset('amadeo/images-base/services-banner.jpg') }}");
		}
	</style>
@endsection

@section('content')
	<div id="main-content" class="animation-element">
		<div id="banner"></div>
		<div id="content">
			<h1>we design & build</h1>
			<div>
				<div class="col">
					<p>
						We believe that creating a wonderful home for you is not merely about spectacular interior designs. It is about knowing and understanding each of our client’s character, needs, and dreams. We strive to provide personalized design, high quality furnishings and comfort at your dream home. Creating inspiring, functional, branded business is the goal of our full service design offerings.
					</p>
				</div>
				<div class="col">
					<p>
						We give the concept in your mind visible quality: as the general contractor, we monitor all subcontractors in terms of timing, clarify building regulations and ensure that deadlines are met as required. whether it’s dry construction, floor coverings, painters, architectural engineering, or facades - we know what’s important and demand the highest on-time service from the service providers involved. 
					</p>
				</div>
			</div>
		</div>
		<img id="services-dotted" src="{{ asset('amadeo/images-base/services-dotted.png') }}">
	</div>
@endsection

@section('script')
@endsection
