<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SocialSettings;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $socialSettings = SocialSettings::where('is_active',true)->get();

        foreach ($socialSettings as $key => $value) {
            
            $redirect_url = rtrim($value->redirect,'/').'/auth/'.$value->provider.'/callback';

            config(['services.'.$value->provider.'.client_id' => $value->client_id]);
            config(['services.'.$value->provider.'.client_secret' => $value->client_secret]);
            config(['services.'.$value->provider.'.redirect' => $redirect_url]);
        }
    }
}