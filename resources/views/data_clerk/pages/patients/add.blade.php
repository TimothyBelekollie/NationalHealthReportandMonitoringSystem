@extends('data_clerk.master')
@section('data_clerk')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Patient Form</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Home</li>
								
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Step wizard -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Patient Registration</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('clerk.patient.store')}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Patient's Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5" class="form-label">Full Name* :</label>
									<input type="text" class="form-control"  name="name">
                                    @error('name')
                             <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Health Center*:</label>
									<select class="form-select"  name="health_center_id" >
										<option value="">Select Health Center</option>
										<option value="{{Auth::user()->healthCenter->id}}" selected>{{Auth::user()->healthCenter->name}}</option>
										
										@error('health_center_id')
                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</select>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Email Address(Optional) :</label>
									<input type="email" class="form-control"  name="email"> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Nationality* :</label>
									<select class="form-select"  name="nationality">
										<option value="">Select Country </option>
										<option value="Liberia">Liberia</option>
										<option value="United States of America">United States of America</option>
										<option value="Sierra Leone">Sierra Leone</option>
									</select>
                                    @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Patient Contact*:</label>
									<input type="text" class="form-control"  name="contact"> 
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Emmergency Contact*:</label>
									<input type="text" class="form-control"  name="emmergency_contact"> 
                                    @error('emmergency_contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Select Gender*:</label>
									<select class="form-select"  name="gender">
										<option value="">Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										
									</select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="date1" class="form-label">Date of Birth*:</label>
									<input type="date" class="form-control"  name="dob"> 
                                    @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
						</div>
					</section>
					
					<!-- Step 2 -->
					<h6>Address</h6>
					<section>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label  class="form-label">City*:</label>
									<select class="form-select"  name="city">
										<option value="">Select City</option>
										<option value="India">Gbarnga</option>
										<option value="USA">Monrovia</option>
										<option value="Dubai">Kakata</option>
									</select>
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									<label  class="form-label">Sub Division*:</label>
									<select class="form-select" name="subdivision_id">
										<option value="">Select City</option>
                                        @foreach ( $subdivisions as $subdivision)
										<option value="{{$subdivision->id}}">{{$subdivision->name}}</option>
                                        @endforeach
									</select>
                                    @error('subdivision_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									<label  class="form-label">Community*:</label>
									<input type="text" class="form-control"  name="community"> 
                                    @error('community')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
						
						</div>
					</section>
				
                    <section>
						<div class="row">
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="submit">
                               
                             
                            </div>
						</div>
					</section>
				</form>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		  <!-- vertical wizard -->
		
		  <!-- /.box -->



		</section>
		<!-- /.content -->
	  </div>
  </div>

  @endsection
  