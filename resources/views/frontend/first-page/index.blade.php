@extends('frontend._layout.dekstop')

@section('title-page')
	<title>Tingkat</title>
@endsection

@section('meta-page')
	<meta name="title" content="Tingkat">
	<meta name="keywords" content=""/>
	<meta name="description" content="">
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/first.css') }}">
<style type="text/css">
	#dekstop:before{
		background-image: url("{{ asset('amadeo/images-base/dekstop-top.png') }}");
	}
	#dekstop:after{
		background-image: url("{{ asset('amadeo/images-base/dekstop-bottom.png') }}");
	}
	#dekstop #setup-space{
		background-image: url("{{ asset('amadeo/images-base/dekstop-dot-tekstur.png') }}");
	}
</style>
@endsection

@section('content')
	<div id="dekstop" class="animation-element">
		<div id="setup-space">
			<div id="vertical-midle">
				<div id="welcome" class="col">
					<h2>welcome to</h2>
				</div>
				<div id="tingkat" class="col">
					<a href="{{ route('frontend.home') }}">
						<img src="{{ asset('amadeo/images-base/logo-tingkat.png') }}">
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
