<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Settings;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Socialite;
use Exception;
use Auth;

class SettingsController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	/**
     * This function is used to show general setting page
     *
     */
	public function showGeneralSettings()
	{
		$settings = Settings::getSettings();
		return view('admin.settings.general')
		->with('settings',$settings);
	}

	/**
     * This function is used to update general settings
     *
     */
	public function updateGeneralSettings(Request $request)
	{
		$rules = [
            'site_name' => 'required'
        ];

        $messages = [
            'site_name.required' => 'Please enter app name.',
        ];

        $this->validate($request, $rules, $messages);

        if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.general.settings')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}

		Settings::updateGeneralSettings($request->all());
		return redirect()->route('admin.general.settings')
		->with('success','Settings Updated Successfully.');
	}

	/**
     * This function is used to show Email setting page
     *
     */
	public function showEmailSettings()
	{
		$settings = Settings::getSettings();
		return view('admin.settings.email')
		->with('settings',$settings);
	}

	/**
     * This function is used to update Email settings
     *
     */
	public function updateEmailSettings(Request $request)
	{
		$rules = [
            'mail_encryption' => 'required',
			'mail_host' 	=> 'required',
			'mail_port' => 'required',
			'mail_username' => 'required',
			'mail_password' => 'required',
			'mail_from_name' => 'required',
        ];

        $messages = [
            'mail_encryption.required' => 'Please enter encryption type.',
            'mail_host.required' => 'Please enter host name.',
            'mail_port.required' => 'Please enter port.',
            'mail_username.required' => 'Please enter email address.',
            'mail_password.required' => 'Please enter password.',
            'mail_from_name.required' => 'Please enter from name.',
        ];

        $this->validate($request, $rules, $messages);

        if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.email.settings')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}
		
		Settings::updateEmailSettings($request->all());
		return redirect()->route('admin.email.settings')
		->with('success','Settings Updated Successfully.');
	}
}
