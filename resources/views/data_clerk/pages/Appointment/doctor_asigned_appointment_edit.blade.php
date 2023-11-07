@extends('data_clerk.master')
@section('data_clerk')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Appointment Approve Form</h3>
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
			  <h4 class="box-title">Appointment Approve </h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('clerk.doc.appointment.update',$assignAppointment->id)}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Assignment Information</h6>
					<section>
					
						<div class="row">
							<div class="col-md-6">
								
                                    <div class="form-group">
                                        <label  class="form-label">Appointment Status*:</label>
                                        <select class="form-select"  name="status" >
                                            <option value="" selected>Select Status</option>
                                            <option value="Confirmed">Confirmed</option>
                                            {{-- <option value="Pending">Pending</option>
                                            <option value="Cancel">Cancel</option> --}}
                                            
                                            @error('health_center_id')
                                 <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                
                             
							
                            <div class="col-md-6">
								
                                    <div class="form-group">
                                        <label for="firstName5" class="form-label">Proposed Date* :</label>
                                        <input type="datetime-local" class="form-control"  name="confirm_date" value="{{$assignAppointment->confirm_date}}">
                                        @error('confirm_date')
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
                            <input type="submit" class="btn btn-primary" value="Confirm">
                               
                             
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
  