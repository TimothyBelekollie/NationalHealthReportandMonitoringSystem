@extends('chief_doctor.master')
@section('chief_doctor')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row align-items-end">
             
            
          </div>
          <div class="row">
              <div class="col-12">														
                  <div class="box no-shadow mb-0 bg-transparent">
                      <div class="box-header no-border px-0">
                          <h4 class="box-title text-primary">Your Overall Statistics</h4>	
                          
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-dark rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Equalizer fs-50"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                    </div>
  
                    <div class="py-30 bg-white text-dark">
                      <div class="fs-30">+{{$totalPatients}}</div>
                      <span> Total Pioneer Patients</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Like fs-50 text-info"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-primary">
                      <div class="fs-30">+{{$totalEncounters}}</div>
                      <span>Total Encounters</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Chart-line fs-50 text-success"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-success-light">
                      <div class="fs-30">+{{$totalBirthEvents}}</div>
                      <span>Total Birth</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Chart-line fs-50 text-success"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-secondary-light">
                      <div class="fs-30">-{{$totalDeathEvents}}</div>
                      <span>Total Death</span>
                    </div>
                  </div>
              </div>
              
              
              
          </div>

          <div class="row">
              <div class="col-12">														
                  <div class="box no-shadow mb-0 bg-transparent">
                      <div class="box-header no-border px-0">
                          <h4 class="box-title text-primary">Your Today's Statistics</h4>	
                          
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-dark rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Equalizer fs-50"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                    </div>
  
                    <div class="py-30 bg-white text-dark">
                      <div class="fs-30">+{{$todayTotalPatients}}</div>
                      <span> Total Pioneer Patients</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Like fs-50 text-info"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-primary">
                      <div class="fs-30">+{{$todayTotalEncounters}}</div>
                      <span>Total Encounters</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Chart-line fs-50 text-success"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-success-light">
                      <div class="fs-30">+{{$todayTotalBirthEvents}}</div>
                      <span>Total Birth</span>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-12">
                  <div class="flexbox flex-justified text-center bg-white rounded10 overflow-hidden">
                    <div class="no-shrink py-30">
                      <span class="icon-Chart-line fs-50 text-success"><span class="path1"></span><span class="path2"></span></span>
                    </div>
  
                    <div class="py-30 bg-secondary-light">
                      <div class="fs-30">-{{$todayTotalDeathEvents}}</div>
                      <span>Total Death</span>
                    </div>
                  </div>
              </div>
              
              
              
          </div>
          <div class="row">
              <div class="col-12">														
                  <div class="box no-shadow mb-0 bg-transparent">
                      <div class="box-header no-border px-0">
                          <h4 class="box-title"></h4>	
                          
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 col-12">
                  <div class="box">
                      <div class="box-body">
                          <p class="text-fade text-primary">Birth Report Per Month in {{ date('Y') }}</p>
                          <!-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> -->
                          <canvas id="birthChart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 col-12">
                  <div class="box">
                      <div class="box-body">
                          <p class="text-fade text-primary">Death Report Per Month in {{ date('Y') }}</p>
                          <!-- <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3> -->
                          <canvas id="deathChart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-xl-12 col-12">
                  <div class="box">
                      <div class="box-body">
                          <p class="text-fade text-primary">Birth VS Death Events in {{date('Y')}}</p>
                          {{-- <h3 class="mt-0 mb-20">21 h 30 min <small class="text-danger"><i class="fa fa-arrow-down ms-25 me-5"></i> 15%</small></h3> --}}
                          <canvas id="eventComparisonChart"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
        
      </section>
      <!-- /.content -->
    </div>
</div>




@endsection