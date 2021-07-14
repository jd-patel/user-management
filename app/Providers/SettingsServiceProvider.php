<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin\Settings;
use Illuminate\Support\Facades\Crypt;

class SettingsServiceProvider extends ServiceProvider
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
        $settings = Settings::first();
        if( $settings ){

            // config(['mail.driver' => $settings->mail_driver]); // If needed dynamic mail driver
            config(['mail.mailers.smtp.encryption'   => !empty( $settings->mail_encryption ) ? $settings->mail_encryption : '']);
            config(['mail.mailers.smtp.host'         => !empty( $settings->mail_host ) ? $settings->mail_host : '']);
            config(['mail.mailers.smtp.port'         => !empty( $settings->mail_port ) ? $settings->mail_port : '']);
            config(['mail.mailers.smtp.username'     => !empty( $settings->mail_username ) ? $settings->mail_username : '']);
            config(['mail.mailers.smtp.password'     => !empty( $settings->mail_password ) ? Crypt::decryptString($settings->mail_password) : '' ]);
            config(['mail.from'                      => array('address' => !empty( $settings->mail_username ) ? $settings->mail_username : '', 'name' => !empty( $settings->mail_from_name ) ? $settings->mail_from_name : '' )]);

            config(['app.name'                      => !empty( $settings->site_name ) ? $settings->site_name : '']);
        }
    }
}
