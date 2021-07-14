<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * This function is used to logout admin user
     *
     */
    public function logout(Request $request){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * This function is used to handle login response for admin
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

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
        ->with('incorrect' , 'Wrong username or password')
        ->withInput($request->only('email'));
    }

    /**
     * This function is used to show admin login form
     *
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
}