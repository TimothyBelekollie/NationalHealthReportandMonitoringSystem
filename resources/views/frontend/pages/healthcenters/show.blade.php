@extends('frontend.master')
@section('frontend')
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
	<div class="breadcumb-area">
		<div class="container">
			<div class="row">
				<div class="breadcumb-content">
					<h1>{{$healthCenter->name}}</h1>
					<ul>
						<li><a href="{{URL::TO('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>{{$healthCenter->name}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----START Single Service Section ----->
	<!--===================================================-->
	<div class="single-service pt-75 pb-75">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="call-do-action">
						{{-- <div class="top-link">
							<a href="#">Specialization</a>
						</div> --}}
						{{-- <div class="single-pack d-flex">
							<div class="pack-icon">
								<i class="flaticon-web"></i>
							</div>
							<div class="pack-content">
								<div class="pack-title"><h5>Damatology</h5></div>
								<!-- <div class="get-pack"><a href="#">Download PDF</a></div> -->
							</div>
						</div> --}}
						{{-- <div class="single-pack d-flex">
							<div class="pack-icon">
								<i class="flaticon-web"></i>
							</div>
							<div class="pack-content">
								<div class="pack-title"><h5>Bones</h5></div>
								<!-- <div class="get-pack"><a href="#">Download Txt</a></div> -->
							</div>
						</div> --}}
						<div class="call-do-thumb">
							<img src="{{asset('frontend/abulance.jpeg')}}" alt="thumb">
						</div>
						<div class="cda-content text-center">
							<h4>For Abulance Services Call Us</h4>
							<h3><i class="flaticon-process"></i>{{$healthCenter->contactTwo}}</h3>
						</div>
					</div>
					<form class="appointment-form text-center pt-40 pb-50 mt-25" action="{{route('send.appointment')}}" method="POST">
						@csrf
						<div class="appoinment-title">
							<h3>Book an Appointment</h3>
							@if(session()->has('message'))
					  
					  <div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Hello,</strong> {{session()->get('message')}}
						{{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
					  </div>
						@endif
						</div>
						<input class="input-box" name="name" type="text" placeholder="Your Name">
						<span>
						@error("name")
						<p class="text-danger">{{$message}}	</p>
						@enderror
					    </span>
						<input class="input-box" name="email" type="email" placeholder="Your Email">
						@error("email")
						<p class="text-danger">{{$message}}	</p>
						@enderror
						<input class="input-box" name="phone" type="text" placeholder="Your Number" >
						@error("phone")
						<p class="text-danger">{{$message}}	</p>
						@enderror
						
						{{-- <select name="select" class="input-box">
							<option value="">Your Inquiry About</option>
							<option value="">General Information Request</option>
							<option value="">Partner Relation</option>
							<option value="">Software Licensing</option>
						</select> --}}
						<textarea class="input-box" name="message" id="apm-txt-box" cols="30" rows="5" placeholder=" Your Message"></textarea>
						@error("message")
						<p class="text-danger">{{$message}}	</p>
						@enderror
						<input class="input-box" name="health_center_id" type="text" hidden value="{{$healthCenter->id}}" >

						<input type="submit" class="ap-submit-btn" value="Send Request">
					</form>
					<div id="status"></div>
				</div>
				<div class="col-lg-8">
					<div class="section-thumb">
						<img src="{{asset('Upload/healthCenter/'.$healthCenter->profileImage)}}" alt="single service thumb">
					</div>
					<div class="overview-content">
						<h1 class="overview-title">About Us</h1>
						<p>{{$healthCenter->description}}</p>
					</div>
				<div class="row">
						{{-- <div class="col-lg-4">
							<div class="pointment-single-feature">
								<div class="ap-feature-icon">
									<i class="flaticon-time"></i>
								</div>
								<div class="ap-feature-title">
									<h4>Global service</h4>
								</div>
								<div class="ap-feature-content">
									<p>It has survived not only five centurie</p>
								</div>
							</div>
						</div> --}}
						{{-- <div class="col-lg-4">
							<div class="pointment-single-feature">
								<div class="ap-feature-icon">
									<i class="flaticon-content"></i>
								</div>
								<div class="ap-feature-title">
									<h4>Easy to integrate</h4>
								</div>
								<div class="ap-feature-content">
									<p>It has survived not only five centurie</p>
								</div>
							</div>
						</div> --}}
						{{-- <div class="col-lg-4">
							<div class="pointment-single-feature">
								<div class="ap-feature-icon">
									<i class="flaticon-developer"></i>
								</div>
								<div class="ap-feature-title">
									<h4>Customer support</h4>
								</div>
								<div class="ap-feature-content">
									<p>It has survived not only five centurie</p>
								</div>
							</div>
						</div> --}}
					</div>
					<div class="ap-section-content">
						<div class="overview-content">
							<h1 class="overview-title">GET IN TOUCH WITH US</h1>
							{{-- <p class="pb-15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurie</p> --}}

							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">{{$healthCenter->emailOne}}</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">{{$healthCenter->emailTwo}}</div>
									</div>
								
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">{{$healthCenter->contactOne}}</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">{{$healthCenter->contactTwo}}</div>
									</div>
									
								</div>
							</div>
							

							<!-- <h1 class="overview-title pb-15">Our Expert Engineers</h1> -->
						</div>
					</div> 
					
				</div>
			</div>
		</div>
	</div>
	@endsection