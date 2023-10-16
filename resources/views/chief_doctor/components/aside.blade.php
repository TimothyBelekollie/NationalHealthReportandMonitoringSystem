<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<li class="header">Chief Doctor Dashboard</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Data Clerk</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{route('doctor.index_clerk')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> View Record</a></li>
					<li><a href="{{route('doctor.add_clerk')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Add  Record</a></li>
					
					
				  </ul>
				</li>

				<li class="treeview">
					<a href="{{route('dashboard')}}">
					  <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					  <span>Birth Report</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">
					  <li><a href="{{route('doctor.detail_birth')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Details</a></li>
					
					  
					  
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
                      <li><a href="{{route('doctor.detail_death')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Details</a></li>
                      
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
					<li><a href="{{route('doctor.detail_patient')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Details</a></li>
					
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
					  <li><a href="{{route('doctor.detail_patient')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Details</a></li>
					  
					</ul>
				  </li>	
							 
				 	     
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>