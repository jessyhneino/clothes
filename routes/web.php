<?php
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[ClothesController::class,'home'])->name('home');

Route::get('/complete', function () {
    return view('complete');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/cards',[ClothesController::class,'cards'])->name('cards');
Route::get('/create',[ClothesController::class,'create'])->name('create');
Route::post('/insert',[ClothesController::class,'insert'])->name('insert');

// Route::get('/update/{id}',[ClothesController::class,'update']);
// Route::get('/edit/{id}',[ClothesController::class,'edit']);
// Route::get('/delete/{id}',[ClothesController::class,'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';
