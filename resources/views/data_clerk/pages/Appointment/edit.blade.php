@extends('data_clerk.master')
@section('data_clerk')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Assign Appointment Form</h3>
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
			  <h4 class="box-title">Prospective Patient Appointment</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('clerk.appointment.update',$assignAppointment->id)}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Assignment Information</h6>
					<section>
					
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Doctor *:</label>
									<select class="form-select"  name="user_id">
										<option value="">Select Doctor</option>
                                        @foreach ($data_clerks as $doctor)
                                            
                                      
										<option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                        @endforeach
									</select>
                                    @error('user_id')
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
  