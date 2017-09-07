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
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/about.css') }}">
	<style type="text/css">
	</style>
@endsection

@section('content')
	<div id="main-content" class="animation-element">
		<div class="side col">
			<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
			<img id="block-l" src="{{ asset('amadeo/images-base/block-l.png') }}">
			<img id="block-o" src="{{ asset('amadeo/images-base/block-o.png') }}">
			<img id="block-ii" src="{{ asset('amadeo/images-base/block-ii.png') }}">
		</div>
		<div id="main" class="col">
			<h1>our commitment to you</h1>
			<div class="content-wrapper">
				<div class="content-col">
					<img style="height: 120px" src="{{ asset('amadeo/images-base/aoc-many.png') }}">
				</div>
				<div class="content-col">
					<p>
						Oversee your project with Professionalism, Respect, and Integrity.
					</p>
					<p>
						Communicate in a timely manner.
					</p>
					<p>
						Collaborate with you closely as a friend or family member to achieve the design of your dreams.
					</p>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="content-col">
					<img src="{{ asset('amadeo/images-base/aoc-best-design-timeless.png') }}">
				</div>
				<div class="content-col">
					<p>
						Execute a timeless, warm, and beautiful design.
					</p>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="content-col">
					<img src="{{ asset('amadeo/images-base/aoc-best-vendors.png') }}">
				</div>
				<div class="content-col">
					<p>
						Find the best vendors for your projects.
					</p>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="content-col">
					<img src="{{ asset('amadeo/images-base/aoc-privacy-safeguard.png') }}">
				</div>
				<div class="content-col">
					<p>
						Safeguard your Privacy.
					</p>
				</div>
			</div>
		</div>
		<div class="side col">
			<img id="block-l" src="{{ asset('amadeo/images-base/block-l.png') }}">
			<img id="block-iii" src="{{ asset('amadeo/images-base/block-iii.png') }}">
			<img id="block-n" src="{{ asset('amadeo/images-base/block-n.png') }}">
			<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
		</div>
	</div>
@endsection

@section('script')
@endsection
