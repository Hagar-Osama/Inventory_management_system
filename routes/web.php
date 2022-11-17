<?php

use App\Http\Controllers\Admin\AdminProfileController;
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
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{adminId}', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::get('/password/edit/{adminId}', [AdminProfileController::class, 'changePasswordIndex'])->name('password.edit');
    Route::post('/password/update', [AdminProfileController::class, 'updatePassword'])->name('password.change');





});

require __DIR__.'/auth.php';
