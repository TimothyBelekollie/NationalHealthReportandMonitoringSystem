<nav class="main-nav" role="navigation">

	<!-- Mobile menu toggle button (hamburger/x icon) -->
	<input id="main-menu-state" type="checkbox" />
	<label class="main-menu-btn" for="main-menu-state">
	  <span class="main-menu-btn-icon"></span> Toggle main menu visibility
	</label>

	<!-- Sample menu definition -->
	<ul id="main-menu" class="sm sm-blue">
	  <li><a href="#"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Health Facility</a>
		  <ul> 
			  <li><a href="{{route('officer.add_center')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New Facility</a></li>
			  <li><a href="{{route('officer.index_center')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View All Facility</a></li>
			
			
		  </ul>
	  </li>

	  
	  <li><a href="#"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Subdivision Registry(District)</a>
		<ul> 
			<li><a href="{{route('officer.add_subdivision')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add New District</a></li>
			<li><a href="{{route('officer.index_subdivision')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View All District</a></li>
		  
		  
		</ul>
	</li>

	<li><a href="{{route('officer.index_doctor')}}"><i class="icon-User"><span class="path1"></span><span class="path2"></span></i>Doctor Registry</a>

		{{-- Reports of different kinds --}}

	  <li><a href="mailbox.html"><i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>Patient Report</a></li>
	  <li><a href="mailbox.html"><i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>Birth Report</a></li>
	  <li><a href="mailbox.html"><i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>Death Death Report</a></li>
	 
	
	
	  </li>
	
	</ul>
  </nav>