<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

/** [Info] Route utilisable par n'importe quels utilisateurs. */
Route::get('/', function () { return view('home'); })->name('home');
Route::get('a-propos', function () { return view('about'); })->name('about');
Route::get('contact', function () { return view('contact'); })->name('contact');
Route::get('services', function () { return view('services'); })->name('services');
Route::get('tarifs', function () { return view('pricing'); })->name('pricing');
Route::post('creation-de-compte', [UserController::class, 'register'])->name('register');

Route::get('creation-de-compte', function(){
    if(Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.register');
})->name('new.user');


Route::get('se-connecter', function () {
    if(Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
})->name('login');

Route::get('reservation', function () {
    if(Auth::check()) {
        return view('book');
    }else{
        return redirect()->route('login')->with('error', 'Vous devez vous connecter pour réserver un cours ou un pack !');
    }
})->name('reservation');

Route::get('verification-email', function () { return view('auth.verify-email'); })->name('verification.notice');
Route::get('mot-de-passe-oublie', function () { return view('auth.forgot-password'); })->name('password.request');
Route::get('changer-mot-de-passe', function () { return view('auth.forgot-password'); })->name('password.request');
Route::get('reinitialiser-mot-de-passe', function () { return view('auth.reset-password'); })->name('password.reset');

/** [Info] Route utilisable par un utilisateur authentifié. */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('espace-membre', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('updateByUser/{id}', [UserController::class, 'updateByUser'])->name('updateByUser');
});

/** [Info] Route utilisable par un administrateur. */
Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('tableau-de-bord', function () { return view('admin'); })->name('admin');
    Route::prefix('tableau-de-bord')->group(function () {
    Route::get('nouveau-utilisateur', function () { return view('auth.register'); })->name('register');
    });

    Route::post('espace-membre/create', [UserController::class, 'create'])->name('create');
    Route::get('edit/{id}', [UserController::class, 'userById'])->name('edit');
    Route::get('info/{id}', [UserController::class, 'userById'])->name('info');
    Route::put('update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [UserController::class, 'delete'])->name('delete');

    Route::get('file-viewer', [FileController::class, 'index'])->name('file-viewer');
    Route::post('/upload-file', [FileController::class, 'uploadFile'])->name('upload.file');
    Route::post('/create-folder', [FileController::class, 'createFolder'])->name('create.folder');
    Route::post('/delete-file', [FileController::class, 'deleteFile'])->name('delete.file');
    Route::post('/delete-folder', [FileController::class, 'deleteFolder'])->name('delete.folder');
});


