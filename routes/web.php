<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


//Google URL
Route::prefix('google')->name('google.')->group( function (){
    Route::get('login', [\App\Http\Controllers\GoogleController::class,
        'loginWithGoogle'])->name('login');
    Route::any('callback', [\App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])
        ->name('callback');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

    //Work with Billing
    Route::get('billing', [\App\Http\Controllers\BillingController::class ,'index'])
        ->name('billing');

    Route::post('/billing', [\App\Http\Controllers\BillingController::class, 'store'])
        ->name('billing.store');

    Route::get('/billing/{id}/edit', [\App\Http\Controllers\BillingController::class, 'edit'])
        ->name('billing.edit');

    Route::put('/billing/{id}', [\App\Http\Controllers\BillingController::class, 'update'])
        ->name('billing.update');

    Route::delete('/billing/{id}', [\App\Http\Controllers\BillingController::class, 'destroy'])
        ->name('billing.destroy');


    //Work with Profile
    Route::get('profile', function () {
		return view('profile');
	})->name('profile');


    //Work with Rtl
	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');


    //Work with User-management
    Route::get('user-management', [UserController::class ,'index'])->name('user-management');

    Route::post('/user-management', [UserController::class, 'store'])
        ->name('user-management.store');

    Route::get('/user-view/{id}', [UserController::class, 'view'])
        ->name('user-view');

    Route::get('/user-management/{id}/edit', [UserController::class, 'edit'])
        ->name('user-management.edit');

    Route::put('/user-management/{id}', [UserController::class, 'update'])
        ->name('user-management.update');

    Route::delete('/user-management/{id}', [UserController::class, 'destroy'])
        ->name('user-management.destroy');


        //Work with Task
    Route::get('tables', [\App\Http\Controllers\TaskController::class, 'index'])
        ->name('tables.index');

    Route::post('/tables', [\App\Http\Controllers\TaskController::class, 'store'])
        ->name('tables.store');

    Route::get('/tables/{id}/edit', [\App\Http\Controllers\TaskController::class, 'edit'])
        ->name('tables.edit');

    Route::put('/tables/{id}', [\App\Http\Controllers\TaskController::class, 'update'])
        ->name('tables.update');

    Route::delete('/tables/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])
        ->name('tables.destroy');


        //Work with Status
    Route::get('/status', [\App\Http\Controllers\StatusController::class, 'index'])
        ->name('status');

    Route::post('/status', [\App\Http\Controllers\StatusController::class, 'store'])
        ->name('status.store');

    Route::put('/status/{id}', [\App\Http\Controllers\StatusController::class, 'update'])
        ->name('status.update');

    Route::delete('/status/{id}', [\App\Http\Controllers\StatusController::class, 'destroy'])
        ->name('status.destroy');


    //Work with Comments
    Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index'])
        ->name('comments');

    Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])
        ->name('comments.store');

    Route::put('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'update'])
        ->name('comments.update');

    Route::delete('/comments/{id}', [\App\Http\Controllers\CommentController::class, 'destroy'])
        ->name('comments.destroy');


    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});



Route::get('/login', function () {
    return view('session/login-session');
})->name('login');



