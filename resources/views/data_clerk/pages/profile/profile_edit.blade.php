@extends('data_clerk.master')
@section('data_clerk')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="me-auto">
                  <h3 class="page-title">Data Clerk</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                           <li class="breadcrumb-item"> <a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i>Dashboard</a></li>
                              
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('clerk.profile.index')}}">Profile</a></li> 
                          </ol>
                      </nav>
                  </div>
              </div>
              
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">
          <div class="row">			  
              <div class="col-lg-8 col-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h4 class="box-title">Update Profile</h4>
                    </div>
                      <!-- /.box-header -->
                      <form class="form" action="{{route('clerk.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="box-body">
                              <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                              <hr class="my-15">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{Auth::user()->name}}">
                                  </div>
                                </div>

                             
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="{{Auth::user()->email}}">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Phone" value="{{Auth::user()->contact}}">
                                  </div>
                                </div>
                              </div>
                              <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4>
                              <hr class="my-15">
                              <div class="form-group">
                                <label class="form-label">Assigned Hospital</label>
                                <input type="text" name="health_center_id" class="form-control" placeholder="" value="{{Auth::user()->healthCenter->name}}" disabled>
                              </div>
                            
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label class="form-label">Update Profile Image</label>
                                  <label class="file">
                                    <input type="file" name="image" id="file">
                                  </label>
                                </div>
                                <div class="form-group col-md-6">
                                  <label class="form-label">Current Profile Image</label> <br>
                                  <img src="{{asset('Upload/data_clerk/'.Auth::user()->image)}}" alt="" style="height:100px;">
                                </div>
                              </div>
                            
                              <div class="form-group">
                                <label class="form-label">About About Me</label>
                                <textarea rows="5" name="about" class="form-control" placeholder="About Project">{!!Auth::user()->about!!} </textarea>

                               
                              </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                              <a href="{{route('clerk.profile.index')}}" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> Cancel
                              </a>
                              <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Save
                              </button>
                          </div>  
                      </form>
                    </div>
                    <!-- /.box -->			
              </div>  

            
          </div>
         
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
</div>



@endsection