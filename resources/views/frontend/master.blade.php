<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>NHMARS-Home</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('frontend.componenents.meta')
</head>
<body>
	<!-- Loder Start -->
	{{-- <div class="loader-wrapper">
	  <div class="loader"></div>
	  <div class="loder-section left-section"></div>
	  <div class="loder-section right-section"></div>
	</div> --}}
	<!-- Loder End -->

	@include('frontend.componenents.header')

    @yield('frontend')
	
	<!-----START FOOTER SECTION ----->
	<!--===================================================-->
	@include('frontend.componenents.footer')
	<!--==================================================-->
	<!-----start footer copyright  SECTION ----->
	<!--===================================================-->
	<div class="footer-copyright-section upper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="footer-copyright-text">
						<p>&copy; 2023 - <span>itsoft</span> all rights reserved. </p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="footer-copyright-link">
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Services</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----start fTo-Top ----->
	<!--===================================================-->
	<button id="to-top">
		<i class="fa fa-angle-up"></i>
	</button>
	<!--==================================================-->
	<!-- Start Search Popup Area -->
	<!--==================================================-->
	<div class="search-popup">
		<button class="close-search style-two"><i class="fas fa-times"></i></button>
		<button class="close-search"><i class="fas fa-arrow-up"></i></button>
		<form method="post" action="#">
			<div class="form-group">
				<input type="search" name="search-field" value="" placeholder="Search Here" required="">
				<button type="submit"><i class="fas fa-search"></i></button>
			</div>
		</form>
	</div>
	@include('frontend.componenents.js')
</body>
</html>
