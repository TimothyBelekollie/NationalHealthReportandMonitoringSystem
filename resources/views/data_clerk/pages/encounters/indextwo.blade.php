@extends('data_clerk.master')
@section('data_clerk')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Patient's Encounter Table</h3>
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
                        <h3 class="box-title">All Patient Encounter Records</h3>
                       </div>
                       {{-- <div class="col-md-4 ms-auto">
                        <a href="{{route('clerk.pat.encounter.add')}}" class="btn btn-primary">Add Patient Encounter</a>
                       </div> --}}
                    </div>
				
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Patient Name</th>
								<th>Encounter Center</th>
								<th>Assigned Doctor</th>
								<th>Diagnosis Code</th>
								<th>Test Conducted</th>
								<th>Test Result</th>
								<th>Prescribe Treatment</th>

								
								
								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($allPatients as $key=> $data)
								
						
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$data->patient->name}}</td>
								<td>{{$data->healthCenter->name}}</td>
								<td>{{$data->doctor->name}}</td>
								<td>{{ $data->encounterDiagno->diagnosisCode ?? 'N/A' }}</td>
								<td>
                                    @if($data->encounterDiagno && $data->encounterDiagno->testConducted)
                                        @foreach ($data->encounterDiagno->testConducted as $value)
                                            {{ $value }}<br>
                                        @endforeach 
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($data->encounterDiagno && $data->encounterDiagno->diagnosisDescription)
                                        @foreach ($data->encounterDiagno->diagnosisDescription as $value)
                                            {{ $value ?? "N/A" }}<br>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </td>
								<td>{{$data->encounterDiagno->doctor_prescription?? "N/A"}}</td>
								
								<td><a href="{{route('clerk.pat.encounter.edit',$data->id)}}" class="btn btn-primary">Edit/Access</a><a href="{{route('clerk.pat.encounter.destroy',$data->id)}}" class="btn btn-danger">Delete</a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>No.</th>
								<th>Patient Name</th>
								<th>Encounter Center</th>
								<th>Assigned Doctor</th>
								<th>Diagnosis Code</th>
								<th>Test Conducted</th>
								<th>Test Positive</th>
								<th>Prescribe Treatment</th>
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
 