<?php

use App\Models\Estate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->is_owner) {

        $estates = Estate::where('user_id', $user->id)->get();
        return view('dashboard', compact('estates'));
    } else {
        return redirect()->route('estates.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/estates/create', [EstateController::class, 'create'])->name('estates.create');
    Route::post('/estates', [EstateController::class, 'store'])->name('estates.store');
    Route::get('/estates/{estate}/edit', [EstateController::class, 'edit'])->name('estates.edit');
    Route::put('/estates/{estate}', [EstateController::class, 'update'])->name('estates.update');
    Route::delete('/estates/{estate}', [EstateController::class, 'destroy'])->name('estates.destroy');
});
 Route::get('/estates/{estate}', [EstateController::class, 'show'])->name('estates.show'); // This comes last
Route::get('/estates', [EstateController::class, 'index'])->name('estates.index');

require __DIR__.'/auth.php';
