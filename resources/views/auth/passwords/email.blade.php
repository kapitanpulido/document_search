@extends('auth.index')

@section('content')
<div class="container mt-5">

	<form action="{{ route('password.email') }}" method="POST">
		@csrf

    

    <div class="row">
      <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">

			
        <div class="card border-primary auth_pane">
          <div class="card-body">
            <h2>{{ __('Reset Password') }}</h2>
            <div class="pt-1 pb-3 text-muted"><i>Please enter your login email to continue.</i></div>

            <div class="row">
              <div class="col-12 p-2">
                <div class="form-floating">
									<input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="{{ __('Email') }}" required>
                  <label for="floatingInput">Email address</label>

                  
                </div>
								
              </div>
            </div>

            <div class="row">
              <div class="col p-2">
								<button class="btn btn-lg btn-primary" type="submit">
									{{ __('Send Password Reset Link') }}
								</button>

								<a class="btn btn-lg btn-danger text-white float-end" type="submit" href="/login">
									{{ __('Cancel') }}
								</a>
              </div>
            </div>           


          </div>

        </div>
      </div>
    </div>
		

		@if(session('status'))
			<div class="row">
        <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1 pt-3">
          <div class="alert alert-success">
						<i class="fa-solid fa-circle-check"></i>
            {{ session('status') }}
          </div>
        </div>
      </div>
    @endif

		
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