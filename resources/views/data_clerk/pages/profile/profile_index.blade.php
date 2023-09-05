@extends('data_clerk.master')
@section('data_clerk')
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Data Clerk Profile</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{URL::TO("redirects-dashboard")}}"><i class="mdi mdi-home-outline"></i></li>
								<li class="breadcrumb-item" aria-current="page">Back </a></li>
								
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  <div class="col-12">
			  	<div class="box">
					<div class="box-header no-border">
						<h4 class="box-title">Clerk Info</h4>
					</div>
				</div>
			  </div>
			 
			  <div class="col-lg-8 col-12">
				<div class="box">
				  <div class="text-white box-body bg-img text-center py-50" style="background-image: url(../images/gallery/creative/img-12.jpg);" data-overlay="5">
					<a href="#">
					  <img class="avatar avatar-xxl rounded-circle bg-warning-light" src="../images/avatar/avatar-16.png" alt="">
					</a>
					<h5 class="mt-2 mb-0"><a class="text-white" href="#">{{Auth::user()->name}}</a></h5>
					<span>{{Auth::user()->role->name}}</span>
				  </div>
				  <ul class="flexbox flex-justified text-center p-20">
					<li>
					  <span class="text-muted">Assigned Hospital</span><br>
					  <span class="fs-20">6.6K</span>
					</li>
					<li class="be-1 bs-1 border-light">
					  <span class="text-muted">County</span><br>
					  <span class="fs-20">5148</span>
					</li>
					<li>
						<span class="text-muted">Contacts</span><br>
						<span class="fs-20">5148</span>
					</li>
					<li>
						<span class="fs-20">
							<a href="{{route('clerk.profile.edit')}}" class=" btn btn-primary">Update Profile</a></span>
					  </li>
				  </ul>
				</div>
			  </div> 
			  
		  </div>
		 	
		 
		</section>
		<!-- /.content -->	  
	  </div>
  </div>
 
@endsection