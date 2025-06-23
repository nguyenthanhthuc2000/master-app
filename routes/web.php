<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SsoRedirectController;
use Illuminate\Http\Request;

Route::middleware(['api', 'auth:api'])->get('/api/user', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working!',
        'user' => $request->user(),
    ]);
});

Route::view('/', 'welcome')->name('welcome');
Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::post('/sso/redirect', [SsoRedirectController::class, 'redirect'])->name('sso.redirect');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
