@extends('frontend.master')
@section('frontend')
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
	<div class="breadcumb-area">
		<div class="container">
			<div class="row">
				<div class="breadcumb-content">
					<h1>Redemption Hospital</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>Redemption Hospital</li>
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
						<div class="top-link">
							<a href="#">Specializations</a>
						</div>
						<div class="single-pack d-flex">
							<div class="pack-icon">
								<i class="flaticon-web"></i>
							</div>
							<div class="pack-content">
								<div class="pack-title"><h5>Damatology</h5></div>
								<!-- <div class="get-pack"><a href="#">Download PDF</a></div> -->
							</div>
						</div>
						<div class="single-pack d-flex">
							<div class="pack-icon">
								<i class="flaticon-web"></i>
							</div>
							<div class="pack-content">
								<div class="pack-title"><h5>Bones</h5></div>
								<!-- <div class="get-pack"><a href="#">Download Txt</a></div> -->
							</div>
						</div>
						<div class="call-do-thumb">
							<img src="{{asset('frontend/assets/images/call-do-action/cdasmi.jpg')}}" alt="thumb">
						</div>
						<div class="cda-content text-center">
							<h4>For Abulance Services Call Us</h4>
							<h3><i class="flaticon-process"></i> +231886011550</h3>
						</div>
					</div>
					<form class="appointment-form text-center pt-40 pb-50 mt-25"action="" method="POST">
						<div class="appoinment-title">
							<h3>Book an Appointment</h3>
						</div>
						<input class="input-box" name="name" type="text" placeholder="Your Name" required="">
						<input class="input-box" name="email" type="email" placeholder="Your Email(Optional)" required="">
						<input class="input-box" name="number" type="text" placeholder="Your Number" required="">
						<select name="select" class="input-box">
							<option value="">Your Inquiry About</option>
							<option value="">General Information Request</option>
							<option value="">Partner Relation</option>
							<option value="">Software Licensing</option>
						</select>
						<textarea class="input-box" name="messagebox" id="apm-txt-box" cols="30" rows="5" placeholder=" Your Message" required=""></textarea>
						<input type="submit" class="ap-submit-btn" value="Send Request">
					</form>
					<div id="status"></div>
				</div>
				<div class="col-lg-8">
					<div class="section-thumb">
						<img src="{{asset('frontend/assets/images/services/sss1.jpg')}}" alt="single service thumb">
					</div>
					<div class="overview-content">
						<h1 class="overview-title">Description</h1>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
					</div>
					<div class="row">
						<div class="col-lg-4">
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
						</div>
						<div class="col-lg-4">
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
						</div>
						<div class="col-lg-4">
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
						</div>
					</div>
					<div class="ap-section-content">
						<div class="overview-content">
							<h1 class="overview-title">Powerful strategies</h1>
							<p class="pb-15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurie</p>

							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="overview-thumb mb-30">
										<img src="{{asset('frontend/assets/images/appointment/apm2.jpg')}}" alt="appointment thumb">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">Maecenas sed lorem eu dolor sodales</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">Aliquam sodales ipsum eu ante</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">Cras tristique elit nec ligula</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">Nam hendrerit tortor vel mi semper</div>
									</div>
									<div class="ap-content-inner d-flex">
										<div class="ap-content-icon">
											<i class="far fa-check-circle"></i>
										</div>
										<div class="ap-content-text">Aenean at sem vel felis blandit</div>
									</div>
								</div>
							</div>
							<p class="pt-15 pb-25">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurie</p>

							<!-- <h1 class="overview-title pb-15">Our Expert Engineers</h1> -->
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	@endsection