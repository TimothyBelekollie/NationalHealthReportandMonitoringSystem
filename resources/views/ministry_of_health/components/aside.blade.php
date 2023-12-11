<nav class="main-nav" role="navigation">

	<!-- Mobile menu toggle button (hamburger/x icon) -->
	<input id="main-menu-state" type="checkbox" />
	<label class="main-menu-btn" for="main-menu-state">
	  <span class="main-menu-btn-icon"></span> Toggle main menu visibility
	</label>

	<!-- Sample menu definition -->
	<ul id="main-menu" class="sm sm-blue">
	  {{-- <li><a href="#"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Health Facility</a>
		  <ul> 
			  <li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Facility One</a></li>
			  <li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Facility Two</a></li>
			  <li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Facility Three</a></li>
			
		  </ul>
	  </li> --}}
	  {{-- <li><a href="mailbox.html"><i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>Patient</a></li> --}}
	  <li><a href="{{route('minister.contact.index')}}"><i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>Vistor's Messages</a></li>
	  
	  <li><a href="#"><i class="icon-User"><span class="path1"></span><span class="path2"></span></i>Division Registry</a>
		<ul>
		  <li><a href="{{route('minister.index_division')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All Division</a></li>
		  <li><a href="{{route('minister.add_division')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Division</a></li>

		 
		</ul>		  
	  </li>
	  <li><a href="#"><i class="icon-User"><span class="path1"></span><span class="path2"></span></i>Health Officer Registry</a>
		<ul>
		  <li><a href="{{route('minister.index_officer')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All Health Officer</a></li>
		  <li><a href="{{route('minister.add_officer')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Health Officer</a></li>

		 
		</ul>		  
	  </li>

	</ul>
  </nav>