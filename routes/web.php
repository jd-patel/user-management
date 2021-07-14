<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Frontend Routes
Auth::routes();
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:web');
Route::get('auth/{provider}', [App\Http\Controllers\SocialController::class, 'redirect'])->name('social.redirect');
Route::get('auth/{provider}/callback', [App\Http\Controllers\SocialController::class, 'callBack'])->name('social.callback');
// Frontend Routes

// Admin Routes
Route::prefix('admin')->group(function () {
	
	// Auth Routes
	Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
	Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

	// Dashboard Routes
	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'showDashboard'])->name('admin.home')->middleware('auth:admin');
	Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'showDashboard'])->name('admin.dashboard')->middleware('auth:admin');

	// Admin Users Route
	Route::get('/backend/users', [App\Http\Controllers\Admin\AdminUserController::class, 'showUserList'])->name('admin.backend.users')->middleware('auth:admin');
	Route::get('/backend/get/users', [App\Http\Controllers\Admin\AdminUserController::class, 'getUserList'])->name('admin.get.backend.users')->middleware('auth:admin');
	Route::get('/backend/create/user', [App\Http\Controllers\Admin\AdminUserController::class, 'showCreateUser'])->name('admin.create.backend.user.show')->middleware('auth:admin');
	Route::post('/backend/create/user', [App\Http\Controllers\Admin\AdminUserController::class, 'createUser'])->name('admin.create.backend.user')->middleware('auth:admin');
	Route::get('/backend/edit/user/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'editUserDetails'])->name('admin.edit.backend.user')->middleware('auth:admin');
	Route::post('/backend/update/user', [App\Http\Controllers\Admin\AdminUserController::class, 'updateUserDetails'])->name('admin.update.backend.user')->middleware('auth:admin');
	Route::post('/backend/update/user/password', [App\Http\Controllers\Admin\AdminUserController::class, 'updateUserPassword'])->name('admin.update.password')->middleware('auth:admin');
	Route::post('/backend/delete/user', [App\Http\Controllers\Admin\AdminUserController::class, 'deleteUser'])->name('admin.delete.backend.user')->middleware('auth:admin');

	// Frontend Users Route
	Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'showUserList'])->name('admin.users')->middleware('auth:admin');
	Route::get('/get/users', [App\Http\Controllers\Admin\UserController::class, 'getUserList'])->name('admin.get.users')->middleware('auth:admin');
	Route::get('/edit/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'editUserDetails'])->name('admin.edit.user')->middleware('auth:admin');
	Route::post('/update/user', [App\Http\Controllers\Admin\UserController::class, 'updateUserDetails'])->name('admin.update.user')->middleware('auth:admin');
	
	//Settings
	Route::get('/social/settings', [App\Http\Controllers\Admin\SocialController::class, 'showSettings'])->name('admin.socialsettings')->middleware('auth:admin');
	Route::post('/social/settings/update', [App\Http\Controllers\Admin\SocialController::class, 'updateSocialSettings'])->name('admin.socialsettings.update')->middleware('auth:admin');
	Route::get('/social/settings/get', [App\Http\Controllers\Admin\SocialController::class, 'getSocialSettings'])->name('admin.socialsettings.get')->middleware('auth:admin');
	
	Route::get('/email/settings', [App\Http\Controllers\Admin\SettingsController::class, 'showEmailSettings'])->name('admin.email.settings')->middleware('auth:admin');
	Route::post('/email/settings/update', [App\Http\Controllers\Admin\SettingsController::class, 'updateEmailSettings'])->name('admin.email.settings.update')->middleware('auth:admin');

	Route::get('/general/settings', [App\Http\Controllers\Admin\SettingsController::class, 'showGeneralSettings'])->name('admin.general.settings')->middleware('auth:admin');
	Route::post('/general/settings/update', [App\Http\Controllers\Admin\SettingsController::class, 'updateGeneralSettings'])->name('admin.general.settings.update')->middleware('auth:admin');


});
// Admin Routes