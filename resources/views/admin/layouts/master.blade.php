<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ADMIN</title>
    @include('admin.layouts.css')
    <!-- Google font -->

</head>

<body>
    <!-- HEADER -->
    @include('admin.layouts.header')
    <!-- /HEADER -->
    <!-- NAVIGATION -->
   
	@include('admin.layouts.sidebar')
	

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
	   
	   
	   @yield('content')
		<!-- /.content -->
	  </div>
	  
    <!-- Content Wrapper. Contains page content -->
    

    <!-- FOOTER -->
    @include('admin.layouts.footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    @include('admin.layouts.js')

</body>

</html>
