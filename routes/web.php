<?php

use App\Http\Controllers\MainController;
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

/*
 * admin routes
 */
//Route::prefix('admin')->name('admin.')->middleware('admin')
//    ->group(function() {
//
//    });