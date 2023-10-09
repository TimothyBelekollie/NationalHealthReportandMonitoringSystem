@extends('ministry_of_health.master')
@section('minister')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Division Registration</h3>
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
			  <h4 class="box-title">Division Form</h4>
				
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="{{route('minister.store_division')}}" class="tab-wizard wizard-circle" method="POST">
                    @csrf
					<!-- Step 1 -->
					<h6>Sub Division's Information</h6>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5" class="form-label">Name* :</label>
									<input type="text" class="form-control"  name="name">
                                    @error('name')
                             <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>

						</div>
						
{{-- 						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label  class="form-label">Division* :</label>
									
									 <select class="form-select"  name="division_id">
										<option value="" disabled selected>Select Division </option>									
										@foreach ($divisionsData as $data)	
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
									</select> 
                                    @error('division_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
								</div>
							
						</div> 	
						</div> --}}
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
  