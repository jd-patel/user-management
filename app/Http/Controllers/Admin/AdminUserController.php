<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use DataTables;
use App\Models\Admin\AdminUser;

class AdminUserController extends Controller
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
     * This function is used to display admin user listing
     *
     */
	public function showUserList(){
		return view('admin.admin_users.index');
	}

	/**
     * This function is used to display create form
     *
     */
	public function showCreateUser(Request $request){

		return view('admin.admin_users.create');
	}

	/**
     * This function is used to store admin user 
     *
     */
	public function createUser(Request $request){
		
		$rules = [
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:admin_users,email'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		];

		$messages =[
			'first_name.required' => 'Please enter first name.',
			'first_name.string' => 'Please enter valid first name.',
			'first_name.max' => 'Please enter valid first name.',
			'last_name.string' => 'Please enter valid last name.',
			'last_name.max' => 'Please enter valid last name.',
			'email.required' => 'Please enter email address.',
			'email.email' => 'Please enter valid email address.',
			'email.max' => 'Please enter valid email address.',
			'email.unique' => 'This email is already registered.',
			'password.required' => 'Please enter password.',
            'password.min' => 'Password should be min 8 character.',
            'password.confirmed' => 'Password does not match.',
		];

		$this->validate($request, $rules, $messages);

		if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.backend.users')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}

		$userDetails = AdminUser::storeUserDetail($request->all());
		return redirect()->route('admin.backend.users')
		->with('success','User has been created successfully.');
	}

	/**
     * This function is used to display edit admin user page
     *
     */
	public function editUserDetails(Request $request, $encrypted_userID){
		
		$userID			= !empty( $encrypted_userID ) ? Crypt::decrypt($encrypted_userID) : '';
		$userDetails	= AdminUser::find($userID);

		return view('admin.admin_users.edit')
		->with('userID',$encrypted_userID)
		->with('userDetails',$userDetails);
	}

	/**
     * This function is used to update admin user details
     *
     */
	public function updateUserDetails(Request $request){
		
		$rules = [
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:admin_users,email,'.Crypt::decrypt($request->userID)],
		];

		$messages =[
			'first_name.required' => 'Please enter first name.',
			'first_name.string' => 'Please enter valid first name.',
			'first_name.max' => 'Please enter valid first name.',
			'last_name.string' => 'Please enter valid last name.',
			'last_name.max' => 'Please enter valid last name.',
			'email.required' => 'Please enter email address.',
			'email.email' => 'Please enter valid email address.',
			'email.max' => 'Please enter valid email address.',
			'email.unique' => 'This email is already registered.',
		];

		$this->validate($request, $rules, $messages);

		if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.backend.users')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}
		
		$userDetails = AdminUser::storeUserDetail($request->all());
		return redirect()->route('admin.backend.users')->with('userDetails',$userDetails)
		->with('success','User has been updated successfully.');
	}

	/**
     * This function is used to update admin user details
     *
     */
	public function updateUserPassword(Request $request){
		
		$rules = [
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		];

		$messages =[
			'password.required' => 'Please enter password.',
            'password.min' => 'Password should be min 8 character.',
            'password.confirmed' => 'Password does not match.',
		];

		$this->validate($request, $rules, $messages);

		if( env('APP_VERSION') == 'DEMO' ){
			return redirect()->route('admin.backend.users')
			->with('error','Sorry! The feature is disabled for demo version.');	
		}
		
		$userDetails = AdminUser::updateUserPassword($request->all());
		return redirect()->route('admin.backend.users')->with('userDetails',$userDetails)
		->with('success','Password has been updated successfully.');
	}

	/**
     * This function is used to get admin users list
     *
     */
	public function getUserList(Request $request)
	{
		if ($request->ajax()) {
			
			$data = AdminUser::all();
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function($row) use($data){
					if($row->id == 1 || count($data) == 1) {
						return '<a title="Edit User" href="'.route('admin.edit.backend.user',[Crypt::encrypt($row->id)]).'" class="btn btn-primary btn-sm"><i class="fa fa-user-edit"></i> Edit </a>';
					}else{
						return '<a title="Edit User" href="'.route('admin.edit.backend.user',[Crypt::encrypt($row->id)]).'" class="btn btn-primary btn-sm"><i class="fa fa-user-edit"></i> Edit </a>
						<a title="Delete User" href="#" attr-id="'.Crypt::encrypt($row->id).'" class="btn btn-danger btn-sm delete-user"><i class="fa fa-trash-alt"></i> Delete</a>';
					}
				})
				->rawColumns(['action'])
				->make(true);
		}	
	}

	/**
     * This function is used to delete admin user
     *
     */
	public function deleteUser(Request $request)
	{	
		if( env('APP_VERSION') == 'DEMO' ){
			return 3;
		}
		return AdminUser::deleteUser($request->all());
	}
}