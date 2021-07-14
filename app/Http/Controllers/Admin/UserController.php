<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use DataTables;
use App\Models\Admin\User;

class UserController extends Controller
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
     * This function is used to show user listing
     *
     */
	public function showUserList(){
		return view('admin.users.index');
	}

	/**
     * This function is used to show edit user page
     *
     */
	public function editUserDetails(Request $request, $encrypted_userID){
		
		$userID			= !empty( $encrypted_userID ) ? Crypt::decrypt($encrypted_userID) : '';
		$userDetails	= User::with(['UserInfo'])->find($userID);
		$userDetails->UserInfo = $userDetails->UserInfo->attributesToArray();
		
		if( !empty( $userDetails->date_of_birth ) )
			$userDetails->date_of_birth = \Carbon\Carbon::createFromFormat('Y-m-d', $userDetails->date_of_birth)->format('d-m-Y');

		if( !empty( $userDetails->last_login ) )
			$userDetails->last_login = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $userDetails->last_login)->format('d M, Y h:i A');

		return view('admin.users.edit')
		->with('userID',$encrypted_userID)
		->with('userDetails',$userDetails);
	}

	/**
     * This function is used to update user details
     *
     */
	public function updateUserDetails(Request $request){
		
		$rules = [
			'first_name' => ['required', 'regex:/^[\pL\s]+$/u', 'max:255'],
			'last_name' => ['max:255','regex:/^[\pL\s]+$/u','nullable'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Crypt::decrypt($request->userID)],
			'phone_number' => ['regex:/^\+(?:[0-9] ?){6,14}[0-9]$/','nullable','max:16'],
		];

		$messages =[
			'first_name.required' => 'Please enter first name.',
			'first_name.regex' => 'Please enter valid first name.',
			'first_name.max' => 'Please enter valid first name.',
			'last_name.regex' => 'Please enter valid last name.',
			'last_name.max' => 'Please enter valid last name.',
			'email.required' => 'Please enter email address.',
			'email.email' => 'Please enter valid email address.',
			'email.max' => 'Please enter valid email address.',
			'email.unique' => 'This email is already registered.',
			'phone_number.regex' => 'Please enter valid phone number.',
			'phone_number.max' => 'Please enter valid phone number.',
		];

		$this->validate($request, $rules, $messages);

		$userDetails = User::updateUserDetail($request->all());
		return redirect()->route('admin.users')->with('userDetails',$userDetails)
		->with('success','User has been updated successfully.');
	}

	/**
     * This function is used to get user listing
     *
     */
	public function getUserList(Request $request)
	{
		if ($request->ajax()) {
			
			$data = User::all();
			return Datatables::of($data)
			->addIndexColumn()
			->editColumn('date_of_birth', function ($user) 
			{
				return !empty( $user->date_of_birth ) ? date('d-m-Y', strtotime($user->date_of_birth) ) : '';
			})
			->editColumn('last_login', function ($user) 
			{
				return !empty( $user->last_login ) ? date('d M, Y h:i A', strtotime($user->last_login) ) : 'Never logged in';
			})
			->editColumn('is_active', function ($user) 
			{
				return !empty( $user->is_active ) ? '<span class="btn-sm bg-success">Active</span>' : '<span class="btn-sm bg-danger">Inactive</span>';
			})
			->addColumn('action', function($row){
				return '<a href="'.route('admin.edit.user',[Crypt::encrypt($row->id)]).'" class="btn btn-primary btn-sm"><i class="fa fa-user-edit"></i> Edit</a>';
			})
			->rawColumns(['action','is_active'])
			->make(true);
		}	
	}
}
