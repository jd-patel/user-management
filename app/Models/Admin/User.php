<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use DB;

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
     * This function is used to get user info with user details
     *
     */
	public function UserInfo()
	{
		return $this->hasOne("App\Models\Admin\UserInfo",'user_id');
	}

	/**
     * This function is used to update user details
     *
     */
	public static function updateUserDetail($inputs)
	{
		if( !empty( $inputs['userID'] ) ){

			$userDetail = Self::find(Crypt::decrypt($inputs['userID']));
			$userDetail->first_name		= trim($inputs['first_name']);
			$userDetail->last_name		= trim($inputs['last_name']);
			$userDetail->email			= trim($inputs['email']);
			$userDetail->phone_number	= trim($inputs['phone_number']);
			$userDetail->date_of_birth	= !empty( $inputs['date_of_birth'] ) ? date("Y-m-d",strtotime($inputs['date_of_birth'])) : NULL;
			$userDetail->gender			= !empty( $inputs['gender'] ) ? $inputs['gender'] : NULL;
			$userDetail->is_active		= !empty( $inputs['is_active'] ) ? trim($inputs['is_active']) : 0;
			$userDetail->save();

			return $userDetail;
		}
	}

	/**
     * This function is used to get desktop statistics
     *
     */
	public static function dashboardCounts()
	{

		$allUsers = Self::all();

		$totalUsers = $allUsers->filter(function ($value, $key) {
			return 1;
		})->count();

		$activeUsers = $allUsers->filter(function ($value, $key) {
			if ($value['is_active'] == 1) {
				return true;
			}
		})->count();

		$grouped = $allUsers->groupBy('gender')->map(function ($row) {
            return $row->count();
        })->toArray();

		$userStatistics = [
			'totalUsers'	=> $totalUsers,
			'activeUsers'	=> $activeUsers,
			'genderMale' 	=> !empty( $grouped['Male'] ) ? $grouped['Male'] : 0,
			'genderFemale'	=> !empty( $grouped['Female'] ) ? $grouped['Female'] : 0,
			'noGenderUsers'	=> !empty( $grouped[''] ) ? $grouped[''] : 0,
		];

		return $userStatistics;
	}

	/**
     * This function is used to get social provider wise counts
     *
     */
	public static function socialProviderWiseCount()
	{
		$socialTypes = new UserInfo();
		$socialTypes = $socialTypes->social;

		$allUsers = UserInfo::all();

		foreach ($socialTypes as $social_key => $socialType) {
			
			$social[ucfirst(str_replace('_id', '', $socialType))] = $allUsers->filter(function ($value, $key) use($socialType) {
				if (!empty( $value[$socialType] )) {
					return true;
				}
			})->count();
		}

		$data = [
			'loginType'	=> json_encode(array_keys($social)),
			'counts'	=> json_encode(array_values($social)),
		];		

		return $data;
	}

	/**
     * This function is used to get month wise user counts
     *
     */
	public static function monthWiseUserCount()
	{
		$allUsers = Self::
		selectRaw('MONTHNAME(created_at) as month')
		->selectRaw('count(*) as count')
		->selectRaw('max(id) as id')
		->groupBy('month')
		->orderBy('id','asc')
		->get();

		$months = collect($allUsers)->pluck('month')->toJson();
		$counts = collect($allUsers)->pluck('count')->toJson();

		return [
			'months' => $months,
			'counts' => $counts,
		];
	}

	/**
     * This function is used to gender wise user counts
     *
     */
	public static function genderWiseUserCount()
	{
		$allUsers = Self::
		selectRaw('CASE WHEN gender IS NOT NULL THEN gender ELSE "Other" END AS gender')
		->selectRaw('count(*) as count')
		->groupBy('gender')
		->get();

		$gender = collect($allUsers)->pluck('gender')->toJson();
		$counts = collect($allUsers)->pluck('count')->toJson();

		return [
			'gender' => $gender,
			'counts' => $counts,
		];
	}

	/**
     * This function is used to list of recently registered users
     *
     */
	public static function recentlyRegisteredUsers()
	{
		$recentUsers = User::
		select("first_name as name","email","date_of_birth")
		->orderBy('id','desc')->take(5)->get();

		if( !empty( $userDetails->date_of_birth ) )
			$recentUsers->date_of_birth = \Carbon\Carbon::createFromFormat('Y-m-d', $userDetails->date_of_birth)->format('d-m-Y');

		return $recentUsers;
	}

	/**
     * This function is used to age range wise user counts
     *
     */
	public static function ageWiseCount()
	{
		$ranges = [ // the start of each age-range.
            '0-10' => 1,
            '11-20' => 11,
            '21-30' => 21,
            '31-40' => 31,
            '41-50' => 41,
            '51-60' => 51,
            '61-70' => 61,
            '71-80' => 71,
            '81-90' => 81,
            '91-100+' => 91
        ];

        $ageWiseCounts = User::whereNotNull('date_of_birth')->get()
        ->map(function ($user) use ($ranges) {

            $age = Carbon::parse($user->date_of_birth)->age;
            foreach($ranges as $key => $breakpoint)
            {
                if ($breakpoint >= $age)
                {
                    $user->range = $key;
                    break;
                }
            }
            return $user;
        })
        ->mapToGroups(function ($user, $key) {
            return [$user->range => $user];
        })
        ->map(function ($group) {
            return count($group);
        })
        ->sortKeys()->toArray();

		foreach($ranges as $key => $value)
        {
			if (array_key_exists($key, $ageWiseCounts)) {
			    $ranges[$key] = $ageWiseCounts[$key];
			}else{
				$ranges[$key] = 0;
			}
		}

		$data = [
			'ageRange' => json_encode(array_keys($ranges)),
			'counts' => json_encode(array_values($ranges)),
		];

		return $data;
	}
}