
@extends('health_officer.master')
@section('health-officer')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Health Center Registration</h3>
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
			  <h4 class="box-title">Health Center Form</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('officer.store_center')}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Health Center's Information</h6>
					<section>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="firstName5" class="form-label">Name* :</label>
									<input type="text" class="form-control"  name="name">
                                    @error('name')
                             <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
							{{-- <div class="col-md-6">
								<div class="form-group">
									<label for="firstName5" class="form-label">SubDivision(District)* :</label>
									<input type="text" class="form-control"  name="subdivision_id">
                                    @error('subdivision_id')
                              <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div> --}}
                           
							
						</div>
						
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Health Center Type*:</label>
									<select class="form-select"  name="health_center_type_id" >
										<option value="" disabled selected>Select Health Center Type</option>
										
										@foreach($healthcentertypes as $center)
										<option value="{{$center->id}}">{{$center->name}}</option>
										@endforeach
										@error('health_center_type_id')
                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</select>
								</div>
							</div>
							 <div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Subdivision* :</label>
									
									 <select class="form-select"  name="subdivision_id">
										<option value="" disabled selected>Select Subdivision </option>
										@foreach($subdivisions as $d)
                                    <option value="{{ $d->id }}">{{$d->name }}</option>
                                        @endforeach
									</select> 
                                    @error('subdivision_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							
						</div> 


					
						</div>
					</section>
					
					<!-- Step 2 -->
					
			
				
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
  