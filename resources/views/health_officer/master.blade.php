<!DOCTYPE html>
<html lang="en">

 @include('chief_doctor.components.metadata')

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
  
	
 @include('chief_doctor.components.header')
  
 @include('chief_doctor.components.aside')

  <!-- Content Wrapper. Contains page content -->
 @yield('chief_doctor')
  <!-- /.content-wrapper -->
 
  @include('chief_doctor.components.footer')

  <!-- Control Sidebar -->
 @include('chief_doctor.components.second_aside')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	
	<!-- Sidebar -->
		
	@include('chief_doctor.components.chat')
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	@include('chief_doctor.components.js')
	
</body>
</html>

