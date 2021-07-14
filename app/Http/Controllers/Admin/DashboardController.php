<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * This function is used to show dashboard with statistics
     *
     */
    public function showDashboard(Request $request)
    {

        $userStatistics     = User::dashboardCounts();
        $socialProviderWise = User::socialProviderWiseCount();
        $monthWiseCount     = User::monthWiseUserCount();
        $genderWiseCount    = User::genderWiseUserCount();
        $recentUsers        = User::recentlyRegisteredUsers();
        $ageWiseCount       = User::ageWiseCount();
        
        $userData = [
            'userStatistics'        => $userStatistics,
            'monthWiseCount'        => $monthWiseCount,
            'genderWiseCount'       => $genderWiseCount,
            'recentUsers'           => $recentUsers,
            'socialProviderWise'    => $socialProviderWise,
            'ageWiseCount'          => $ageWiseCount,
        ];
        return view('admin.dashboard')
        ->with($userData);
    }
}