@extends('health_officer.master')
@section('health-officer')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row align-items-end">
              <div class="col-xl-9 col-12">
                  <div class="box bg-primary-light pull-up">
                      <div class="box-body p-xl-0">							
                          <div class="row align-items-center">
                              <div class="col-12 col-lg-3"><img src="../images/svg-icon/color-svg/custom-14.svg" alt=""></div>
                              <div class="col-12 col-lg-9">
                                  <h3>Hello {{Auth::user()->name}}, Welcome To The <span class="bg-dark">{{Auth::user()->division->name}}</span> Health Officer Dashboard</h3>
                                  {{-- <p class="text-dark mb-0 fs-16">
                                     I know data can be overwhelming but take it easy, in know time you will get the insight you desire. 
                                  </p> --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="box bg-transparent no-shadow">
                      <div class="box-body p-xl-0 text-center">							
                          <h3 class="px-30 mb-20">Have New<br>Doctor to register?</h3>
                          <button type="button" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Register New Doctor</button>
                      </div>
                  </div>
              </div>
          </div>
          
{{--***************************************General Statistics******************************* --}}
          <div class="row">
              <div class="col-12">														
                  <div class="box no-shadow mb-0 bg-transparent">
                      <div class="box-header no-border px-0">
                          <h4 class="box-title">General Statistics</h4>	
                         
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 col-12">
                  <div class="box bg-secondary-light pull-up">
                      <div class="box-body">	
                          <div class="flex-grow-1">	
                              <div class="d-flex align-items-center pe-2 justify-content-between">
                                  <div class="d-flex">									
                                      <span class="badge badge-primary me-15">Total Health Centers</span>
                                   
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
                              <h4 class="mt-25 mb-5">{{$healthCentersCount}}</h4>
                             
                          </div>	
                      </div>					
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 col-12">
                  <div class="box bg-secondary-light pull-up">
                      <div class="box-body">	
                          <div class="flex-grow-1">	
                              <div class="d-flex align-items-center pe-2 justify-content-between">
                                  <div class="d-flex">									
                                      <span class="badge badge-primary me-15">Total Encounter</span>
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
                              <h4 class="mt-25 mb-5">{{$patientEncounters}}</h4>
                              {{-- <p class="text-fade mb-0 fs-12">1 Days Left</p> --}}
                          </div>	
                      </div>					
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 col-12">
                  <div class="box bg-secondary-light pull-up">
                      <div class="box-body">	
                          <div class="flex-grow-1">	
                              <div class="d-flex align-items-center pe-2 justify-content-between">
                                  <div class="d-flex">									
                                      <span class="badge badge-success me-15">Total Birth</span>
                                      {{-- <span class="badge badge-primary me-5"><i class="fa fa-lock"></i></span> --}}
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
                              <h4 class="mt-25 mb-5">{{$birthEvents->count()}}</h4>
                              {{-- <p class="text-fade mb-0 fs-12">15 days Left</p> --}}
                          </div>	
                      </div>					
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 col-12">
                  <div class="box bg-secondary-light pull-up">
                      <div class="box-body">	
                          <div class="flex-grow-1">	
                              <div class="d-flex align-items-center pe-2 justify-content-between">
                                  <div class="d-flex">									
                                      <span class="badge badge-dark me-15">Total Death</span>
                                      
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
                              <h4 class="mt-25 mb-5">{{$deathEvents->count()}}</h4>
                             
                          </div>	
                      </div>					
                  </div>
              </div>
          </div>





{{--***************************************Today Statistics******************************* --}}
<div class="row">
    <div class="col-12">														
        <div class="box no-shadow mb-0 bg-transparent">
            <div class="box-header no-border px-0">
                <h4 class="box-title">Today's Statistics</h4>	
               
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="box bg-secondary-light pull-up">
            <div class="box-body">	
                <div class="flex-grow-1">	
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                        <div class="d-flex">									
                            <span class="badge badge-primary me-15">Total Health Centers</span>
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
                    <h4 class="mt-25 mb-5">{{$todayhealthCentersCount}}</h4>
                   
                </div>	
            </div>					
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="box bg-secondary-light pull-up">
            <div class="box-body">	
                <div class="flex-grow-1">	
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                        <div class="d-flex">									
                            <span class="badge badge-primary me-15">Total Encounter</span>
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
                    <h4 class="mt-25 mb-5">{{$todaypatientEncounters}}</h4>
                    {{-- <p class="text-fade mb-0 fs-12">1 Days Left</p> --}}
                </div>	
            </div>					
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="box bg-secondary-light pull-up">
            <div class="box-body">	
                <div class="flex-grow-1">	
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                        <div class="d-flex">									
                            <span class="badge badge-success me-15">Total Birth</span>
                            {{-- <span class="badge badge-primary me-5"><i class="fa fa-lock"></i></span> --}}
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
                    <h4 class="mt-25 mb-5">{{$todaybirthEvents}}</h4>
                    {{-- <p class="text-fade mb-0 fs-12">15 days Left</p> --}}
                </div>	
            </div>					
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
        <div class="box bg-secondary-light pull-up">
            <div class="box-body">	
                <div class="flex-grow-1">	
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                        <div class="d-flex">									
                            <span class="badge badge-dark me-15">Total Death</span>
                            
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
                    <h4 class="mt-25 mb-5">{{$todaydeathEvents}}</h4>
                   
                </div>	
            </div>					
        </div>
    </div>
</div>

          <div class="row">
            <div class="col-12">														
                <div class="box no-shadow mb-0 bg-transparent">
                    <div class="box-header no-border px-0">
                        <h4 class="box-title">General Charts/Graphs</h4>	
                       
                    </div>
                </div>
            </div>
              <div class="col-xl-4 col-12">
                  <div class="box">
                      <div class="box-body">
                          <h3 class="text-fade">Patient Encounters Per Month</h3>
                          {{-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> --}}
                          
                          <canvas id="encountersChart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-12">
                <div class="box">
                    <div class="box-body">
                        <h3 class="text-fade">Birth Events Per Month</h3>
                        {{-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> --}}
                        
                        <canvas id="birthEventsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box">
                    <div class="box-body">
                        <h3 class="text-fade">Death Events Per Month</h3>
                        {{-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> --}}
                        
                        <canvas id="deathEventsChart"></canvas>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">														
                  <div class="box no-shadow mb-0 bg-transparent">
                      <div class="box-header no-border px-0">
                          <h4 class="box-title">Performance & Statistics</h4>	
                          <ul class="box-controls pull-right d-md-flex d-none">
                            <li>
                              <button class="btn btn-primary-light px-10">View All</button>
                            </li>
                            <li class="dropdown">
                              <button class="dropdown-toggle btn btn-primary-light px-10" data-bs-toggle="dropdown" href="#" aria-expanded="false">All Type</button>										  
                              <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item active" href="#">Today</a>
                                <a class="dropdown-item" href="#">Yesterday</a>
                                <a class="dropdown-item" href="#">Last week</a>
                                <a class="dropdown-item" href="#">Last month</a>
                              </div>
                            </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="row">
                    <div class="col-xl-6 col-12">
                        <div class="box">
                            <div class="box-body">
                                <h3 class="text-fade">Health Center Per Subdivision</h3>
                                {{-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> --}}
                                
                                <canvas id="healthCentersChart"></canvas>
                            </div>
                        </div>
                    </div>  

                    <div class="col-xl-6 col-12">
                        <div class="box">
                            <div class="box-body">
                                <h3 class="text-fade">Encounter Per Subdivision</h3>
                                {{-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> --}}
                                
                                <canvas id="encountersPerMonthPerSubdivChart"></canvas>
                            </div>
                        </div>
                    </div>  
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>



 {{-- Patient Encouter Per Month Per Year --}}
<script>
    console.log(@json(array_values($encounterCounts)));
    var ctx = document.getElementById('encountersChart').getContext('2d');
    var encountersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Patient Encounters Per Month',
                data: @json(array_values($encounterCounts)), // Convert PHP array to JSON
                backgroundColor: 'rgba(75, 192, 192,)',
                borderColor: 'rgba(75, 192, 192, 1)',
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


 {{-- Patient Birth Event Per Month Per Year --}}

<script>
    
    var ctx = document.getElementById('birthEventsChart').getContext('2d');
    var encountersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Patient Birth Events Per Month',
                data: @json(array_values($birthEventsCounts)), // Convert PHP array to JSON
                backgroundColor: 'rgba(54, 162, 235,)', // Blue fill color
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


 {{-- Patient Death Event Per Month Per Year --}}


 <script>
    
    var ctx = document.getElementById('deathEventsChart').getContext('2d');
    var encountersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Patient Encounters Per Month',
                data: @json(array_values($deathEventsCounts)), // Convert PHP array to JSON
                backgroundColor: 'rgba(255, 99, 132,)', // Change the bar fill color
                borderColor: 'rgba(255, 99, 132, 1)', // Change the bar border color
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



{{-- 
   Health Center Per Subdivsion --}}
<script>
    var ctx = document.getElementById('healthCentersChart').getContext('2d');
    var healthCentersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json(array_keys($healthCenterCounts)), // Subdivision names
            datasets: [{
                label: 'Health Centers per Subdivision',
                data: @json(array_values($healthCenterCounts)), // Health center counts
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




{{--  
        Patient Encounters Per Subdivsion     --}}




      
        <script>
            var ctx = document.getElementById('encountersPerMonthPerSubdivChart').getContext('2d');
            var encountersChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [
                        @foreach($encounterCountsBySubdivision as $subdivisionName => $counts)
                        {
                            label: 'Encounters - {{ $subdivisionName }}',
                            data: @json(array_values($counts)),
                            backgroundColor: 'rgba({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}, 0.2)',
                            borderColor: 'rgba({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }}, 1)',
                            borderWidth: 1,
                        },
                        @endforeach
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
        </html>
        



@endsection
