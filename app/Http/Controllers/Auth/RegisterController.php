<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\SocialSettings;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'regex:/^[\pL\s]+$/u', 'max:255'],
            'last_name' => ['max:255','regex:/^[\pL\s]+$/u','nullable'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required','max:16','regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ],
        [
            'first_name.required' => 'Please enter your first name.',
            'first_name.regex' => 'Please enter valid first name.',
            'first_name.max' => 'Please enter valid first name.',
            'last_name.regex' => 'Please enter valid last name.',
            'last_name.max' => 'Please enter valid last name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
            'email.max' => 'Please enter valid email address.',
            'email.unique' => 'This email is already registered with us.',
            'phone_number.required' => 'Please enter phone number.',
            'phone_number.regex' => 'Please enter valid phone number.',
            'phone_number.max' => 'Please enter valid phone number.',
            'date_of_birth.required' => 'Please enter your date of birth.',
            'gender.required' => 'Please select your gender.',
            'password.required' => 'Please enter password.',
            'password.min' => 'Password should be min 8 character.',
            'password.confirmed' => 'Password does not match.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userData = User::create([
            'first_name' => trim($data['first_name']),
            'last_name' => trim($data['last_name']),
            'email' => trim($data['email']),
            'phone_number' => trim($data['phone_number']),
            'date_of_birth' => !empty( $data['date_of_birth'] ) ? date("Y-m-d",strtotime($data['date_of_birth'])) : '',
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);

        return UserInfo::storeUserInfo(array('user_id'=>$userData->id));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')
        ->with('success' , 'Registered Successfully. Please Sign In.')
        ->withInput($request->only('email','remember'));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * This function is used to show login form
     *
     */
    public function showRegistrationForm()
    {
        $socialSettings = SocialSettings::where('is_active',true)
        ->select('provider')
        ->orderBy('display_order')->get();

        return view('auth.register')->with('socialSettings',$socialSettings);
    }
}
