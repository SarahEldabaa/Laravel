<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->where('user', '[0-9]+');

Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('posts', PostController::class);

// Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');

// Route::post('login', [AuthController::class, 'login'])->name('login');

// Route::get("register", [AuthController::class, 'registerForm'])->name('registerForm');

// Route::post("register", [AuthController::class, 'register'])->name('register');

// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return redirect('/');
});
