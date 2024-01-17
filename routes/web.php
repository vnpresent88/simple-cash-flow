<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('plogin');
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('pregister');