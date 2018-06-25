<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
</head>
<body>

	@yield('content')

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/jquery.js') }}"></script>
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>

	@stack('scripts')

</body>
</html>