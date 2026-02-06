<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="icon" href="{{ asset('img/ccss_favicon.ico') }}">
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="">

  <title>{{ config('app.name', 'Laravel') }}</title>

	

  <style>
  .app{
    display:flex;
    min-height:80vh;
  }
  body{
    background-color: #e4e5e6;
  }
  </style>
</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="clearfix">

          @yield('content')

          <p class="text-muted">Please contact support if you need assistance.<br/>
            <button type="button" class="btn btn-outline-primary" onclick="window.location='/dashboard'">
              <i class="fa fa-home fa-lg" aria-hidden="true"></i> Go to home
            </button>
          </p>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
