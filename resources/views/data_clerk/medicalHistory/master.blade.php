<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{asset('images/favicon.ico')}}">

  <title>NHMARS|Patient-Medical-History</title>
  
<!-- Vendors Style-->
<link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">
  
<!-- Style-->  
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/skin_color.css')}}">
   
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
  
	
 {{-- @include('data_clerk.components.header') --}}
  
 {{-- @include('data_clerk.components.aside') --}}

  <!-- Content Wrapper. Contains page content -->
 @yield('history')
  <!-- /.content-wrapper -->
 
  {{-- @include('data_clerk.components.footer') --}}

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

