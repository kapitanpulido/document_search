@extends('auth.index')

@section('content')
<div class="container mt-5">

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <br/><br/><br/><br/><br/>

    <div class="row">
      <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
        <div class="card border-primary auth_pane">
          <div class="card-body">
            <h2>Login Form</h2>
            <div class="pt-1 pb-3 text-muted"><i>Please enter your account credentials to continue.</i></div>

            <div class="row form-group">
              <div class="col-12 p-2">
                <div class="form-floating">
                  <input type="text" name="email" class="form-control input-lg" placeholder="Email address" required>
                  <label for="floatingInput">Email address</label>

                  
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-12 p-2">
                <div class="form-floating">
                  <input type="password" name="password" class="form-control input-lg" placeholder="Password" required>
                  <label for="floatingInput">Password</label>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-6 p-2">
                <input type="submit" class="btn btn-primary btn-lg" value="Login" />
              </div>
              <div class="col-6 pt-3 text text-end">
                &nbsp;
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>


		@if ($errors->has('email'))
      <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger" id="lockout-message">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $errors->first('email') }}
          </div>
        </div>
      </div>
    @endif


		@if ($errors->has('msg'))
			<div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger" id="lockout-message">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $errors->first('msg') }}
          </div>
        </div>
      </div>
		@endif
		

		@if ($errors->has('password'))
      <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $errors->first('password') }}
          </div>
        </div>
      </div>
    @endif

    


  </form>



</div>





@endsection