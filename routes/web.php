<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Headcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/welcome', function () {
    return view('welcome');
})->name('/index');


Route::get('/', function () {
    return view('Layout.index');
})->name('/index');

Route::group([], function () {
    Route::get('/index', [Headcontroller::class, 'index'])->name('/homepage');
    Route::get('/about_us', [Headcontroller::class, 'About'])->name('/About_page');
    Route::get('/privacy_policy', [Headcontroller::class, 'privacy'])->name('/privacy_page');
    Route::get('/contact_us', [Headcontroller::class, 'Contact'])->name('/contact_page');
    Route::post('contactdata', [AdminController::class, 'contact'])->name('admin.contact');

});

// Route::get('/redirects',[HomeController::class,"index"]);

Auth::routes([
    'verify' => true
]);

//For User
Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('moj', function () {
        echo 'this is a moj';
    });
    Route::get('Profile_user', [UserController::class, 'user_profile'])->name('user.profile');
    Route::post('change_post', [UserController::class, 'user_profile_post'])->name('user.post_profile');
    Route::get('User_changepassword', [UserController::class, 'change_password'])->name('change_pass');
    Route::post('Change_pass_post', [UserController::class, 'change_password_post'])->name('user.change-pass');
    Route::post('order', [UserController::class, 'order'])->name('user.order');

});

//For Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('8754', function () {
        echo 'this is a first';
    });
    Route::get('Profile_admin', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('change_post', [AdminController::class, 'admin_profile_post'])->name('admin.post_profile');
    Route::get('Admin_changepassword', [AdminController::class, 'change_password'])->name('admin.change_pass');
    Route::post('Change_pass_post', [AdminController::class, 'change_password_post'])->name('admin.change-pass-post');
    Route::get('adminusers', [AdminController::class, 'index'])->name('/admin_user');
    Route::get('contact_data', [AdminController::class, 'contactdata'])->name('/contact');
    Route::get('delete/{id}', [AdminController::class, 'delete']);
    Route::get('deletecon/{id}', [AdminController::class, 'deletecon']);
    Route::get('edit/{id}', [AdminController::class, 'edit']);
    Route::get('order_data', [AdminController::class, 'order'])->name('/order');

    
});

Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified', 'is_active');


// Route::group(['as' => 'cms.', 'prefix' => 'cms', 'middleware' => 'auth'], function () {
//     Route::controller(CmsPagecontroller::class)->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::post('/store', 'store')->name('store');
//         Route::get('/edit/{id}', 'edit')->name('edit');
//         Route::post('/datatable', 'datatable')->name('datatable');
//         Route::post('/destroy', 'destroy')->name('destroy');
//     });
// });
