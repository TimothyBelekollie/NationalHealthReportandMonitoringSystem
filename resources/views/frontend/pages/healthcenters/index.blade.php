@extends('frontend.master')
@section('frontend')
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
	<div class="breadcumb-area">
		<div class="container">
			<div class="row">
				<div class="breadcumb-content">
					<!-- <h1>Blog 2Column</h1> -->
					<ul>
						<li><a href="{{URL::TO('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>Health Centers</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<form action="" method="GET">
		@csrf
    <div class="row widget-items mb-40">
        <div class="col-md-4">
            
                    <!-- <input type="text" class="src-input-box" placeholder="Search Here" name="s" value="" title="src-input-box"> -->

                    <select class="form-select src-input-box" aria-label="Default select example" id="divisionSelect" name="division">
                        <option selected>Filter By Division</option>
                        @foreach ($divisions as $division)
                 <option value="{{$division->id}}">{{$division->name}}</option>
				        @endforeach
                      </select>
                   
               
        </div>

        <div class="col-md-4">
           
            <select class="form-select src-input-box" aria-label="Default select example" id="subdivisionSelect" name="subdivision">
                {{-- <option selected>Filter By Subdivision</option> --}}
				@foreach ($subdivisions as $sub)
                <option value="{{$sub->id}}">{{$sub->name}}</option>
				@endforeach
              </select>
           
                   
              
        </div>
        <div class="col-md-4 mt-1">
            
                <div class="nav-btn  d-sm-none d-md-none d-lg-inline-block">
                    <button type="submit">Filter</button>
                </div>	
           
        </div>
    </div>
