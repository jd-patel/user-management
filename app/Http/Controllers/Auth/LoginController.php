<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\SocialSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
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

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
     * This function is used to handle login response
     *
     */
	public function login(Request $request)
	{
	  
		$rules = [
			'email' => 'required|email',
			'password' => 'required',
		];

		$messages = [
			'email.required' => 'Please enter email address.',
			'email.email' => 'Please enter valid email address.',
			'password.required' => 'Please enter password.',
		];

		$this->validate($request, $rules, $messages);

		if ($this->guard('web')->validate($this->credentials($request))) {
			$user = $this->guard('web')->getLastAttempted();

			// Make sure the user is active
			if ($user->is_active == 1 && $this->attemptLogin($request)) {

				// If User is active redirect to home page.
				$this->authenticated($request, $user);
				return redirect()->route('home');

			} else {
				
				// If User is inactive
				return redirect()->back()
				->with('incorrect' , 'Your account is inactive')
				->withInput($request->only('email','remember'));
			}
		} else{

			// If invalid login credentials enterd.
			return redirect()->back()
			->with('incorrect' , 'Wrong email or password')
			->withInput($request->only('email','remember'));
		}
	}

	/**
     * This function will call just after successfull login
     *
     */
	public function authenticated(Request $request, $user)
	{
		$user->update([
			'last_login' => Carbon::now()->toDateTimeString(),
			'last_login_type' => 'Website'
		]);
	}

	/**
     * This function is used to show login form
     *
     */
	public function showLoginForm()
	{
		$socialSettings = SocialSettings::where('is_active',true)
		->select('provider')
		->orderBy('display_order')->get();

		return view('auth.login')->with('socialSettings',$socialSettings);
	}

	/**
     * This function will call on logout action
     *
     */
	public function logout(Request $request)
	{
		if(\Auth::check())
		{
			$this->guard('web')->logout();
		}
		return  redirect()->route('login');
	}
}
