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
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/contact.css') }}">
	<style type="text/css">
	</style>
@endsection

@section('content')
	<div id="main-content" class="animation-element">
		<div id="title">
			<h1>contact</h1>
		</div>
		<div id="content">
			<div class="float">
				<form id="contact-form" method="post" action="">
					{{ csrf_field() }}
					@if(Session::has('alert'))
						<script>
						  window.setTimeout(function() {
						    $(".alert.alert-dismissible").fadeTo(700, 0).slideUp(700, function(){
						        $(this).remove();
						    });
						  }, 5000);
						</script>
						<div class="alert {{ Session::get('alert') }} alert-dismissible fade in" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					      </button>
					      <strong>{{ Session::get('info') }}</strong>
					    </div>
					@endif
					@if($errors->has('email'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('email')}}</span></code>
					@endif
					<input 
						name="email" 
						type="text" 
						class="form-control" 
						placeholder="Email Address*"
						value="{{ old('email') }}" 
						{{ Session::has('autofocus') ? 'autofocus' : ''}}
					>
					@if($errors->has('name'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('name')}}</span></code>
					@endif
					<input 
						name="name" 
						type="text" 
						class="form-control" 
						placeholder="Your Name*"
						value="{{ old('name') }}" 
					>
					@if($errors->has('message'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('message')}}</span></code>
					@endif
					<textarea 
						name="message" 
						class="form-control" 
						placeholder="Message" 
						rows="10"
					>{{ old('message') }}</textarea>
					<button class="button" type="button">
						Submit
					</button>
					<div class="g-recaptcha" data-sitekey="6LcoAS4UAAAAAHQ-NpZB7oZIeQ_IH-BUL6NuZqpw" data-callback="submitThisForm"></div>
				</form>
			</div>
			<div class="float">
				<iframe id="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4096047806356!2d106.62833971476904!3d-6.209582895504822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x320687ba53b4daa!2sPT.+Berri+Indosari!5e0!3m2!1sen!2sus!4v1503296702902" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
