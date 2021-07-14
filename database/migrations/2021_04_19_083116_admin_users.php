<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DBS;

class AdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DBS::table('admin_users')->insert(
            array(
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$MTplMszxYBOl4KOqCHdSpekCKxw0gyeelImfl2R1m6a.6wgxP9P9C'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
