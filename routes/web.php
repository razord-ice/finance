<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([
    'prefix' => '/',
    'as' => '',
    ], function () {
        Route::get('/', [AuthController::class, 'index']);
        Route::get('login', [AuthController::class, 'index']);
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix' => '/error',
    'as' => '',
    ], function () {
        Route::get('/', [ErrorController::class, 'index']);
});

Route::group([
    'middleware' => ['auth'],
    'prefix' => '/dashboard',
    'as' => 'dashboard',
    ], function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::post('/', [DashboardController::class, 'save'])->name('.save');
        Route::get('/add', [DashboardController::class, 'addOrUpdate'])->name('.add');
        Route::get('/edit/{id}', [DashboardController::class, 'addOrUpdate'])->name('.edit');
        Route::get('/delete/{id}', [DashboardController::class, 'delete'])->name('.delete');
});