</form>
	<!--==================================================-->
	<!----START BLOG  Section ----->
	<!--===================================================-->
	<div class="blog-section style-7 bg-3 pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-8">
					<div class="row">
						@foreach ( $healthcenters as $health)
						<div class="col-lg-6">
							<div class="blog-single-items">
								<div class="blog-thumb">
									<a href="#">
										<img src="{{asset('frontend/assets/images/blog/bg1.jpg')}}" alt="Blog img">
									</a>
									<div class="blog-meta-top">
										<ul>
											<li><a href="{{route('health.show',$health->id)}}">{{$health->subdivision->division->name}}</a></li>
											<li><a href="{{route('health.show',$health->id)}}">{{$health->subdivision->name}}</a></li>
										</ul>
									</div>
								</div>
								<div class="blog-content">
									<div class="blog-meta">
										<span><a href="{{route('health.show',$health->id)}}">specialty</a></span> - <span>Bone Marrow</span>
									</div>
									<div class="blog-content-text text-center">
										<h5><a href="{{route('health.show',$health->id)}}">
											{{$health->name}}</a></h5>
										{{-- <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache. Incididunt ander  </p> --}}
									</div>
								</div>
							</div>
							
						</div>
						@endforeach
						
						{{-- <div class="col-lg-6">
							<div class="blog-single-items">
								<div class="blog-thumb">
									<a href="#">
										<img src="{{asset('frontend/assets/images/blog/bg3.jpg')}}" alt="Blog img">
									</a>
									<div class="blog-meta-top">
										<ul>
											<li><a href="#">Tips</a></li>
										</ul>
									</div>
								</div>
								<div class="blog-content">
									<div class="blog-meta">
										<span><a href="#">Itsoft</a></span> - <span>January 01, 2023</span> 
									</div>
									<div class="blog-content-text text-center">
										<h5><a href="single-blog.html">The Next Big Challenge for Content Marketer</a></h5>
										<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache. Incididunt ander  </p>
									</div>
								</div>
							</div>
							
						</div> --}}

						<!--Pagination-->

						<div class="pagination pt-30 pb-70 pl-10">
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#"><i class="fas fa-angle-double-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4">
					{{-- <div class="widget-items mb-40">
						<form action="#" method="get" >
							<input type="text" class="src-input-box" placeholder="Search Here" name="s" value="" title="src-input-box">
							<button class="src-icon" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</form>
					</div>
					<div class="widget-items mb-40">
						<div class="widget-title">
							<h2>Categories</h2>
						</div>
						<div class="catagory-item">
							<ul>
								<li class="hr-3"><a href="#">Design</a></li>
								<li class="hr-3"><a href="#">Development</a></li>
								<li class="hr-3"><a href="#">Graphics</a></li>
								<li class="hr-3"><a href="#">Technology</a></li>
								<li class="hr-3"><a href="#">Tips</a></li>
							</ul>
						</div>
					</div>
					<div class="widget-items mb-40">
						<div class="widget-recent-post d-flex">
							<div class="rpost-thumb">
								<a href="#"><img src="{{asset('frontend/assets/images/widget/rp1.jpg')}}" alt="post thumb"></a>
							</div>
							<div class="rpost-content">
								<div class="rpost-title">
									<a href="#"><h4>Project with Your Software</h4>	</a>
									<span>January 01, 2023</span>
								</div>
							</div>
						</div>
						<div class="widget-recent-post d-flex hr-3">
							<div class="rpost-thumb">
								<a href="#"><img src="{{asset('frontend/assets/images/widget/rp2.jpg')}}" alt="post thumb"></a>
							</div>
							<div class="rpost-content">
								<div class="rpost-title">
									<a href="#"><h4>You have a Great Business Idea? </h4>	</a>
									<span>January 01, 2023</span>
								</div>
							</div>
						</div>
						<div class="widget-recent-post d-flex hr-3">
							<div class="rpost-thumb">
								<a href="#"><img src="{{asset('frontend/assets/images/widget/rp3.jpg')}}" alt="post thumb"></a>
							</div>
							<div class="rpost-content">
								<div class="rpost-title">
									<a href="#"><h4>How to Make Website WCAG Compliant? </h4>	</a>
									<span>January 01, 2023</span>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-items mb-40">
						<div class="widget-title">
							<h2>Tag Cloud</h2>
						</div>
						<div class="tag-item">
							<a href="#">Bootstrap</a>
							<a href="#">Business</a>
							<a href="#">Corporate</a>
							<a href="#">Portfolio</a>
							<a href="#">Responsive</a>
							<a href="#">Technology</a>
						</div>
					</div> --}}
					<div class="widget-items mb-40">
						<div class="calender-area">
							<div class="widget-title">
								<h2>Calender</h2>
							</div>
							<div class="tag-item">
								<div class="curr-month"><b>january</b></div>
								<div class="all-days">
									<ul>
										<li>S</li>
										<li>M</li>
										<li>T</li>
										<li>W</li>
										<li>T</li>
										<li>F</li>
										<li>S</li>
									</ul>
								</div>
								<div class="all-date">
									<ul>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-items mb-40">
						<div class="widget-title">
							<h2>Now</h2>
						</div>
						<?php
$currentYear = date('Y');
$currentMonth = date('F');
?>
						<p class="hr-3">{{ $currentMonth }} {{ $currentYear }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function () {
			// Get references to the Division and Subdivision select elements
			const $divisionSelect = $('#divisionSelect');
			const $subdivisionSelect = $('#subdivisionSelect');
	
			// Function to update the Subdivision options based on the selected Division
			function updateSubdivisions() {
				const selectedDivisionId = $divisionSelect.val();
	
				// Clear existing Subdivision options
				$subdivisionSelect.empty();
	
				if (selectedDivisionId) {
					// Filter Subdivisions based on the selected Division
					const subdivisions = @json($subdivisions);
	
					subdivisions.forEach(function (sub) {
						if (sub.division_id == selectedDivisionId) {
							$subdivisionSelect.append($('<option></option>').attr('value', sub.id).text(sub.name));
						}
					});
				} else {
					// If no Division is selected, show the default "Filter By Subdivision" option
					$subdivisionSelect.append($('<option selected></option>').text('Filter By Subdivision'));
				}
			}
	
			// Initialize the Subdivision options on page load
			updateSubdivisions();
	
			// Listen for changes in the Division selection and update Subdivisions
			$divisionSelect.on('change', updateSubdivisions);
		});
	</script>
	
@endsection