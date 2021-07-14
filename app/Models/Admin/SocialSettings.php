<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SocialSettings extends Model
{
	use HasFactory;
	protected $table = 'social_settings';

	/**
     * This function is used to store social media settings
     *
     */
	public static function updateSettings($inputs)
	{

		$SocialSettings = SocialSettings::where('provider',$inputs['social_provider'])->first();

		if(empty($SocialSettings)){
			$SocialSettings = New SocialSettings();
		}
		$SocialSettings->provider		= !empty( $inputs['social_provider'] ) ? trim($inputs['social_provider']) : '';
		$SocialSettings->client_id		= !empty( $inputs['client_id'] ) ? trim($inputs['client_id']) : '';
		$SocialSettings->client_secret	= !empty( $inputs['client_secret'] ) ? trim($inputs['client_secret']) : '';
		$SocialSettings->redirect		= !empty( $inputs['redirect_url'] ) ? trim($inputs['redirect_url']) : '';
		$SocialSettings->is_active		= !empty( $inputs['is_active'] ) ? trim($inputs['is_active']) : 0;
		$SocialSettings->display_order	= !empty( $inputs['display_order'] ) ? trim($inputs['display_order']) : NULL;
		$SocialSettings->save();

		return true;
	}

	public static function getSocialSettings($provider)
	{
		return SocialSettings::where('provider',$provider)
		->select('provider','client_id','client_secret','redirect','is_active','display_order')
		->first();
	}
}