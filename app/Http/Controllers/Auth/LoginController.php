<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Session, Auth;
class LoginController extends Controller
{
	use ThrottlesLogins;
	use AuthenticatesUsers;

	/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

		

	  protected function username()
	  {
	    return 'email';
	  }

	  protected function maxAttempts()
	  {
	    return 2;
	  }

	  protected function decayMinutes()
	  {
	    return 1;
	  }

	  public function login(Request $request)
	  {
	    $this->validate($request, [
	      $this->username() => 'required|string',
	        'password' => 'required|string',
	    ]);

	    if ($this->hasTooManyLoginAttempts($request)) {
	      $this->fireLockoutEvent($request);
	      return $this->sendLockoutResponse($request);
	    }

	    if ($this->attemptLogin($request)) {
	      return $this->sendLoginResponse($request);
	    }

	    $this->incrementLoginAttempts($request);
	    return $this->sendFailedLoginResponse($request);
	  }
    

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

		protected function authenticated(Request $request, $user)
    {
      if(!Auth::user()->is_active){
        $this->guard()->logout();
        Session::flush();

        return redirect()->route('login')->withErrors(['msg' => 'User account has been deactivated. Please contact the administrator to reactivate your account.']);
      }

      Auth::logoutOtherDevices($request->password);
		}


		public function logout(Request $request)
    {
      $this->guard()->logout();

      $request->session()->invalidate();
      Session::flush();

      return redirect()->route('login');
    }
}
