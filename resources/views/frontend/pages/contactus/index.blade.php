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
						</div>
						<form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form" >
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="name"  placeholder="Name">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="phone" placeholder="Phone Number">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="web" placeholder="Website">
									</div>
								</div>
								
								<div class="col-lg-12">
									<div class="form_box mb-30">
										<textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
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
								<h4>Company Location</h4>
								<p>Durham Street Hialeah, <br>FL 33010, USA</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-call"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Telephone Number</h4>
								<p>+880 636 524 265,  <br>+880 636 524 265, </p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-next-1"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Our Email Address</h4>
								<p>yourinfo@gmail.com <br>yourmail@gmail.com</p>
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
	<div class="footer">
		<div class="container">
			<div class="row footer-hr">
				<div class="col-md-6 col-lg-3">
					<div class="widget">
						<div class="about-company">
							<div class="footer-logo">
								<img src="assets/images/footer/logo2.png" alt="Footer-logo">
							</div>
							<p>We are the best world Information Technology Company. Providing the highest quality.</p>
							<div class="footer-about-social-icon">
								<ul>
									<li>
										<a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-pinterest"></i></a>
									</li>
									<li>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="widget">
						<div class="footer-quick-link">
							<div class="footer-widget-title">
								<h5>Quick Links</h5>
							</div>
							<div class="footer-quick-link-list">
								<ul>
									<li><a href="#">Customers Services</a></li>
									<li><a href="#">IT Department</a></li>
									<li><a href="#">About Our Company</a></li>
									<li><a href="#">Business Growth</a></li>
									<li><a href="#">Make An Appointment</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="widget">
						<div class="footer-contact">
							<div class="footer-widget-title">
								<h5>Contacts</h5>
							</div>
							<p><b>Adress: </b>27 Division St, New York, NY 10002, USA</p>
							<p><b>Phone: </b> +8 91230 456 789 <br>Fax: +8 91230 456 788</p>
							<p><b>Email: </b> example@mail.com <br> Website: your website.com</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="widget">
						<div class="footer-popular-post ">
							<div class="footer-widget-title">
								<h5>Popular Post</h5>
							</div>
							<div class="footer-popular-single-post d-flex">
								<div class="single-post-img">
									<a href="#">
										<img src="assets/images/footer/add1.jpg" alt="footer-post">
									</a>
								</div>
								<div class="popular-post-title">
									<a href="#">
										<h6>Plan Your Project with Your Software </h6>
									</a>
									<p>January 01, 2023</p>
								</div>
							</div>
							<div class="footer-popular-single-post d-flex">
								<div class="single-post-img">
									<a href="#">
										<img src="assets/images/footer/add2.jpg" alt="footer-post">
									</a>
								</div>
								<div class="popular-post-title">
									<a href="#">
										<h6>You have a Great Business Idea? </h6>
									</a>
									<p>January 01, 2023</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----start footer copyright  SECTION ----->
	<!--===================================================-->
	@endsection