@extends('health_officer.master')
@section('health-officer')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->	  
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="me-auto">
                  <h3 class="page-title">Report</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">dashbaord</li>
                              <li class="breadcrumb-item active" aria-current="page">Patient Report</li>
                          </ol>
                      </nav>
                  </div>
              </div>

              
              
          </div>
      </div>  

      <!-- Main content -->
      <section class="invoice printableArea">

        <div class="row">
        
            <div class="col-md-4">
                <form action="{{ route('officer.detail_patient') }}" method="GET">
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
            

            </div>
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
              <strong class="text-blue fs-24 text-center">{{Auth::user()->division->name}}</strong><br>
              <strong class="d-inline text-center">Republic of Liberia</strong><br>
              <strong class="text-center">Phone:+250783472153 &nbsp;&nbsp;&nbsp;&nbsp; Email: timothy2@gmail.com</strong>  
            </address>
          </div>
          
         
        
        <!-- /.col -->
        </div>
       
        <div class="row">
                <div class="col-md-6 text-center">
                    <p class="text-fade text-primary text-center">Patient Encounters Count Per Subdivision</p>
                    <div class="chart-container" >
                    <canvas id="patientChart"></canvas>
                </div>
                </div>
    <div class="col-md-2"></div>
                <div class="col-md-4 text-center">
                    <p class="text-fade text-primary text-center">Patient Gender Annual Ratio </p>

                    <div class="chart-container" style="height: 200px;">

                    <canvas id="divisionEncounterRatioChart"></canvas>
                </div>
               </div>
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
                <th>Month</th>
                <th>Subdivision</th>
                <th>Male</th>
                <th class="text-end">Female</th>
                <th class="text-end">Subtotal</th>
                {{-- <th class="text-end">Subtotal</th> --}}
              </tr>
              @foreach ($tableData as $rowData)
              @foreach ($rowData as $row)
                  <tr>
                      <td>{{ $row['month'] }}</td>
                      <td>{{ $row['subdivision'] }}</td>
                      <td>{{ $row['male'] }}</td>
                      <td>{{ $row['female'] }}</td>
                      <td>{{ $row['subtotal'] }}</td>
                  </tr>
              @endforeach
          @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 text-end">
           

              <div>
                  <p>Male Sub Total :  {{ $maleSubtotal }}</p>
                  <p>Female Sub Total  : {{ $femaleSubtotal }}</p>
                 
              </div>
              <div class="total-payment">
                  <h3><b>Total Patient Encounters :</b> {{ $overallTotal }}</h3>
              </div>

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





{{-- <canvas id="encounterChart" width="400" height="200"></canvas> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var labels = @json($labels);
  var data = @json($data);

  $(document).ready(function () {
      var ctx = document.getElementById('patientChart').getContext('2d');
      new Chart(ctx, {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Patients Count',
                  data: data,
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  });
</script>



<script>
  var maleCount = @json($piemaleCount);
  var femaleCount = @json($piefemaleCount);

  $(document).ready(function () {
      var ctx = document.getElementById('divisionEncounterRatioChart').getContext('2d');
      new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ['Male', 'Female'],
              datasets: [{
                  data: [maleCount, femaleCount],
                  backgroundColor: ['#3498db', '#e74c3c']
              }]
          },
          options: {
              responsive: true,
              tooltips: {
                  callbacks: {
                      label: function (tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                              return previousValue + currentValue;
                          });
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                          return percentage + "%";
                      }
                  }
              }
          }
      });
  });
</script>



@endsection