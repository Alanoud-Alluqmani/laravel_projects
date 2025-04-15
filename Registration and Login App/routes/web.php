<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

//Route for displaying the login page, using GET request named login
Route::get('login', [AuthController::class, 'index'])->name('login');

//Route for processing the login form submission, using POST request named login.post
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

//Route for displaying the registration page, using GET request named register
Route::get('registration', [AuthController::class, 'registration'])->name('register');

//Route for processing the registration form submission, using POST request named register.post
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

//Route for displaying the dashboard page, using GET request
Route::get('dashboard', [AuthController::class, 'dashboard']);

//Route for logging out the user, using GET request named logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');