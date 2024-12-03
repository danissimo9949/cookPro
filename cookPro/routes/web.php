<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', function () {
    Auth::logout();
    session()->flush();
    return redirect('/');
})->name('logout');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
Route::post('/blog/create', [PostController::class, 'store'])->name('blog.store');
Route::get('/blog/post/{id}', [PostController::class, 'show'])->name('blog.show');