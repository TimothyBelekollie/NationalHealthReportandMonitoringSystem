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
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>Health Centers</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <form action="{{route('frontend.patient.show')}}" method="GET">
        @csrf
    <div class="row widget-items mb-40">
        <div class="col-md-6">
           <label for="">Enter Your Unique Code</label>
            
                    <input type="password" class="src-input-box" placeholder="Enter Unique Code" name="unicode" value="" title="src-input-box">

        </div>

        <div class="col-md-6">
           <label for="">Date of Birth</label>
            <input type="date" class="src-input-box" placeholder="Enter Unique Code" name="dob" value="" title="src-input-box">

           
                   
              
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
	
	

@endsection