<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use Auth;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * This function is used to store user detail
     *
     */
    public static function storeUserDetail($inputs)
    {
        if( !empty( $inputs['userID'] ) ){

            $userDetail = Self::find(Crypt::decrypt($inputs['userID']));

        }else{
            
            $userDetail = New AdminUser();
            $userDetail->password     = Hash::make(trim($inputs['password']));
        }

        $userDetail->first_name     = trim($inputs['first_name']);
        $userDetail->last_name      = trim($inputs['last_name']);
        $userDetail->email          = trim($inputs['email']);
        $userDetail->save();
        return $userDetail;
    }

    /**
     * This function is used to store user detail
     *
     */
    public static function updateUserPassword($inputs)
    {
        if( !empty( $inputs['userID'] ) ){

            $userDetail             = Self::find(Crypt::decrypt($inputs['userID']));
            $userDetail->password   = Hash::make(trim($inputs['password']));
            $userDetail->save();

            return $userDetail;
        }
    }

    /**
     * This function is used to delete user
     *
     */
    public static function deleteUser($inputs)
    {
        if( !empty( $inputs['id'] ) && Auth::guard('admin')->user()->id != Crypt::decrypt($inputs['id']) ){

            $user = Self::find(Crypt::decrypt($inputs['id']));
            if($user->delete())
                return 1;
        }

        return 2;
    }
}
