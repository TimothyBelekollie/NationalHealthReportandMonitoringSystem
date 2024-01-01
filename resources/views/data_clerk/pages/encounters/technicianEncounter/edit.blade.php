@extends('data_clerk.master')
@section('data_clerk')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Patient Encounter Form</h3>
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
			  <h4 class="box-title">Update Patient Encounter Record</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('clerk.pat.encounter.update', $encounter->id)}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Patient's Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5" class="form-label">Encounter Date* :</label>
									<input type="date" class="form-control"  name="encounterDate" value="{{ date('Y-m-d', strtotime($encounter->encounterDate)) }}">
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
							
							<div class="col-md-12">
								<div class="form-group">
									<label  class="form-label">Patient Name* :</label>
									
									 <select class="form-select"  name="patient_id" disabled>
										<option value="" selected>Select Patient </option>
										@foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{$encounter->patient_id==$patient->id ? 'selected':''}} >{{ $patient->name }} - {{$patient->unique_patient_identifier}}</option>
                                        @endforeach
									</select> 
                                    @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							
						</div>
						{{-- <div class="col-md-6">
							<div class="form-group">
								<label  class="form-label">Diagnosis Code* :</label>
								
								<input type="text" class="form-control"  name="diagnosisCode" value="{{$encounter->encounterDiagno->diagnosisCode}}">

								@error('nationality')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						
					</div> --}}

						
					</div>
						
						
					</section>
					
				
					<section>
						<div class="row">
							<div class=" col-md-6">
								<div class="form-group">
									<label for="example-text-input" class="">Test to Conduct<span class="text-danger">*</span></label>
	
									<div class="tags-default">
										
											@if($encounter->encounterDiagno && $encounter->encounterDiagno->testConducted)
												@foreach ($encounter->encounterDiagno->testConducted as $data)
													<input type="text" name="testConducted" value="{{ $data ?? 'N/A' }}" data-role="tagsinput" placeholder="Add Test" disabled/>
												@endforeach
											@else
												<input type="text" name="testConducted" value="N/A" data-role="tagsinput" placeholder="Add Test" disabled/>
											@endif
										
								</div>
	
							  </div>
							</div>

							  <div class=" col-md-6">
								<div class="form-group">
									<label for="example-text-input" class="">Test Result<span class="text-danger">*</span></label>
	
									<div class="tags-default">
                                        @if($encounter->encounterDiagno && $encounter->encounterDiagno->diagnosisDescription)
								@foreach ($encounter->encounterDiagno->diagnosisDescription as $data)
									<input type="text" name="diagnosisDescription" value="{{ $data ?? 'N/A' }}" data-role="tagsinput" placeholder="Add Diagnosis"  />
								@endforeach
							@else
								<input type="text" name="diagnosisDescription" value="N/A" data-role="tagsinput" placeholder="Add Diagnosis" />
							@endif
									</div>
	
							  </div>
							</div>
							  <div class=" col-md-12">
								<div class="form-group">
									<label for="example-text-input" class="" style="display: none;">Doctor's Prescription<span class="text-danger">*</span></label>
	
									<textarea rows="5" class="form-control" placeholder="Prescibe medication for your patient" name="doctor_prescription" style="display:none">{!!$encounter->encounterDiagno->doctor_prescription??"N/A"!!}</textarea>
	
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
  