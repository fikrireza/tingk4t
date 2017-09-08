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
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/project.css') }}">
	<style type="text/css">
	</style>
@endsection

@section('content')
	<div id="main-content" class="animation-element">
		<div id="title">
			<h1>projects</h1>
		</div>
		<div id="project-content-list">
			@for($a=1; $a<=8; $a++)
			<div class="project-bg" style="background-image: url('{{ asset('amadeo/images-base/project-'.$a.'.jpg') }}');" data-location='location {{ $a }} in here test dengan text yg panjang misalkan di jalan laksamana maeda block 3C no 61A/61B, Senen Jakarta' data-scope='scope {{ $a }} in here <ul><li>test</li><li>test</li><li>test</li><li>test</li><li>test</li></ul>'>
				<div class="project-cl">
					<h3>title {{ $a }} in here</h3>
				</div>
			</div>
			@endfor
			{{--
			@foreach($call as $list)
			<div class="project-bg" style="background-image: url('{{ asset('amadeo/images-base/'.$list->img_thumb) }}');" data-image='{!! $list->img_large !!}' data-location='{!! $list->location !!}' data-scope='{!! $list->scope !!}'>
				<div class="project-cl">
					<h3>title {{ $a }} in here</h3>
				</div>
			</div>
			@endforeach
			--}}
		</div>
	</div>
	<div id="view-project">
		<div id="wrapper">
			<div id="img" class="float" style="background-image: url('{{ asset('amadeo/images-base/project-1.jpg') }}');">
				
			</div>
			<div id="description" class="float">
				<h1 id="title">title in here</h1>
				<p>Location :</p>
				<p id="location">location in here</p>
				<p>Scope of Work :</p>
				<p id="scope">scope in here</p>
			</div>
			<div id="close" class="float">
				<img id="close" src="{{ asset('amadeo/images-base/cross.png') }}">
			</div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$("#project-content-list .project-bg").click(function(){
		var bg 			= $(this).css('background-image');
		// var image		= $(this).data('image');
		var location 	= $(this).data('location');
		var scope 		= $(this).data('scope');
		var title 		= $(this).children().children().html();

		$("#view-project #img").css('background-image', bg);
		// $("#view-project #img").css('background-image', image);
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
</script>
@endsection
