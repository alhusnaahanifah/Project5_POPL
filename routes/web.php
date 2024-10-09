<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmintalkController;

//rute untuk user
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/talks/create', [TalkController::class, 'create'])->name('talks.create');
Route::get('/talks', [TalkController::class, 'index'])->name('talks.index');
Route::post('/talks', [TalkController::class, 'save'])->name('talks.save');
Route::get('/mytalks', [TalkController::class, 'myTalks'])->name('mytalks');
Route::delete('/talks/{id}', [TalkController::class, 'delete'])->name('talks.delete');
// Route untuk menampilkan komentar dan menambahkan komentar
Route::get('/comments/{talk}/{user}', [KomentarController::class, 'show'])->name('comments.show');
Route::post('/comments/{talk}/{user}', [KomentarController::class, 'store'])->name('comments.store');

//rute untuk admin
Route::middleware('admin')->group(function () {
    // Definisikan rute yang memerlukan akses admin di sini
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    Route::get('/talkadmin', function () {
        return view('pages.talkadmin');
    })->name('talkadmin');


    Route::get('/admintalk', [AdmintalkController::class, 'index'])->name('admintalk');
    Route::delete('/admindelete/{id}', [AdmintalkController::class, 'delete'])->name('admindelete');


    Route::get('/count', [UserController::class, 'count'])->name('users.count');
    Route::get('/dashboard', [UserController::class, 'count'])->name('dashboard');


    Route::get('/count', [UserController::class, 'count'])->name('users.count');
    Route::get('/dashboard', [UserController::class, 'count'])->name('dashboard');

});

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');
Route::get('/editprofile', function () {
    return view('pages.editprofile');
})->name('editprofile');
Route::post('/editprofile', [AuthController::class, 'update']);

// Route::get('/', function () {
//     return view('pages/profile');
// });