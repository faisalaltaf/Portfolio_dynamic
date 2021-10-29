<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserfrontendController;
use App\Http\Controllers\Header_create_dataController;
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

// Auth::routes();
Route::get('/', function () {
    return view('dashboard.user.login');
});


// Route::domain('{account}.portfolioprofile.test')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });

// Route::get('/', function () {
//     return 'First sub domain';
// })->domain('blog.' . env('APP_URL'));

// user name 

// ===============================================================================================
//================ // frontend work  ///================================================================
// ===============================================================================================
Route::get('/{any}','UserfrontendController@index');

// ===============================================================================================
//================ disable route ///================================================================
// ===============================================================================================
Route::group(['domain' => '{domain}.portfolioprofile.test'], function() {
    return "hello";
});
Auth::routes(['register' => false, 'login' => false]);

// ===============================================================================================
//================users route ///================================================================
// ===============================================================================================
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {

        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        // patient 
        Route::post('/create', [UserController::class, 'create'])->name('create');
        // pateint 
        Route::view('/register', 'dashboard.user.register')->name('register');
    });
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {

        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::view('/profile', 'dashboard.user.profile')->name('profile');

// datainsert header section footer ///==============================
     Route::get('/header_create',[Header_create_dataController::class,'index'] )->name('header_create');
     Route::post('/header_create_data', [Header_create_dataController::class,'create'])->name('header_create_data');

    });
});
// ===============================================================================================
//================ admin route ///================================================================
// ===============================================================================================

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logut', [AdminController::class, 'logout'])->name('logout');
        Route::view('/profile', 'dashboard.admin.profile')->name('profile');
        Route::get('/pateintshowdata', [AdminController::class, 'show'])->name('showpateintdata');


        // doctor 
        // Route::view('doctor/register','dashboard.doctor.register')->name('register1');
        // end 

    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
