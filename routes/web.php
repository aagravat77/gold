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
});


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
    //profile
    Route::get('Profile_user', [UserController::class, 'user_profile'])->name('User/profile_user');
    Route::post('change_post_user', [UserController::class, 'user_profile_post'])->name('edituser_post');
    //password
    Route::get('User_changepassword', [UserController::class, 'change_password'])->name('change_pass');
    Route::post('Change_pass_post_user', [UserController::class, 'change_password_post'])->name('user.change-pass');
    Route::post('party_detail', [UserController::class, 'party_detail'])->name('user.party_detail');
    Route::view('user_after_party_wait','User.user_after_party');
    Route::view('user_party', 'User.user_company');
    Route::view('user_party_done', 'User.user_after_party_done');
    Route::post('order_form_', [UserController::class, 'order'])->name('user.order');
    Route::get('user_order_form', [UserController::class, 'order_form'])->name('user.order_form');
    Route::get('user_order_data', [UserController::class, 'order_data'])->name('user.order_data');

    Route::get('pdf_view/{id}', [UserController::class, 'pdf_view'])->name('user.order_data_pdf');
    Route::get('payment/{id}', [UserController::class, 'payment'])->name('user.payment');
    Route::post('payment_post', [UserController::class, 'payment_post'])->name('user.payment_post');
    Route::get('user_pay_data', [UserController::class, 'pay_data'])->name('user.party_data');
    
    Route::get('pdf_payment/{id}', [UserController::class, 'Payment_view_user'])->name('user.order_data_pdf');









});

//For Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    
    Route::get('Profile_admin', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('change_post_admin_profile', [AdminController::class, 'admin_profile_post'])->name('admin.post_profile');


    Route::post('change_post_user_data', [AdminController::class, 'admin_user_profile_post'])->name('admin.post_user_profile');

    Route::get('Admin_changepassword', [AdminController::class, 'change_password'])->name('admin.change_pass');
    Route::post('Change_pass_post', [AdminController::class, 'change_password_post'])->name('admin.change-pass-post');
    Route::get('adminusers', [AdminController::class, 'index'])->name('/admin_user');
    Route::get('contact_data', [AdminController::class, 'contactdata'])->name('/contact');
    Route::get('party_data_show', [AdminController::class, 'party_show'])->name('/party_data');
    Route::get('approve_party/{id}', [AdminController::class, 'party_approve']);
    Route::get('edit_party/{id}', [AdminController::class, 'edit_party'])->name('party_edit');
    Route::post('edit_party_post', [AdminController::class, 'edit_party_post'])->name('admin.party_edit');


    Route::get('party_delete/{id}', [AdminController::class, 'party_delete']);

    Route::get('delete/{id}', [AdminController::class, 'delete']);
    Route::get('deletecon/{id}', [AdminController::class, 'deletecon']);
    Route::get('edit/{id}', [AdminController::class, 'edit']);
    Route::get('order_data', [AdminController::class, 'order'])->name('/order');
    Route::get('edit_order/{id}', [AdminController::class, 'edit_order'])->name('order_edit');
    Route::get('order_done/{id}', [AdminController::class, 'order_done'])->name('order_done');
    Route::post('order_done_edit', [AdminController::class, 'order_done_post'])->name('admin.order_edit_done');

    Route::post('edit_order_post', [AdminController::class, 'edit_order_post'])->name('admin.order_edit');

    Route::get('delete_order/{id}', [AdminController::class, 'order_delete']);

    Route::get('payment_data', [AdminController::class, 'payment'])->name('/payment');


    Route::get('excel_user', [AdminController::class, 'getExcelUser'])->name('admin_download_user');
    Route::get('excel_contact', [AdminController::class, 'getExcelContact'])->name('admin_download_contact');
    Route::get('excel_party', [AdminController::class, 'getExcelParty'])->name('admin_download_party');
    Route::get('excel_order', [AdminController::class, 'getExcelOrder'])->name('admin_download_order');


    Route::get('pdf_view_admin/{id}', [AdminController::class, 'pdf_view'])->name('admin.order_data_pdf');

    Route::get('/action', [AdminController::class, 'action'])->name('action');
    Route::get('option_active', [AdminController::class, 'active_option'])->name('Aactive_op');







    
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
