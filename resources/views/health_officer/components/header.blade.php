<header class="main-header">
	<div class="inside-header">
	  <div class="d-flex align-items-center logo-box justify-content-start">
		  <!-- Logo -->
		  <a href="{{route('dashboard')}}" class="logo">
			<!-- logo-->
			<div class="logo-lg" style="height;auto-fit">
				<span class="light-logo"><img src="{{asset('images/logo/logo-6.png')}}" alt="logo" height="50"></span>
				<span class="dark-logo"><img src="{{asset('images/logo/logo-6.png')}}" alt="logo" height="50"></span>
			</div>
		  </a>	
	  </div>  
	  <!-- Header Navbar -->
	  <nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<div class="app-menu">
		  <ul class="header-megamenu nav">
			 
			 
			
		  </ul> 
		</div>

		<div class="navbar-custom-menu r-side">
		  <ul class="nav navbar-nav">	
			  <li class="btn-group nav-item d-lg-inline-flex d-none">
				  <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					  <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
				  </a>
			  </li>	  
			  
		
			<!-- User Account-->
			<li class="dropdown user user-menu">
			  <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="{{Auth::User()->name}}">
				  <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
			  </a>
			  <ul class="dropdown-menu animated flipInX">
				<li class="user-body">
				   <a class="dropdown-item" href="{{route('officer.profile.index')}}"><i class="ti-user text-muted me-2"></i> Profile</a>
				   <a class="dropdown-item" href="{{route('officer.change.password')}}"><i class="ti-wallet text-muted me-2"></i> Change Password</a>
				   <a class="dropdown-item" href="{{route('officer.profile.edit',Auth::user()->id)}}"><i class="ti-settings text-muted me-2"></i> Settings</a>
				   <div class="dropdown-divider"></div>
				   <a class="dropdown-item" href="{{route('user.logout')}}"><i class="ti-lock text-muted me-2"></i> Logout</a>
				</li>
			  </ul>
			</li>	

			<!-- Control Sidebar Toggle Button -->
			{{-- <li>
				<a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
				  <i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
				</a>
			</li> --}}

		  </ul>
		</div>
	  </nav>
	</div>
</header>