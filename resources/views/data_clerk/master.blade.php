<!DOCTYPE html>
<html lang="en">

 @include('data_clerk.components.metadata')

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
  
	
 @include('data_clerk.components.header')
  
 @include('data_clerk.components.aside')

  <!-- Content Wrapper. Contains page content -->
 @yield('data_clerk')
  <!-- /.content-wrapper -->
 
  @include('data_clerk.components.footer')

  <!-- Control Sidebar -->
 @include('data_clerk.components.second_aside')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	
	<!-- Sidebar -->
		
	@include('data_clerk.components.chat')
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	@include('data_clerk.components.js')
	
</body>
</html>

