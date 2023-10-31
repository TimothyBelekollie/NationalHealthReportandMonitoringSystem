
@extends('chief_doctor.master')
@section('chief_doctor')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title"> {{Auth::user()->healthCenter->name}} Services Tables</h3>
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
			<div class="row">

				<div class="col-md-12">
					<div class="col-12">
						@if(session()->has('message'))
					   <div class="alert alert-success alert-dismissible">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{{session()->get('message')}}
					  </div>
						@endif
						</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                        <h3 class="box-title">All Services</h3>
                       </div>
                       <div class="col-md-4 ms-auto">
                        <a href="{{route('service.add')}}" class="btn btn-primary">Add Service</a>
                       </div>
                    </div>
				
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($allServices as $key=> $service)
								
						
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$service->name}}</td>
								
								<td>{{ \Carbon\Carbon::parse($service->created_at)->diffForHumans()}}</td>
								<td><a href="{{route('service.edit', $service->id)}}">Edit</a><a href="{{route('service.destroy',$service->id)}}">Delete</a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name </th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div> 

		

		
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
    </div>
  
      @endsection
 