<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>
        @include('client.layouts.partials.css')
		<!-- Google font -->

    </head>
	<body>
		<!-- HEADER -->
		@include('client.layouts.partials.header')
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		@yield('content')

		<!-- FOOTER -->
		@include('client.layouts.partials.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		@include('client.layouts.partials.js')

	</body>
</html>
