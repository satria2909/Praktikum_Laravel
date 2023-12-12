<?php

use App\Http\Controllers\Controller1;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create',[Controller1::class,'create']);
    Route::post('/save',[Controller1::class,'save']);

    Route::get('/read',[Controller1::class,'read']);
    Route::get('/update/{nim}',[Controller1::class,'update']);
    Route::post('/edit',[Controller1::class,'edit']);

    Route::get('/delete/{nim}',[Controller1::class,'delete']);

    Route::get('/view',[Controller1::class,'view']);

    Route::get('/tampil1',[Controller1::class,'tampil1']);
    Route::get('/tampilkan',[Controller1::class,'tampilkan']);
});

Route::get('/logout',[Controller1::class,'logout']);

require __DIR__.'/auth.php';


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('mahasiswas')->name('mahasiswas/')->group(static function() {
            Route::get('/',                                             'MahasiswaController@index')->name('index');
            Route::get('/create',                                       'MahasiswaController@create')->name('create');
            Route::post('/',                                            'MahasiswaController@store')->name('store');
            Route::get('/{mahasiswa}/edit',                             'MahasiswaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MahasiswaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mahasiswa}',                                 'MahasiswaController@update')->name('update');
            Route::delete('/{mahasiswa}',                               'MahasiswaController@destroy')->name('destroy');
        });
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
