<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'user_info';

    /**
     * This function is used to store Users Extra Information
     *
     */
    public static function storeUserInfo($inputs)
	{
		if( !empty( $inputs['user_id'] ) ){

			$userInfo = New UserInfo();
			foreach ($inputs as $key => $value) {

				$userInfo->$key = $value;
			}

            $userInfo->browser = User::getAgentInfo()['browser'];
            $userInfo->browser_version = User::getAgentInfo()['browser_version'];
            $userInfo->platform = User::getAgentInfo()['platform'];
            $userInfo->ip_address = User::getUserIP();
			$userInfo->save();

			return $userInfo;
		}
	}
}
