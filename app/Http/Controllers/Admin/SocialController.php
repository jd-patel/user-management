<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialSettings;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
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
     * This function is used to show social media settings
     *
     */
	public function showSettings()
	{
		return view('admin.social.index');
	}

	/**
     * This function is used to update social media settings
     *
     */
	public function updateSocialSettings(Request $request)
	{
        $rules = [
            'social_provider'	=> 'required|not_in:0',
			'client_id' 		=> 'required',
			'client_secret'		=> 'required',
			'redirect_url' 		=> 'required|url',
			'display_order'		=> 'integer|nullable',
        ];

        $messages = [
            'social_provider.required' => 'Please select social provider.',
            'client_id.required' => 'Please enter client id.',
            'client_secret.required' => 'Please enter client secret.',
            'redirect_url.required' => 'Please enter redirect url.',
            'redirect_url.url' => 'Please enter valid redirect url.',
            'display_order.integer' => 'Please enter valid integer value.',
        ];

        $this->validate($request, $rules, $messages);

        if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.socialsettings')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}
		
		SocialSettings::updateSettings($request->all());
		return redirect()->route('admin.socialsettings')
		->with('success','Social Settings Updated Successfully.');
	}

	/**
     * This function is used to get social media settings
     *
     */
	public function getSocialSettings(Request $request)
	{
		return response()->json(SocialSettings::getSocialSettings($request->provider));
	}
}
