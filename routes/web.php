<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ConferenceAdminController;
use App\Http\Controllers\PaperController;

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

Route::get('admin-dashboard/{id}', [SideNavController::class, 'adminsidenav']);

Route::get('co-adminlogin', [ConferenceAdminController::class, 'conferenceadminlogin']);
Route::post('store-coadminlogin', [ConferenceAdminController::class, 'store_coadminlogin']);

Route::get('login', [AuthController::class, 'login']);
Route::post('store-login', [AuthController::class, 'storelogin']);

Route::get('reviewer-login', [ReviewerController::class, 'login']);
Route::post('store-reviewerlogin', [ReviewerController::class, 'storelogin']);

Route::get('user-register', [AuthController::class, 'userregister']);
Route::post('store-user', [AuthController::class, 'storeuser']);

Route::get('user-login', [AuthController::class, 'userlogin']);
Route::post('store-userlogin', [AuthController::class, 'storeuserlogin']);

//Route::get('home-conference', [ConferenceController::class, 'viewconference']);
Route::get('question', [ConferenceController::class, 'question']);

Route::middleware(['AdminLoggedIn'])->group(function () {

    Route::get('superadmin-dashboard', [DashboardController::class, 'superadmindashboard']);

    Route::get('register', [AuthController::class, 'register']);
    Route::post('store-register', [AuthController::class, 'storeregister']);
    Route::get('superadmin-profile', [AdminController::class, 'superadmin_profile']);
    Route::get('edit-admin/{id}', [AdminController::class, 'editadmin']);
    Route::post('update-admin/{id}', [AdminController::class, 'updateadmin']);
    Route::get('delete-admin/{id}', [AdminController::class, 'deleteadmin']);

    Route::get('registered-user', [AuthController::class, 'registereduser']);
    Route::get('pending-user', [AuthController::class, 'pendinguser']);
    Route::get('accept-user/{id}', [AuthController::class, 'acceptuser']);
    Route::get('edit-user/{id}', [AuthController::class, 'edituser']);
    Route::post('update-user/{id}', [AuthController::class, 'updateuser']);
    Route::get('delete-user/{id}', [AuthController::class, 'deleteuser']);

    Route::get('conference-admin-register', [ConferenceAdminController::class, 'conference_adminregister']);
    Route::post('storeconference-adminregister', [ConferenceAdminController::class, 'storeconference_adminregister']);
    Route::get('all-coadmin', [ConferenceAdminController::class, 'all_coadmin']);
    Route::get('edit-coadmin/{id}', [ConferenceAdminController::class, 'editcoadmin']);
    Route::post('update-coadmin/{id}', [ConferenceAdminController::class, 'updatecoadmin']);
    Route::get('delete-coadmin/{id}', [ConferenceAdminController::class, 'deletecoadmin']);
});

Route::middleware(['ConferenceAdminLoggedIn'])->group(function () {
    Route::get('admin-dashboard/{id}', [DashboardController::class, 'admindashboard']);

    Route::get('create-conference/{id}', [ConferenceController::class, 'create']);
    Route::post('store-conference', [ConferenceController::class, 'store']);
    Route::get('conference/{id}', [ConferenceController::class, 'all']);
    Route::get('edit-conference/{id}', [ConferenceController::class, 'edit']);
    Route::post('update-conference/{id}', [ConferenceController::class, 'update']);
    Route::get('delete-conference/{id}', [ConferenceController::class, 'delete']);
    Route::get('add-scopes/{id}', [ConferenceController::class, 'addscopes']);
    Route::post('store-scopes', [ConferenceController::class, 'store_scopes']);
    Route::get('conference-details/{id}', [ConferenceController::class, 'viewconference']);

    //Route::post('store-user', [AuthController::class, 'storeuser']);

    Route::get('reviewer-form/{id}', [ReviewerController::class, 'register_reviewer']);
    Route::post('store-input-fields', [ReviewerController::class, 'store']);
    Route::get('registered-reviewers/{id}', [ReviewerController::class, 'all_reviewers']);
    Route::get('edit-reviewer/{id}', [ReviewerController::class, 'edit']);
    Route::post('update-reviewer/{id}', [ReviewerController::class, 'update']);
    Route::get('delete-reviewer/{id}/{conference_id}', [ReviewerController::class, 'delete'])->name('delete');

    Route::get('paper-details/{id}', [PaperController::class, 'paperdetails']);
    Route::get('conference-paper/{id}', [PaperController::class, 'show']);
    Route::get('download/{file}', [PaperController::class, 'download']);
    Route::get('view/{id}', [PaperController::class, 'view']);
    Route::get('show-review/{id}', [PaperController::class, 'showreview']);
    Route::get('see-review/{id}', [PaperController::class, 'seereview']);
});

Route::middleware(['AuthorLoggedIn'])->group(function () {

    Route::get('author-dashboard', [DashboardController::class, 'authordashboard']);
    Route::get('conference-description/{id}', [ConferenceController::class, 'description_author']);
    
    Route::get('upload-papers/{id}', [PaperController::class, 'uploadpapers']);
    Route::post('store-papers', [PaperController::class, 'storepapers']);
    /*Route::get('submitted-papers', [PaperController::class, 'submittedpapers']);
    Route::get('author-view/{id}', [PaperController::class, 'authorview']);*/
});

Route::middleware(['ReviewerLoggedIn'])->group(function () {

    Route::get('reviewer-dashboard/{id}', [DashboardController::class, 'reviewerdashboard']);
    Route::get('paper-description/{id}', [PaperController::class, 'paperdescription']);
    Route::get('reviewer-view/{id}', [PaperController::class, 'reviewerview']);
    
    Route::get('reviewer-paper-review/{id}', [PaperController::class, 'paperreview']);
    Route::post('store-review', [PaperController::class, 'storereview']);
    Route::get('show-my-review/{id}', [PaperController::class, 'myreview']);
});
