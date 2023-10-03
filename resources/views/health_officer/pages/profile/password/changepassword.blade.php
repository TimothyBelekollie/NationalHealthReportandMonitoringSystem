@extends('health_officer.master')
@section('health-officer')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="me-auto">
                  <h3 class="page-title">Health Officer</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                           <li class="breadcrumb-item"> <a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i>Dashboard</a></li>
                              
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('officer.profile.index')}}">Profile</a></li> 
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
                        <h4 class="box-title">Change Password</h4>
                        @if(count($errors))
                       
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                          <h4><i class="icon fa fa-check"></i> Alert!</h4>
                          @foreach ($errors->all() as $error)
                          <p>{{ $error}}</p>
                          @endforeach
                          </div>
                        @endif

                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 
                       <h4><i class="icon fa fa-check"></i> Alert!</h4>
                       {{session()->get('message')}}
                       </div>
                       @endif
                    </div>
                      <!-- /.box-header -->
                      <form class="form" action="{{route('officer.update.password')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="box-body">
                              <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Password Info</h4>
                              <hr class="my-15">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-label">Old Password</label>
                                    <input class="form-control" name="oldpassword" type="password"   id="oldpassword">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">New Password</label>
                                      <input name="newpassword" class="form-control"  type="password"  id="newpassword" >
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">Confirm Password</label>
                                      <input name="confirm_password" class="form-control" type="password"   id="confirm_password" >
                                    </div>
                                  </div>

                             
                              </div>

                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                              <a href="{{route('officer.profile.index')}}" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> Cancel
                              </a>
                              {{-- <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Update Password
                              </button> --}}
                              <input type="submit"  class="btn btn-primary" value="Update Password">
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