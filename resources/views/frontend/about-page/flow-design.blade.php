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
			<h1>flow of the design process</h1>
			<div class="content-wrapper">
				<img id="flow-design" src="{{ asset('amadeo/images-base/about-flow-design.png') }}">
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
