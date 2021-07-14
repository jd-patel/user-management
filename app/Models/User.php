<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * This function is used to get client IP address.
     *
     */
    public static function getUserIP()
    {
        $clientIP = \Request::ip();
        if( !empty( request()->header('x-forwarded-for') ) ){
            $clientIP = request()->header('x-forwarded-for');
        }
        return $clientIP;
    }

    /**
     * This function is used to get client's agent information
     *
     */
    public static function getAgentInfo()
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $browser_version = $agent->version($browser);
        $platform = $agent->platform();

        return [
            'browser' => $browser,
            'browser_version' => $browser_version,
            'platform' => $platform,
        ];
    }
}
