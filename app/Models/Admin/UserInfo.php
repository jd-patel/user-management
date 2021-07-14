<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;
    protected $guarded	= [];
    protected $hidden	= ['id','created_at','updated_at','user_id'];
    public $social		= ['google_id','facebook_id','twitter_id','linkedin_id','github_id'];
    protected $table	= 'user_info';

}
