@extends('data_clerk.medicalHistory.master')
@section('history')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->	  
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="me-auto">
                  <h3 class="page-title">Medical History</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{URL::TO('/')}}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Home</li>
                              <li class="breadcrumb-item active" aria-current="page">Patient Medical History</li>
                          </ol>
                      </nav>
                  </div>
              </div>

              
              
          </div>
      </div>  

      <!-- Main content -->
      <section class="invoice printableArea">

        {{-- <div class="row">
        
            <div class="col-md-4">
                <form action="{{ route('frontend.patient.show') }}" method="GET">
                  @csrf
                    <div class="form-group">
                        <label for="year">Select Year:</label>
                        <select id="year" name="year">
                           
                            @for ($i = date('Y'); $i >= (date('Y') - 10); $i--)
                            <option value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                            <!-- Add more years as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark" value="Filter">
                    </div>
                </form>
               
            </div>
            

            </div> --}}
        <div class="row">
          <div class="col-12">
            <div class="bb-1 clearFix">
              {{-- <div class="text-end pb-15">
                  <button class="btn btn-success" type="button"> <span><i class="fa fa-print"></i> Save</span> </button>
                  <button id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
              </div>	 --}}
            </div>
          </div>
          <div class="col-12">
            <div class="page-header">
              <h2 class="d-inline"><span class="fs-30">Patient Report</span></h2>
              <div class="pull-right text-end">
                  <h3>{{date('d-M-Y')}}</h3>
              </div>	
            </div>
          </div>

         
          <!-- /.col -->
        </div>
        <div class="row invoice-info">
           
          <div class="col-md-12  text-center">
          
            <address class="text-center">
              <strong class="text-blue fs-24 text-center">National Health Monitoring and Report System</strong><br>
              <strong class="d-inline text-center">Ministry of Health, Republic of Liberia</strong><br>
              <strong class="text-center">Phone:+250783472153 &nbsp;&nbsp;&nbsp;&nbsp; Email: nhmars@gmail.com</strong>  
            </address>
          </div>
          
         
        
        <!-- /.col -->
        </div>
       
       




        
           
        <div class="row">
            <div class="col-md-12">
                <p class="text-fade text-primary">Annual Patient Tabular Summary</p>

            </div>
          <div class="col-12 table-responsive">

            <table class="table table-bordered">
              <tbody>
              <tr>
                {{-- <th>#</th> --}}
                {{-- <th>Month</th>
                <th>Male</th>
                <th class="text-end">Female</th>
                <th class="text-end">Subtotal</th> --}}
                {{-- <th class="text-end">Subtotal</th> --}}


                <tr>
                    <th>Date</th>
                    <th>Health Center</th>
                    <th>Diagnosis Code</th>
                    <th class="text-end">Test Conducted</th>
                    <th class="text-end">Diagnosis Description</th>
                    <th class="text-end">Doctor Prescription</th>
                    <th>Doctor</th>
                </tr>
              </tr>
              @foreach ($patient->encounters as $encounter)
              <tr>
                  <td>{{ $encounter->encounterDate }}</td>
                  <td>{{ $encounter->healthCenter->name }}</td>
                  @foreach ($encounter->encounterDiagnoses as $diagnosis)
                  <td>{{$diagnosis->diagnosisCode}}</td>
                      <td>
                        {{-- {{ $diagnosis->diagnosisCode }} --}}
                        @foreach ($diagnosis->testConducted as $test)
                        {{ $test }}<br>
                        @endforeach
                      </td>
                      <td>
                        {{-- {{ $diagnosis->testConducted }} --}}
                        @foreach($diagnosis->diagnosisDescription as $test)
                        {{ $test }}<br>
                    @endforeach
                      </td>
                      <td>{{ $diagnosis->doctor_prescription }}</td>
                      <td>{{ $diagnosis->user->name }}</td>
                  @endforeach
              </tr>
          @endforeach
              

              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 text-end">
              {{-- <p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p> --}}

              <div>
                  {{-- <p>Male Sub Total :  {{ $totalMale }}</p>
                  <p>Female Sub Total  : {{ $totalFemale }}</p> --}}
                  {{-- <p>Shipping  :  $110.44</p> --}}
              </div>
              {{-- <div class="total-payment">
                  <h3><b>Total Patient :</b> {{$totalPatient}}</h3>
              </div> --}}

          </div>
          <!-- /.col -->
        </div>
        <div class="row no-print">
          <div class="col-12">
            <button type="button" id="printReport" class="btn btn-dark pull-right"><i class="fa fa-print"></i> Print Report
            </button>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
</div>

<script>
  document.getElementById('printReport').addEventListener('click', function () {
      // Get the HTML content of the report element
      const reportContent = document.getElementById('report');
      
      // Open the print dialog for the report content
      window.print();
  });
</script>
@endsection