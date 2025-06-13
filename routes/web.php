<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('signin', 'AuthController@login')->name('signin');
Route::post('signup', 'AuthController@register')->name('signup');
Route::middleware('auth')->get('/dashboard', function () {
    return view('users.dashboard', ['user' => auth()->user()]);
})->name('dashboard');
//Endpoint que sirve para ver los datos del usuario Logueado
Route::middleware('auth')->get('/me', function () {
    return view('users.profile', ['user' => auth()->user()]);
});
// Solo se puede acceder al token JWT por web.php al manejar las sessiones de usuario
/* Route::middleware('auth')->get('/api/me', function (Request $request) {
    return response()->json([
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
    ]);
}); */