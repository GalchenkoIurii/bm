<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])
    ->name('home');
Route::get('/about', [MainController::class, 'about'])
    ->name('about');
Route::get('/apply', [MainController::class, 'apply'])
    ->name('apply');
Route::get('/contacts', [MainController::class, 'contacts'])
    ->name('contacts');
Route::get('/search', [MainController::class, 'search'])
    ->name('search');


Route::middleware('guest')->group(function() {
    /*
     * register, login
     */
    Route::get('/register', [UserController::class, 'create'])
        ->name('register.create');
    Route::post('/register', [UserController::class, 'store'])
        ->name('register.store');

    Route::get('/login', [UserController::class, 'loginForm'])
        ->name('login.create');
    Route::post('/login', [UserController::class, 'login'])
        ->name('login');
});

    /*
     * logout
     */
Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout')->middleware('auth');


/*
 * admin routes
 */
Route::prefix('admin')->name('admin.')->middleware('admin')
    ->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resources([
            '/categories' => CategoryController::class,
            '/services' => ServiceController::class,
            '/settings' => SettingController::class
        ]);
    });