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
			@if(session()->has('message'))
		   <div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

			<h4><i class="icon fa fa-check"></i> Alert!</h4>
			{{session()->get('message')}}
		  </div>
			@endif
			</div>
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
					  <img class="avatar avatar-xxl rounded-circle bg-warning-light" src="{{asset('Upload/data_clerk/'.Auth::user()->image)}}" alt="">
					</a>
					<h5 class="mt-2 mb-0"><a class="text-white" href="#">{{Auth::user()->name}}</a></h5>
					<span>{{Auth::user()->role->name}}</span>
				  </div>
				  <ul class="flexbox flex-justified text-center p-20">
					<li>
					  <span class="text-muted">Assigned Hospital</span><br>
					  <span class="fs-16">{{Auth::user()->healthCenter->name}}</span>
					</li>
					<li class="be-1 bs-1 border-light">
					  <span class="text-muted">County</span><br>
					  <span class="fs-16">{{Auth::user()->healthCenter->subdivision->division->name}}</span>
					</li>
					<li>
						<span class="text-muted">Contact</span><br>
						<span class="fs-20">{{Auth::user()->contact}}</span>
					</li>
					<li>
						<span class="fs-20">
							<a href="{{route('clerk.profile.edit')}}" class=" btn btn-primary">Update Profile</a></span>
					  </li>
				  </ul>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h2>About Me</h2>
					</div>
					<div class="col-md-12">
						<p>{{Auth::user()->about}}</p>
					</div>

				</div>
			  </div> 
			  
		  </div>
		 	
		 
		</section>
		<!-- /.content -->	  
	  </div>
  </div>
 
@endsection