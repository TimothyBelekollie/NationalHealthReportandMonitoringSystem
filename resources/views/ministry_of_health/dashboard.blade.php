@extends('ministry_of_health.master')
@section('minister')

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row align-items-end">
				<div class="col-xl-9 col-12">
					<div class="box bg-primary-light pull-up">
						<div class="box-body p-xl-0">							
							<div class="row align-items-center">
								<div class="col-12 col-lg-3"><img src="{{asset('images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
								<div class="col-12 col-lg-9">
									<h2>Hello {{Auth::user()->name}}, Welcome Back!</h2>
									<p class="text-dark mb-0 fs-16">
										
                                        This is the National Health Ministry Dashboard. 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12">
					<div class="box bg-transparent no-shadow">
						<div class="box-body p-xl-0 text-center">							
							<h3 class="px-30 mb-20">Have new <br> Health Officer?</h3>
							<a href="{{route('minister.add_officer')}}" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Register here</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Today's Encounter Statistics</h4>	
							
						</div>
					</div>
				</div>
				@foreach ($divisions as $division)
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" >
						<div class="box-body">	
							<div class="flex-grow-1">	
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">									
										<span class="badge badge-primary me-15"> {{ $division->name }}</span>
										{{-- <span class="badge badge-primary me-5"><i class="fa fa-lock"></i></span>
										<span class="badge badge-primary"><i class="fa fa-clock-o"></i></span> --}}
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>						
								</div>
								<h4 class="mt-25 mb-5">Over all Total</h4>
								<p class="text-fade mb-0 fs-12">

									{{ $division->totalEncounters }}
								</p>
							</div>	
						</div>					
					</div>
				</div>
				@endforeach
				
			</div>

			<div class="row">
				<div class="col-12">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Today's Birth Statistics</h4>	
							
						</div>
					</div>
				</div>
				@foreach ($birthdivisions as $division)
					
				
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" >
						<div class="box-body">	
							<div class="flex-grow-1">	
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">									
										<span class="badge badge-success me-15">{{$division->name}}</span>
										
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>						
								</div>
								<h4 class="mt-25 mb-5">Over all Total</h4>
								<p class="text-fade mb-0 fs-12">{{ $division->totalBirthEvents }}</p>
							</div>	
						</div>					
					</div>
				</div>

				@endforeach
				

				
			</div>

			<div class="row">
				<div class="col-12">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Today's Death Statistics</h4>	
							
						</div>
					</div>
				</div>
				@foreach ($deathdivisions as $division)
					
				
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" >
						<div class="box-body">	
							<div class="flex-grow-1">	
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">									
										<span class="badge badge-dark me-15">{{$division->name}}</span>
										{{-- <span class="badge badge-primary me-5"><i class="fa fa-lock"></i></span>
										<span class="badge badge-primary"><i class="fa fa-clock-o"></i></span> --}}
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>						
								</div>
								<h4 class="mt-25 mb-5">Over all Total</h4>
								<p class="text-fade mb-0 fs-12">{{$division->totalDeathEvents}}</p>
							</div>	
						</div>					
					</div>
				</div>

				@endforeach
				

				
			</div>
			
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->


@endsection
 
  