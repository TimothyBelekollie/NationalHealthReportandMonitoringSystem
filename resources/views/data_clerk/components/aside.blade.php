<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<li class="header">Data Clerk Dashboard</li>
				@if (Auth::user()->usertype=="Doctor")
				<li class="treeview">
				  <a href="#">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Birth Report</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('clerk.pat.birth.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> View Birth Record</a></li>
					<li><a href="{{route('clerk.pat.birth.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Add Birth Record</a></li>
					
					
				  </ul>
				</li>
				@endif	
				@if (Auth::user()->usertype=="Doctor")
                <li class="treeview">
                    <a href="#">
                      <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                      <span>Death Report</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('clerk.pat.death.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> View Death Record</a></li>
                      <li><a href="{{route('clerk.pat.death.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Death Record</a></li>
                    </ul>
                  </li>
				  @endif	
				<li class="treeview">
				  <a href="#">
					<i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					<span>Patient Report</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('clerk.patient.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All Patient Record</a></li>
					<li><a href="{{route('clerk.patient.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Patient Record</a></li>
				  </ul>
				</li>	
				
				@if (Auth::user()->usertype=="Doctor"|| Auth::user()->usertype=="Receptionist"|| Auth::user()->usertype=="Laboratory-Technician")
				<li class="treeview">
					<a href="#">
					  <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					  <span>Patient Encounters</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">

					  @if (Auth::user()->usertype=="Doctor")	
					  <li><a href="{{route('clerk.pat.encounter.indextwo')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Encounters</a></li>
					  @endif
                     {{-- This is for Lab Technician --}}
					  @if (Auth::user()->usertype=="Laboratory-Technician")
					  <li><a href="{{route('clerk-technician.pat.encounter.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View  Encounters LT</a></li>
					  @endif

					  @if (Auth::user()->usertype=="Receptionist")	
					  <li><a href="{{route('clerk.pat.encounter.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Encounters</a></li>
					  @endif

					  {{-- @if (Auth::user()->usertype=="Doctor")
					  <li><a href="{{route('clerk.pat.encounter.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Encounters</a></li>
					  @endif	 --}}

					  @if (Auth::user()->usertype=="Receptionist")
					  <li><a href="{{route('clerk.pat.encounter.addtwo')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Encounters</a></li>
					  @endif	
					</ul>
				  </li>	
				  @endif	
@if (Auth::user()->usertype=='Receptionist')
	

				  <li class="treeview">
					<a href="#">
					  <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					  <span>Medical Appointments</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">
					  <li><a href="{{route('clerk.appointment.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Appointments</a></li>
					 
					</ul>
				  </li>	
				  @endif	

				  @if (Auth::user()->usertype=='Doctor')
	

				  <li class="treeview">
					<a href="#">
					  <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					  <span>Medical Appointments</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">
					  <li><a href="{{route('clerk.doc.appointment.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Appointments</a></li>
					 
					</ul>
				  </li>	
				  @endif				 
				 	     
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="{{route('clerk.profile.index')}}" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="{{route('clerk.appointment.index')}}" class="link" data-bs-toggle="tooltip" title="Appointment"><span class="icon-Mail"></span></a>
		<a href="{{route('user.logout')}}" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>