<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	/**
     * This function is social login call back function
     *
     */
	public function callBack($provider)
	{
		try {

			// $userSocial	=   Socialite::driver($provider)->stateless()->user();
			$userSocial	=   Socialite::driver($provider)->user();

			$user		=   User::where(['email' => $userSocial->getEmail()])->first();

			if($user){

				if ($user->is_active == 1) {

					// If User is active redirect to home page.
					Auth::guard('web')->login($user);
					UserInfo::where('user_id',$user->id)->update([
						$provider.'_id'	=> $userSocial->getId(),
					]);

					$user->update([
						'last_login'		=> Carbon::now()->toDateTimeString(),
						'last_login_type'	=> ucfirst($provider)
					]);
					return redirect()->route('home');
				} else {
					
					// If User is inactive
					return redirect()->route('login')
					->with('incorrect' , 'Your account is inactive');
				}
				
			}else{

				$user = User::create([
					'first_name'    	=> $userSocial->getName(),
					'email'         	=> $userSocial->getEmail(),
					'password'			=> '',
					'last_login'		=> Carbon::now()->toDateTimeString(),
					'last_login_type'	=> ucfirst($provider)
				]);

				$userInfo = [
					'user_id'		=>	$user->id,
					$provider.'_id'	=>	$userSocial->getId(),
				];
				UserInfo::storeUserInfo($userInfo);

				Auth::guard('web')->login($user);
				return redirect()->route('home');
			}

		} catch (Exception $exception) {

			\Log::debug($exception);

			return redirect()->route('login')
			->with('incorrect' , 'Something went wrong! Please contact administrator.');
		}
	}
}