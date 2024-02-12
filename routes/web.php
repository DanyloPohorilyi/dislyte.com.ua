<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\EsperController;
use App\Http\Controllers\EsperGalleryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManagerController;
use App\Models\Element;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticationMiddleware;

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

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('adminIndex')->middleware(AuthenticationMiddleware::class);
    Route::resource('elements', ElementController::class)->middleware(AuthenticationMiddleware::class);
    Route::resource('equipment', EquipmentController::class)->middleware(AuthenticationMiddleware::class);
    Route::resource('espers', EsperController::class)->middleware(AuthenticationMiddleware::class);
    Route::resource('users', UserController::class)->middleware(AuthenticationMiddleware::class);
    Route::resource('managers', ManagerController::class)->middleware(AuthenticationMiddleware::class);
    Route::get('/search', [SearchController::class, 'search'])->name('search')->middleware(AuthenticationMiddleware::class);
    Route::get('/signOut', [AuthController::class, 'signOut'])->name('signOut')->middleware(AuthenticationMiddleware::class);
});
Route::post('/addUser', [AuthController::class, 'addUser'])->name('addUser');
Route::post('/checkUser', [AuthController::class, 'checkUser'])->name('checkUser');
Route::get('/log-in', [AuthController::class, 'logIn'])->name('logIn');
Route::get('/sign-in', [AuthController::class, 'signIn'])->name('signIn');
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/about', [MainController::class, 'aboutUs'])->name('aboutUs');
Route::resource('espers-gallery', EsperGalleryController::class);
Route::fallback([ErrorController::class, 'handle404']);
