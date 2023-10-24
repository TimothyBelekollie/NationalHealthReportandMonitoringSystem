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
                              <li class="breadcrumb-item active" aria-current="page">Death Report</li>
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
                <form action="{{ route('officer.detail_death') }}" method="GET">
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
              <h2 class="d-inline"><span class="fs-30">Death Report</span></h2>
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
                    <p class="text-fade text-primary text-center">Death Events Per Month</p>
                    <div class="chart-container" >
                    <canvas id="deathEventsChart"></canvas>
                </div>
                </div>
   
                <div class="col-md-6 text-center">
                    <p class="text-fade text-primary text-center">Death Gender Annual Ratio </p>

                    <div class="chart-container">

                    <canvas id="genderDeathEventsChart"></canvas>

                </div>
               </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="text-fade text-primary">Annual Death Tabular Summary</p>

            </div>
          <div class="col-12 table-responsive">

            <table class="table table-bordered">
              <tbody>
              <tr>
                {{-- <th>#</th> --}}
                <th>Month</th>
                <th>Male</th>
                <th class="text-end">Female</th>
                <th class="text-end">Subtotal</th>
               
              </tr>
              @for ($month = 1; $month <= 12; $month++)
                <tr>
                    <td>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</td>
                    <td>{{ $tabmaleDeathEventCounts[$month - 1] }}</td>
                    <td>{{ $tabfemaleDeathEventCounts[$month - 1] }}</td>
                    <td>{{ $tabmaleDeathEventCounts[$month - 1] + $tabfemaleDeathEventCounts[$month - 1] }}</td>
                </tr>
            @endfor
              <tr>
              

              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-12 text-end">
              {{-- <p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p> --}}

               <div>
                  <p>Male Sub Total :  {{ $tabmaleTotal }}</p>
                  <p>Female Sub Total  : {{ $tabfemaleTotal }}</p>
                  
              </div>
              <div class="total-payment">
                  <h3><b>Total :</b> {{ $taboverallTotal }}</h3>
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

 {{-- Death Events Per Month  --}}
<script>
    var ctx = document.getElementById('deathEventsChart').getContext('2d');
    var birthEventsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Death Events per Month',
                data: @json($deathEventCounts),
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Blue fill color
                borderColor: 'rgba(54, 162, 235, 1)', // Blue border color
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>

{{-- Birth Event Per Division per Gender --}}



{{-- <canvas id="genderDeathEventsChart"></canvas> --}}
<script>
    var ctx = document.getElementById('genderDeathEventsChart').getContext('2d');
    var genderDeathEventsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: 'Male Death Events',
                    data: @json($maleDeathEventCounts),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Blue fill color
                    borderColor: 'rgba(54, 162, 235, 1)', // Blue border color
                    borderWidth: 1,
                },
                {
                    label: 'Female Death Events',
                    data: @json($femaleDeathEventCounts),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Red fill color
                    borderColor: 'rgba(255, 99, 132, 1)', // Red border color
                    borderWidth: 1,
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>





@endsection