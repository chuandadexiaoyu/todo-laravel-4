<!DOCTYPE html>
<html>
<head>
	<title>LaraToDo</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/app.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="/js/app.js"></script>
</head>
<body style="background-image:url('/img/background/{{Auth::user()->wallpaper}}/{{Auth::user()->id}}')">

	@yield('content')

</body>
</html>