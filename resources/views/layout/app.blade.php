<!DOCTYPE html>
<html lang="en">
<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
	
  <title>{{ config('app.name', 'Laravel') }}</title>
    
	<link rel="shortcut icon" href="{{ asset('img/document.ico') }}">
	
	@vite(['resources/sass/style.scss'])	
</head>

<body>	
	@include('core.sidebar')

	<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('core.header')

    <div class="body flex-grow-1 px-3">
      <div class="container-fluid pb-4">
        @yield('content')
      </div>
    </div>

    @include('core.footer')
	</div>
	
	@vite('resources/js/function.js')

	<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

	@if(routeName() == 'dashboard.index')
    @include('dashboard.chart')
  @endif
</body>

</html>
