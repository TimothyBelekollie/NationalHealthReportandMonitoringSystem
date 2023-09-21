@extends('data_clerk.master')
@section('data_clerk')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Patient Birth Form</h3>
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
			  <h4 class="box-title">Patient Birth Registration</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('clerk.pat.birth.store')}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Patient's Birth Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5" class="form-label">Event Date* :</label>
									<input type="datetime-local" class="form-control" name="event_date" value="{{ date('Y-m-d\TH:i', strtotime($editData->event_date)) }}">


                                    @error('name')
                             <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

							   
                            <div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Patient Name* :</label>
									
									 <select class="form-select"  name="patient_id">
										<option value="" selected>Select Patient </option>
										@foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{$editData->patient_id==$patient->id?'selected':''}}>{{ $patient->name }} - {{$patient->unique_patient_identifier}}</option>
                                        @endforeach
									</select> 
                                    @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							
						</div>
                           
							
						</div>
						
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Baby Gender*:</label>
									<select class="form-select"  name="baby_gender">
										<option value="">Select Gender</option>
										<option value="Male"{{$editData->baby_gender==="Male"?'selected':''}}>Male</option>
										<option value="Female"{{$editData->baby_gender==="Female"?'selected':''}}>Female</option>
									</select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Baby Type*:</label>
									<select class="form-select"  name="baby_type">
										<option value="">Select Baby Type</option>
										<option value="Singleton"{{$editData->baby_type=='Singleton'?'selected':''}}>Singleton(1)</option>
										<option value="Twins"{{$editData->baby_type=='Twins'?'selected':''}}>Twins(2)</option>
										<option value="Triplets"{{$editData->baby_type=='Triplets'?'selected':''}}>Triplets(3)</option>
										<option value="Quadruplets"{{$editData->baby_type=='Quadruplets'?'selected':''}}>Quadruplets(4)</option>
										<option value="Quintuplets"{{$editData->baby_type=='Quintuplets'?'selected':''}}>Quintuplets(5)</option>
										<option value="Sextuplets"{{$editData->baby_type=='Sextuplets'?'selected':''}}>Sextuplets(6)</option>
										<option value="Septuplets"{{$editData->baby_type=='Septuplets'?'selected':''}}>Septuplets(7)</option>
										<option value="Octuplets" {{$editData->baby_type=='Octuplets'?'selected':''}}>Octuplets(8)</option>
										
									</select>
                                    @error('gender')
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
  