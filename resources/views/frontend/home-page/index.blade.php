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
</style>
@endsection

@section('content')
	<div id="navigasi">
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
			<div class="list">
				<a>
					about us
				</a>
				<div class="slide-down">
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
