<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<li class="header">Data Clerk Dashboard</li>
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
				
				
				<li class="treeview">
					<a href="#">
					  <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					  <span>Patient Encounters</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">
					  <li><a href="{{route('clerk.pat.encounter.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Encounters</a></li>
					  <li><a href="{{route('clerk.pat.encounter.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Encounters</a></li>
					</ul>
				  </li>	
							 
				 	     
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>