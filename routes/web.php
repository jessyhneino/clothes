<?php
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[ClothesController::class,'home'])->name('home');


Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/cards',[ClothesController::class,'cards'])->middleware('auth')->name('cards');
Route::get('/{id}/complete', [ClothesController::class, 'complete'])->name('complete');
Route::get('/dashboardTable', [ClothesController::class, 'dashboardTable'])->name('dashboardTable');
Route::get('/create',[ClothesController::class,'create'])->name('create');
Route::get('/{id}/edit', [ClothesController::class, 'edit'])->name('edit');
Route::post('/insert',[ClothesController::class,'insert'])->name('insert');
Route::PUT('/{id}/update',[ClothesController::class,'update'])->name('update');
Route::get('/{id}/delete',[ClothesController::class,'delete'])->name('delete');

// Route::post('/toggle-like', [ClothesController::class, 'toggleLike'])->name('toggle.like');

Route::post('/{id}/store', [LikeController::class, 'store'])->middleware('auth')->name('likeStore');
Route::get('/liked-products', [LikeController::class, 'getLikedProducts'])->name('getLikedProducts');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';
