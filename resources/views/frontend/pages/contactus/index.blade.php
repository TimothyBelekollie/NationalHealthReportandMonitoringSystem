@extends('frontend.master')
@section('frontend')
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
	<div class="breadcumb-area">
		<div class="container">
			<div class="row">
				<div class="breadcumb-content">
					<h1>Contact Us</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>Contact Us</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----Start Appoinment Section ----->
	<!--===================================================-->
	<div class="contact-us pt-90 pb-90">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
					<div class="contact_from_box">
						<div class="contact_title pb-4">
							<h3>Get In Touch</h3>
							@if(session()->has('message'))
					  
					  <div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Hello,</strong> {{session()->get('message')}}
						{{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
					  </div>
						@endif
						</div>
						<form action="{{route('contact.store')}}" method="POST" >
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="name"  placeholder="Name">
										@error('name')
										<span class="text-danger">{{$message}}</span>
									@enderror
									</div>
									
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" name="email" placeholder="Email Address">
										@error('email')
										<span class="text-danger">{{$message}}</span>
									@enderror
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="phone" placeholder="Phone Number">
										@error('phone')
										<span class="text-danger">{{$message}}</span>
									@enderror
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="websiteurl" placeholder="Websiteurl (Optional)">
										@error('websiteurl')
										<span class="text-danger">{{$message}}</span>
									@enderror
									</div>
								</div>
								
								<div class="col-lg-12">
									<div class="form_box mb-30">
										<textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
										@error('message')
										<span class="text-danger">{{$message}}</span>
									@enderror
									</div>
									<div class="quote_btn">
										<button class="btn" type="submit">Send Message</button>
									</div>
								</div>
							</div>
						</form>
						<div id="status"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
					<div class="cda-content-area">
						<div class="cda-single-content d-flex">
							<div class="cda-icon">
								<i class="flaticon-time"></i>
							</div>
							<div class="cda-content-inner">
								<h4>NHMARS Location</h4>
								<p>3rd Street, <br>Monrovia, Liberia</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-call"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Telephone Number</h4>
								<p>+231886011550,  <br>+231770772712, </p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-next-1"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Our Email Address</h4>
								<p>nhmars@gmail.com <br>nhmars.lr@gmail.com</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----Start Contact Location Section ----->
	<!--===================================================-->	
	<div class="map-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p-0">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48384.367867189205!2d-74.01058227968896!3d40.71751035716885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1609671967457!5m2!1sen!2sbd" width="1920" height="350" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----START FOOTER SECTION ----->
	<!--===================================================-->
	
	<!--==================================================-->
	<!-----start footer copyright  SECTION ----->
	<!--===================================================-->
	@endsection