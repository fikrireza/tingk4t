<!DOCTYPE html>
<html>
<head>
	<title>Tingkat</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="title" content="Tingkat">
	<meta name="keywords" content=""/>
	<meta name="description" content="">

	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/single-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/font/font-family.css') }}">
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
		#navigasi #copy-right{
			background-image: url("{{ asset('amadeo/images-base/dekstop-dot-tekstur.png') }}");
		}
		#home.main-content #one.main-slide{
			background-image: url("{{ asset('amadeo/images-base/home-bg-one.jpg') }}");
		}
		#home.main-content.show-discrip #one.main-slide{
			background-image: url("{{ asset('amadeo/images-base/home-bg-two.jpg') }}");
		}
		#services.main-content #banner{
			background-image: url("{{ asset('amadeo/images-base/services-banner.jpg') }}");
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/home.css') }}">

</head>
<body>

	<div id="dekstop" class="animation-element">
		<div id="setup-space">
			<div id="vertical-midle">
				<div id="welcome" class="col">
					<h2>welcome to</h2>
				</div>
				<div id="tingkat" class="col">
					<a href="#home">
						<img src="{{ asset('amadeo/images-base/logo-tingkat.png') }}">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="navigasi" class="animation-element">
		<a href="#dekstop">
			<img id="logo-tingkat" src="{{ asset('amadeo/images-base/logo-tingkat.png') }}">
		</a>
		<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
		<div id="nav-wrapper-list">
			<div class="list">
				<a 
					href="#home"
					class="">
					home
				</a>
			</div>
			<div class="list slide-down-actived">
				<a class="#">
					about us
				</a>
				<div class="slide-down-content">
					<a 
						href="#our-commitment"
						class="" 
					>
						our commitment
					</a>
					<br>
					<a 
						href="#flow-design"
						class="" 
					>
						flow of design
					</a>
				</div>
			</div>
			<div class="list">
				<a 
					href="#services"
					class="">
					services
				</a>
			</div>
			<div class="list">
				<a 
					href="#projects"
					class="">
					projects
				</a>
			</div>
			<div class="list">
				<a 
					href="#contact"
					class="">
					contact
				</a>
			</div>
		</div>
		<img id="block-n" src="{{ asset('amadeo/images-base/block-n.png') }}">
		<div id="copy-right">
			<p>copyright 2017 tingkat</p>
		</div>
	</div>

	<div id="home" class="main-content animation-element">
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

	<div id="our-commitment" class="about main-content animation-element">
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

	<div id="flow-design" class="about main-content animation-element">
		<div class="side col">
			<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
			<img id="block-l" src="{{ asset('amadeo/images-base/block-l.png') }}">
			<img id="block-o" src="{{ asset('amadeo/images-base/block-o.png') }}">
			<img id="block-ii" src="{{ asset('amadeo/images-base/block-ii.png') }}">
		</div>
		<div id="main" class="col">
			<h1>flow of the design process</h1>
			<div class="content-wrapper">
				<img id="flow-design-img" src="{{ asset('amadeo/images-base/about-flow-design.png') }}">
			</div>
		</div>
		<div class="side col">
			<img id="block-l" src="{{ asset('amadeo/images-base/block-l.png') }}">
			<img id="block-iii" src="{{ asset('amadeo/images-base/block-iii.png') }}">
			<img id="block-n" src="{{ asset('amadeo/images-base/block-n.png') }}">
			<img id="block-w" src="{{ asset('amadeo/images-base/block-w.png') }}">
		</div>
	</div>

	<div id="services" class="main-content animation-element">
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

	<div id="projects" class="main-content animation-element">
		<div id="title">
			<h1>projects</h1>
		</div>
		<div id="project-content-list">
			@foreach($call as $list)
			<div class="project-bg" style="background-image: url('{{ asset('amadeo/images/projects/'.$list->img_thumb) }}');" data-image="url('{{ asset('amadeo/images/projects/'.$list->img_large) }}')" data-location='{!! $list->location !!}' data-scope='{!! $list->scope !!}'>
				<div class="project-cl">
					<h3>{!! $list->name !!}</h3>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div id="view-project">
		<div id="wrapper">
			<div id="img" class="float" style="background-image:;">
				
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

	<div id="contact" class="main-content animation-element">
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

	<script type="text/javascript" src="{{ asset('amadeo/plugin/jquery/jquery-3.2.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/single-page.js') }}"></script>
</body>
</html>
