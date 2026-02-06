<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="">
    <meta name="theme-color" content="#ffffff">
    @vite('resources/sass/style.scss')
</head>
<body class="bg_3 vh-100">
	
  <div>
    @yield('content')
  </div>
  

	@vite('resources/js/function.js')	
	

</body>
</html>
