<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Settings extends Model
{
    use HasFactory;
	protected $table = 'settings';


	/**
     * This function is used to store settings information
     *
     */
	public static function updateEmailSettings($inputs)
	{

		$Settings = Self::first();

		if(empty($Settings)){
			$Settings = New Self();
		}

		$Settings->mail_encryption = !empty( $inputs['mail_encryption'] ) ? trim($inputs['mail_encryption']) : '';
        $Settings->mail_host = !empty( $inputs['mail_host'] ) ? trim($inputs['mail_host']) : '';
        $Settings->mail_port = !empty( $inputs['mail_port'] ) ? trim($inputs['mail_port']) : '';
        $Settings->mail_username = !empty( $inputs['mail_username'] ) ? trim($inputs['mail_username']) : '';
        $Settings->mail_password = !empty( $inputs['mail_password'] ) ? trim(Crypt::encryptString($inputs['mail_password'])) : '';
        $Settings->mail_from_name = !empty( $inputs['mail_from_name'] ) ? trim($inputs['mail_from_name']) : '';
		$Settings->save();

		return true;
	}

	/**
     * This function is used to store settings information
     *
     */
	public static function updateGeneralSettings($inputs)
	{

		$Settings = Self::first();

		if(empty($Settings)){
			$Settings = New Self();
		}

		$Settings->site_name = !empty( $inputs['site_name'] ) ? trim($inputs['site_name']) : '';
		$Settings->save();

		return true;
	}

	public static function getSettings()
	{
		return Self::first();
	}
}