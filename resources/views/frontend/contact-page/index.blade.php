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
	<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
	<div id="main-content" class="animation-element">
		<div id="title">
			<h1>contact</h1>
		</div>
		<div id="content">
			<div class="float">
				<form id="contact-form" method="post" action="{{ route('frontend.contact.store') }}">
					{{ csrf_field() }}
					@if(Session::has('alert'))
						<script>
						  window.setTimeout(function() {
						    $("form div.alert").fadeTo(700, 0).slideUp(700, function(){
						        $(this).remove();
						    });
						  }, 5000);
						</script>
						<div class="alert {{ Session::get('alert') }}" role="alert">
					      <strong>{{ Session::get('info') }}</strong>
					    </div>
					@endif
					@if($errors->has('subject'))
						<code><span class="alret">{{ $errors->first('subject')}}</span></code>
					@endif
					<input 
						name="subject" 
						type="text" 
						class="form-control" 
						placeholder="Subject*"
						value="{{ old('subject') }}" 
						{{ Session::has('autofocus') ? 'autofocus' : ''}}
					>
					@if($errors->has('email'))
						<code><span class="alret">{{ $errors->first('email')}}</span></code>
					@endif
					<input 
						name="email" 
						type="text" 
						class="form-control" 
						placeholder="Email Address*"
						value="{{ old('email') }}" 
					>
					@if($errors->has('name'))
						<code><span class="alret">{{ $errors->first('name')}}</span></code>
					@endif
					<input 
						name="name" 
						type="text" 
						class="form-control" 
						placeholder="Your Name*"
						value="{{ old('name') }}" 
					>
					@if($errors->has('telp'))
						<code><span class="alret">{{ $errors->first('telp')}}</span></code>
					@endif
					<input 
						name="telp" 
						type="text" 
						class="form-control" 
						placeholder="Your Phone*"
						value="{{ old('telp') }}"
						onkeypress="return isNumber(event)" 
					>
					@if($errors->has('message'))
						<code><span class="alret">{{ $errors->first('message')}}</span></code>
					@endif
					<textarea 
						name="message" 
						class="form-control" 
						placeholder="Message*" 
						rows="5"
					>{{ old('message') }}</textarea>
					<button class="button" type="button">
						Submit
					</button>
					<div class="g-recaptcha" data-sitekey="6LdUKDAUAAAAALg_qt6N-7qXDnMxpejOceyFLfSV" data-callback="submitThisForm" style="display: none;"></div>
				</form>
			</div>
			<div class="float">
				<iframe id="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8256289319916!2d106.76961231476876!3d-6.154102995544352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f634c139d2b1%3A0xbb162ec3fc1824ea!2sPT+Digital+Indonesia!5e0!3m2!1sid!2sid!4v1505094252437" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$('button.button').click(function(){
		$(this).hide();
		$("div.g-recaptcha").show();
	});
	function submitThisForm(){
		$("form#contact-form").submit();
	}
	function isNumber(evt) {
	  	evt = (evt) ? evt : window.event;
	  	var charCode = (evt.which) ? evt.which : evt.keyCode;
	  	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	  		return false;
	  	}
	  	return true;
	  }
</script>
@endsection
