<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/user', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::get('user/export/', [UserController::class, 'export'])->name('user.export');
Route::post('user/import/', [UserController::class, 'import'])->name('user.import');

Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');




// testing
Route::get('/testing', function() {
    dd('Hello World Testing');
});
