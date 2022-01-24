<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostTagController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['user_online'])->group(function() {
    Route::get('/', [MainController::class, 'index'])
        ->name('home');
    Route::get('/about', [MainController::class, 'about'])
        ->name('about');
//Route::get('/apply', [MainController::class, 'apply'])
//    ->name('apply');

    Route::get('/contacts', [MainController::class, 'contacts'])
        ->name('contacts');

    /*
     * blog
     */
    Route::get('/blog', [BlogController::class, 'index'])
        ->name('blog.index');
    /*
     * post creating, editing and deleting
     */
    Route::middleware(['auth'])->group(function() {
        Route::get('/blog/create', [BlogController::class, 'create'])
            ->name('blog.create');
        Route::post('/blog', [BlogController::class, 'store'])
            ->name('blog.store');
        Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])
            ->name('blog.edit');
    });

    Route::get('/blog/{post}', [BlogController::class, 'show'])
        ->name('blog.show');


    Route::get('/search', [MainController::class, 'search'])
        ->name('search');
    Route::get('/search/{service}', [MainController::class, 'searchMasters'])
        ->name('search.masters');


    Route::middleware('guest')->group(function() {
        /*
         * reset password
         */
        Route::get('/forgot-password', [UserController::class, 'passwordRequest'])
            ->name('password.request');
        Route::post('/forgot-password', [UserController::class, 'passwordEmail'])
            ->name('password.email');

        Route::get('/reset-password/{token}/', [UserController::class, 'passwordReset'])
            ->name('password.reset');
        Route::post('/reset-password', [UserController::class, 'passwordUpdate'])
            ->name('password.update');

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


    Route::middleware('auth')->group(function() {
        /*
         * logout
         */
        Route::get('/logout', [UserController::class, 'logout'])
            ->name('logout');

        /*
         * application creating
         */
        Route::get('/applications/create', [ApplicationController::class, 'create'])
            ->name('applications.create');


        Route::middleware('master')->group(function() {
            Route::get('/applications', [ApplicationController::class, 'index'])
                ->name('applications.index');
            Route::get('/applications/{application}', [ApplicationController::class, 'show'])
                ->name('applications.show');
            Route::get('/applications/{application}/offer/create', [OfferController::class, 'create'])
                ->name('applications.offer.create');
            Route::post('/applications/{application}/offer/create', [OfferController::class, 'store'])
                ->name('applications.offer.store');
        });

        Route::post('/applications', [ApplicationController::class, 'store'])
            ->name('applications.store');
        Route::get('/application/created', [ApplicationController::class, 'applicationCreated'])
            ->name('application.created');
        Route::get('/application/not-master', [ApplicationController::class, 'notMaster'])
            ->name('application.not-master');
        Route::post('/applications/services', [ApplicationController::class, 'getServices']);

        Route::get('/profiles/{profile}', [ProfileController::class, 'show'])
            ->name('profiles.show');
        Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])
            ->name('profiles.edit');
        Route::put('/profiles/{profile}', [ProfileController::class, 'update'])
            ->name('profiles.update');
        Route::post('/profiles/services', [ProfileController::class, 'getServices']);
    });
});


/*
 * admin routes
 */
Route::prefix('admin')->name('admin.')->middleware('admin')
    ->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resources([
            '/categories' => CategoryController::class,
            '/posts' => PostController::class,
            '/post-categories' => PostCategoryController::class,
            '/post-tags' => PostTagController::class,
            '/services' => ServiceController::class,
            '/settings' => SettingController::class
        ]);
    });