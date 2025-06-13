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
//**Endpoint que sirve para ver los datos del usuario Logueado
Route::middleware('auth')->get('/me', function () {
    return view('users.profile', ['user' => auth()->user()]);
});
// Enpoint modo API solo se puede acceder al token JWT por web.php al manejar las sessiones de usuario
Route::middleware('auth')->get('/api/me', function (Request $request) {
    return response()->json([
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
    ]);
});
// Rutas protegidas con Millaware
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('users.dashboard', ['user' => auth()->user()]);
    })->name('dashboard');

    Route::get('/personas', function () {
        return view('users.personas', ['user' => auth()->user()]);
    })->name('personas');

    Route::post('send-persona', 'PersonasController@create')->name('send-persona');

    Route::get('/edit-persona/{id}', function ($id) {
        return view('users.edit-persona', array_merge(
            compact('id'),
            ['user' => auth()->user()]
        ));
    })->name('edit-persona');

    Route::put('edit-1persona', 'PersonasController@edit')->name('edit-1persona');

    Route::delete('delete-persona/{id}', 'PersonasController@delete')->name('delete-persona');

});
Route::get('/mascotas', function () {
    return view('users.mascotas');
})->name('mascotas');
Route::post('send-mascota', 'MascotasController@create')->name('send-mascota');
Route::get('/edit-mascota/{id}', function ($id) {
    return view('users.edit-mascota', compact('id'));
})->name('edit-mascota');
Route::put('edit-1mascota', 'MascotasController@edit')->name('edit-1mascota');
Route::delete('delete-mascota/{id}', 'MascotasController@delete')->name('delete-mascota');
Route::get('/mascotas-persona/{id}', function ($id) {
    return view('users.mascotas-persona', compact('id'));
})->name('mascotas-persona');
