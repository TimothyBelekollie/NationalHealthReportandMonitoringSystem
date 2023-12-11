@extends('frontend.master')
@section('frontend')
<!-----Start Carousel Slider Section ------->
	<!--===================================================-->
	<div class="carousel-slider-section style-ten">
		<div class="container-fluid">
			<div class="owl-carousel slider-carousel2">
				<div class="carousel-slider2  white d-flex align-items-center" style="background: transparent;">
					{{-- <div class="layer-image" style="background: url(assets/images/about/two.png) no-repeat center /cover scroll">
					</div> --}}
                    <div class="layer-image" style="background: url('{{ asset('frontend/assets/images/about/two.png') }}') no-repeat center/cover scroll;">
                    </div>

					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="carousel-slider-content">
									<h4 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0s" >SECURE & RELIABLE</h4>
									<div class="wow fadeInDown"  data-wow-duration="2s" data-wow-delay=".5s">
										<h1 class="text-white"  >Transformation is <br> about <span>Inclusivity</span></h1>
									</div>
									<p class="wow fadeInDown"  data-wow-duration="2s" data-wow-delay=".5s">
                                        {{-- Authoritatively transform adaptive manufactured products before networks. Authoritatively disintermediate. --}}
                                        As a Nation we protect your data but we also let you to have access it, isn't that amazing?

                                    </p>
									<div class="carousel-btn-area mt-40 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
										<div class="carousel-btn two btn-carousel-slider">
											<a href="#">LEARN MORE <i class="fas fa-long-arrow-alt-right"></i></a>
										</div>
										<div class="rs-video">
											<div class="animate-border">
												{{-- <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=BsTpnBtqBOU&ab_channel=WsCubeTech">
													<i class="fa fa-play"></i>
												</a> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="slider-img  shape1 bounce-animate3">
							<img src="{{asset('frontend/assets/images/about/miss-11.png')}}" alt="">
						</div>
						<div class="slider-img  shape2">
							<img src="{{asset('frontend/assets/images/about/miss12.png')}}" alt="">
						</div>
						<div class="slider-img  shape3 bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/miss-13.png')}}" alt="">
						</div>
						<div class="slider-img  shape4 bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/miss-14.png')}}" alt="">
						</div>
						<div class="slider-img  shape5 bounce-animate3">
							<img src="{{asset('frontend/assets/images/about/icon5.png')}}" alt="">
						</div>
						<div class="slider-img  shape6">
							<img src="{{asset('frontend/assets/images/about/miss-15.png')}}" alt="">
						</div>
						<div class="slider-img  shape7">
							<img src="{{asset('frontend/assets/images/about/miss-16.png')}}" alt="">
						</div>
					</div>
				</div>
				{{-- <div class="carousel-slider2 style-fiveteen  white d-flex align-items-center" style="background: transparent;">
					<div class="layer-image" style="background: url('{{asset('frontend/assets/images/about/banner-4.jpg')}}') no-repeat center /cover scroll">
					</div>

                   
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="carousel-slider-content">
									<h4 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0s" >SECURE & IT SERVICE</h4>
									<h1 class="text-white">Transformation is <br> with <span>Business</span></h1>
									<p class="wow fadeInDown"  data-wow-duration="2s" data-wow-delay=".5s">Authoritatively transform adaptive manufactured products before networks. Authoritatively disintermediate.</p>
									<div class="carousel-btn-area mt-40 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
										<div class="carousel-btn two btn-carousel-slider">
											<a href="#">LEARN MORE <i class="fas fa-long-arrow-alt-right"></i></a>
										</div>
										<div class="rs-video">
											<div class="animate-border">
												<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=BsTpnBtqBOU&ab_channel=WsCubeTech">
													<i class="fa fa-play"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="slider-thumb">
									<img src="{{asset('frontend/assets/images/about/banner-3.png')}}" alt="">
								</div>
							</div>
						</div>
						<div class="slider-img  shape1 bounce-animate3">
							<img src="{{asset('frontend/assets/images/about/miss-11.png')}}" alt="">
						</div>
						<div class="slider-img  shape2">
							<img src="{{asset('frontend/assets/images/about/miss12.png')}}" alt="">
						</div>
						<div class="slider-img  shape3 bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/miss-13.png')}}" alt="">
						</div>
						<div class="slider-img  shape4 bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/miss-14.png')}}" alt="">
						</div>
						<div class="slider-img  shape5 bounce-animate3">
							<img src="{{asset('frontend/assets/images/about/icon5.png')}}" alt="">
						</div>
						<div class="slider-img  shape6">
							<img src="{{asset('frontend/assets/images/about/miss-15.png')}}" alt="">
						</div>
						<div class="slider-img  shape7">
							<img src="{{asset('frontend/assets/images/about/miss-16.png')}}" alt="">
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----Start Feature Section ----->
	<!--===================================================-->
	<div class="feature-section style-eleven">
		<div class="container">
			<div class="row upper11">
				<div class="col-sm-12 col-md-6 col-lg-6 p-0">
					<div class="single-feature-box-two">
						<div class="single-feature-thumb">
							<img src="{{asset('frontend/assets/images/about/icon.png')}}" alt="">
						</div>
						<div class="feature-content">
							<h4 class="text-white">High Quality Data Secuirity</h4>
							<p>Assertively incentivize highly.</p>
						</div>
						<div class="feature-number">
							<h1>01</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 p-0">
					<div class="single-feature-box-three">
						<div class="single-feature-thumb">
							<img src="{{asset('frontend/assets/images/about/feature2.png')}}" alt="">
						</div>
						<div class="feature-content">
							<h4 class="text-white">Making you part of your Data</h4>
							<p>A journey with you involved.</p>
						</div>
						<div class="feature-number">
							<h1>02</h1>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----Start About Section Style Seven ----->
	<!--===================================================-->
	<div class="about-section style-elevent upper pt-100 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="about-section-thumb">
						<img src="{{asset('frontend/assets/images/about/miss-20.png')}}" alt="thumb">
						<div class="section-img shape4">
						<img src="{{asset('frontend/assets/images/about/miss-21.png')}}" alt="">
						</div>
						<div class="section-img shape5">
							<img src="{{asset('frontend/assets/images/about/miss-3.png')}}" alt="">
						</div>
						<div class="section-img shape6">
							<img src="{{asset('frontend/assets/images/about/miss-23.png')}}" alt="">
						</div>
						<div class="section-img shape7 bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/miss-24.png')}}" alt="">
						</div>
						<div class="section-address">
							<ul>
								<li><a class="address3 bounce-animate4" href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a class="address1 bounce-animate3" href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a class="address2 bounce-animate2" href="#"><i class="fab fa-pinterest-p"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="content-wrapper">
						<div class="section-head mb-40">
							<h5>// DISCOVER US</h5>
							<h3>
                                {{-- Bringing New IT Business --}}
                                A National Health Solution
                            </h3>
							<h2>That You <span>Can Trust</span></h2>
							<div class="section-content-text">
								<p>
                                     The National Health Monitoring and Report System is a system that brings all health 
                                     Stakeholders together to make informed and reliable decision about a Country health system base on data.
                                     As a system we also allow you to connect with any Healthcenter just from here. Whether you want to book an 
                                     appointment or you want to get your personal medical history, we are here to serve you. 
                                </p>
							</div>
						</div>
						<div class="row pt-15">
							<div class="col-lg-4 col-md-6">
								<div class="ection-about-single-box">
									<div class="section-about-thumb">
										<img src="{{asset('frontend/assets/images/about/icon3.png')}}" alt="">
									</div>
									<div class="section-about-content">
										<div class="section-about-title">
											<h4>Data Protection</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="ection-about-single-box">
									<div class="section-about-thumb">
										<img src="{{asset('frontend/assets/images/about/miss-18.png')}}" alt="">
									</div>
									<div class="section-about-content">
										<div class="section-about-title">
											<h4>24/7 Support</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="ection-about-single-box two">
									<div class="section-about-thumb">
										<img src="{{asset('frontend/assets/images/about/miss-19.png')}}" alt="">
									</div>
									<div class="section-about-content">
										<div class="section-about-title">
											<h4>Healthy Society</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!--Start service Section-->
	<!--===================================================-->
	<div class="service-area style-ten pt-100 pb-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="section-head  mb-20">
						<h5>// WHAT OUR OFFER</h5>
						<h2>Health Solution</h2>
						<p> 
                            We connect you with all the heatlh systems from all part of the Nation, so that you won't struggle anymore. 
                        </p>
					</div>
					<div class="services-btn mt-35">
						{{-- <a href="#">View All <i class="fas fa-long-arrow-alt-right"></i></a> --}}
					</div>
				</div>
				<div class="col-lg-8">
					<div class="row pt-45">
						<div class="col-lg-6 col-md-6">
							<div class="single-service-box">
								<div class="single-service-thumb">
									<img src="{{asset('frontend/assets/images/about/vice2.png')}}" alt="">
								</div>
								<div class="single-service-content">
									<div class="single-service-title">
										<h2>Appointment System</h2>
									</div>
									<div class="single-service-conent-text">
										<p>You are able to book Appointment with any Healthcenter using our system.</p>
									</div>
									<div class="single-service-icon-two">
										<a href="#"><i class="fas fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="single-service-box">
								<div class="single-service-thumb">
									<img src="{{asset('frontend/assets/images/about/vice5.png')}}" alt="">
								</div>
								<div class="single-service-content">
									<div class="single-service-title">
										<h2>Data Analytics</h2>
									</div>
									<div class="single-service-conent-text">
										<p>We allow Health Stakeholders to make informed decision base on reliable data.</p>
									</div>
									<div class="single-service-icon-two">
										<a href="#"><i class="fas fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row pt-45">
				<div class="col-lg-4 col-md-6">
					<div class="single-service-box">
						<div class="single-service-thumb">
							<img src="{{asset('frontend/assets/images/about/vice.png')}}" alt="">
						</div>
						<div class="single-service-content">
							<div class="single-service-title">
								<h2>Enhanced Coordination</h2>
							</div>
							<div class="single-service-conent-text">
								<p>
                                    Centralization for better collaboration and
                                    Facilitating efficient healthcare management
                                </p>
							</div>
							<div class="single-service-icon-two">
								<a href="#"><i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-service-box">
						<div class="single-service-thumb">
							<img src="{{asset('frontend/assets/images/about/vice3.png')}}" alt="">
						</div>
						<div class="single-service-content">
							<div class="single-service-title">
								<h2>Improved Resource Allocation</h2>
							</div>
							<div class="single-service-conent-text">
								<p>Accurate data for effective resource allocation.
                                    Ensuring availability of facilities, supplies, and personnel where needed</p>
							</div>
							<div class="single-service-icon-two">
								<a href="#"><i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>	
				<div class="col-lg-4 col-md-6">
					<div class="single-service-box">
						<div class="single-service-thumb">
							<img src="{{asset('frontend/assets/images/about/vice4.png')}}" alt="">
						</div>
						<div class="single-service-content">
							<div class="single-service-title">
								<h2>Medical History</h2>
							</div>
							<div class="single-service-conent-text">
								<p>Have you wonder of getting all your medical histories from different hospitals in one report, we got you.</p>
							</div>
							<div class="single-service-icon-two">
								<a href="#"><i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!--Start choose us Section-->
	<!--===================================================-->
	{{-- <div class="choose-area style-two pt-100 pb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6"></div>
				<div class="col-lg-6 col-md-6">
					<div class="content-wrapper">
						<div class="section-head mb-30">
							<h5 class="text-white">// WHY Trust US</h5>
							<h3 class="text-white">Some Of Reason For Choose</h3>
							<h2 class="text-white">Our<span class="text-white"> IT Solutions</span></h2>
							<div class="section-content-text">
								<p>Collaboratively reconceptualize real-time meta-services  paradigms. Professionally synergize plug-and-play standardized benefits via synergistic value done..</p>
							</div>
						</div>
						<div class="row pt-10">
							<div class="col-lg-5 col-md-6">
								<div class="choose-single-box">
									<div class="choose-content">
										<div class="choose-title">
											<h4 class="text-white">Brilient Client Service</h4>
										</div>
										<div class="choose-single-btn">
											<a href="#"><i class="fas fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="choose-single-box">
									<div class="choose-content">
										<div class="choose-title">
											<h4 class="text-white">Corporate Design Solution</h4>
										</div>
										<div class="choose-single-btn">
											<a href="#"><i class="fas fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="choose-single-box">
									<div class="choose-content">
										<div class="choose-title">
											<h4 class="text-white">Meeting Fixed Company</h4>
										</div>
										<div class="choose-single-btn">
											<a href="#"><i class="fas fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="choose-single-box">
									<div class="choose-content">
										<div class="choose-title">
											<h4 class="text-white">Any Business Deals</h4>
										</div>
										<div class="choose-single-btn">
											<a href="#"><i class="fas fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="choose-shape bounce-animate5">
							<img src="{{asset('frontend/assets/images/about/choose3.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!--==================================================-->
	<!--Start process area-->
	<!--===================================================-->
		<div class="process-area pt-100 pb-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-head text-center">
							<h5>// OUR STRATEGY</h5>
							<h3>Main Principles</h3>
						</div>
					</div>
				</div>
				<div class="row pt-60">
					<div class="col-lg-4 col-md-6">
						<div class="row">
							<div class="col-lg-12">
								<div class="process-single-box one">
									<div class="process-icon">
										<i class="flaticon-analytics"></i>
									</div>
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Data Analytics</h2></a>
										</div>
										<div class="process-content-text">
											<p>
                                                Enthusiastically leverage other compelling deliverables
                                            </p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="process-single-box">
									<div class="process-icon">
										<i class="flaticon-code"></i>
									</div>
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Data Tecnologiest</h2></a>
										</div>
										<div class="process-content-text">
											<p>Uniquely unles extensive meta meta-services through</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="process-single-box one">
									<div class="process-icon">
										<i class="flaticon-graphic-design"></i>
									</div>
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Super Tech Support</h2></a>
										</div>
										<div class="process-content-text">
											<p>We help the users to make the system their own</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
					</div>
					<div class="col-lg-4 col-md-6 p-0">
						<div class="row">
							<div class="col-lg-12">
								<div class="process-single-box two">
										<div class="process-icon">
										<i class="flaticon-graphic-design"></i>
									</div>
									
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Data Privacy</h2></a>
										</div>
										<div class="process-content-text">
											<p>We are aware that health data are private, so we go extra mile for you.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="process-single-box two upper">
									<div class="process-icon">
										<i class="flaticon-briefcase"></i>
									</div>
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Corporate Analytics</h2></a>
										</div>
										<div class="process-content-text">
											<p>We analyze data for insight at all levels for our Stakeholders</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="process-single-box two">
									<div class="process-icon">
										<i class="flaticon-lifebuoy"></i>
									</div>
									<div class="process-conent">
										<div class="process-title">
											<a href="#"><h2>Data Security</h2></a>
										</div>
										<div class="process-content-text">
											<p>You can count on us that your data is secure</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="shape">
					<img src="{{asset('frontend/assets/images/about/process.png')}}" alt="">
					<div class="shape-img shape2 bounce-animate5">
						<img src="{{asset('frontend/assets/images/about/proess4.png')}}" alt="">
					</div>
					<div class="shape-img shape3">
						<img src="{{asset('frontend/assets/images/about/process3.png')}}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Start counter Section-->
	<!--===================================================-->
	<div class="counter-area style-two">
		<div class="container">
			<div class="row upper13">
				<div class="col-lg-3 col-md-6">
					<div class="single-counter">
						<div class="counter-content">
							<div class="counter-text">
								<h1><span class="counter">13</span></h1>
								<span>+</span>
							</div>
							<div class="counter-title">
								<h4>CLIENT AWARDS</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-counter">
						<div class="counter-content">
							<div class="counter-text">
								<h1><span class="counter">09</span></h1>
								<span>k+</span>
							</div>
							<div class="counter-title">
								<h4>National Rewards</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-counter">
						<div class="counter-content">
							<div class="counter-text">
								<h1><span class="counter">36</span></h1>
								<span>+</span>
							</div>
							<div class="counter-title">
								<h4>Regional Rewards</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-counter">
						<div class="counter-content">
							<div class="counter-text">
								<h1><span class="counter">17</span></h1>
								<span>+</span>
							</div>
							<div class="counter-title">
								<h4>Global Rewards</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="lines">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</div>
	<!--==================================================-->
	<!--Start skill area-->
	<!--===================================================-->
	<div class="skill-area pt-100 pb-140">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<div class="skill-single-box">
						<div class="skill-thumb">
							<img src="{{asset('frontend/assets/images/about/mission.png')}}" alt="">
						</div>
						<div class="skill-shape-thumb">
							<div class="skill-img shape1 bounce-animate3">
								<img src="{{asset('frontend/assets/images/about/miss-1.png')}}" alt="">
							</div>
							<div class="skill-img shape-2">
								<img src="{{asset('frontend/assets/images/about/miss-2.png')}}" alt="">
							</div>
							<div class="skill-img shape-3">
								<img src="{{asset('frontend/assets/images/about/miss-22.png')}}" alt="">
							</div>
							<div class="skill-img shape-4 bounce-animate5">
								<img src="{{asset('frontend/assets/images/about/miss-4.png')}}" alt="">
							</div>
							<div class="skill-img shape-5 bounce-animate3">
								<img src="{{asset('frontend/assets/images/about/miss-5.png')}}" alt="">
							</div>
							<div class="skill-img shape-6 bounce-animate5">
								<img src="{{asset('frontend/assets/images/about/miss-6.png')}}" alt="">
							</div>
							<div class="skill-img shape-7">
								<img src="{{asset('frontend/assets/images/about/miss-7.png')}}" alt="">
							</div>
							<div class="skill-img shape-8">
								<img src="{{asset('frontend/assets/images/about/miss-10.png')}}" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="about-content-container">
						<div class="section-head-container">
							<div class="section-head">
								<h5>// DISCOVER OUR Flexibility</h5>
								<h3>We know that people use</h3>
								<h2>different <span>Devices</span></h2>
								<div class="section-content-text">
									<p>So our systems is build to accept all devices and operation systems just so you get an unforgetable experience.</p>
								</div>
							</div>
						</div>
						<div class="about-skills">
							<div class="skill-item">
								<div class="skill-header">
									<h6 class="skill-title">Windows Users</h6>
									<div class="skill-percentage clearfix">
										<div class="count-box">
											<span class="counter">100</span>
										</div>
										%
									</div>
								</div>
								<div class="skill-bar">
									<div class="bar-inner">
										<div class="bar progress-line" data-width="100"></div>
									</div>
								</div>
							</div>
							<div class="skill-item">
								<div class="skill-header">
									<h6 class="skill-title">IOS For Apple Users</h6>
									<div class="skill-percentage clearfix">
										<div class="count-box">
											<span class="counter">100</span>
										</div>
										%
									</div>
								</div>
								<div class="skill-bar">
									<div class="bar-inner">
										<div class="bar progress-line" data-width="100"></div>
									</div>
								</div>
							</div>
							<div class="skill-item">
								<div class="skill-header">
									<h6 class="skill-title">Android Users</h6>
									<div class="skill-percentage clearfix">
										<div class="count-box">
											<span class="counter">100</span>
										</div>
										%
									</div>
								</div>
								<div class="skill-bar">
									<div class="bar-inner">
										<div class="bar progress-line" data-width="100"></div>
									</div>
								</div>
							</div>
                            <div class="skill-item">
								<div class="skill-header">
									<h6 class="skill-title">Linux Users</h6>
									<div class="skill-percentage clearfix">
										<div class="count-box">
											<span class="counter">100</span>
										</div>
										%
									</div>
								</div>
								<div class="skill-bar">
									<div class="bar-inner">
										<div class="bar progress-line" data-width="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    @endsection