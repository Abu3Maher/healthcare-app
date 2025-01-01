<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/service', function () {
    return view('service');
})->name('service');


Route::get('/login', function () {
    return view('auth.login');
})->name('login.view');

Route::post('/login', LoginController::class)->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register.view');
