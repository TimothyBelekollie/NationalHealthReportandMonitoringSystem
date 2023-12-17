
@extends('ministry_of_health.master')
@section('minister')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title"> Health Officer Tables</h3>
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
                        <h3 class="box-title">All Health Officer Records</h3>
                       </div>
                       <div class="col-md-4 ms-auto">
                        <a href="{{route('minister.add_officer')}}" class="btn btn-primary">Add Health Officer</a>
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
								<th>Email</th>
								<th>Division(County)</th>
								
								<th>Role</th>
								<th>Date Added</th>
					
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($usersWithRole as $key=> $user)
								
						
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$user->name}}</td>
								
								<td>{{$user->email}}</td>
								<td>{{$user->division->name}}</td>
								
								<td>{{$user->role->name}}</td>
								
								<td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
								<td><a href="{{route('minister.edit_officer', $user->id)}}" class="btn btn-primary">Edit/Reasign</a>  <a href="{{route('minister.destroy_officer',$user->id)}}" class="btn btn-danger">Delete</a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name </th>
								<th>Email </th>
								<th>Division(County)</th>
								
								<th>Role</th>
								<th>Date Added</th>
								
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
 