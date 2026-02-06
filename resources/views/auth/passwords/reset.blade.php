@extends('auth.index')

@section('content')
<div class="container mt-5">

	<form action="{{ route('password.update') }}" method="POST">
		@csrf
		<input type="hidden" name="token" value="{{ $token }}">
    

    <div class="row">
      <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">

			
        <div class="card border-primary auth_pane">
          <div class="card-body">
            <h2>{{ __('Reset Password') }}</h2>
            <div class="pt-1 pb-3 text-muted"><i>Please enter your new password to continue.</i></div>

            <div class="row">
              <div class="col-12 p-2">
                <div class="form-floating">
									<input name="email" id="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="{{ __('Email') }}" value="{{$email}}">
                  <label for="floatingInput">Email Address</label>
                </div>								
              </div>
            </div>

						<div class="row">
              <div class="col-12 p-2">
                <div class="form-floating">
									<input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="{{ __('Password') }}">
                  <label for="floatingInput">New Password</label>
                </div>								
              </div>
            </div>

						<div class="row">
              <div class="col-12 p-2">
                <div class="form-floating">
									<input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                  <label for="floatingInput">Retype New Password</label>
                </div>								
              </div>
            </div>

            <div class="row">
              <div class="col p-2">
								<button class="btn btn-primary btn-lg" type="submit">{{ __('Reset Password') }}</button>
              </div>
            </div>           


          </div>

        </div>
      </div>
    </div>
		

		@error('password')
    	<div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $message }}
          </div>
        </div>
      </div>
    @enderror

		@error('password_confirmation')
    	<div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $message }}
          </div>
        </div>
      </div>
    @enderror

		@error('email')
    	<div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            {{ $message }}
          </div>
        </div>
      </div>
    @enderror


  </form>

</div>


@endsection