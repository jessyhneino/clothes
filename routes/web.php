<?php
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductwinterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[ProductController::class,'home'])->name('home');
Route::get('/dashboardTablecat', [ProductController::class, 'dashboardTablecat'])->middleware('auth')->name('dashboardTablecat');
Route::get('/createpro',[ProductController::class,'createpro'])->middleware('auth')->name('createpro');
Route::get('/{id}/editpro', [ProductController::class, 'editpro'])->middleware('auth')->name('editpro');
Route::post('/insertpro',[ProductController::class,'insertpro'])->middleware('auth')->name('insertpro');
Route::PUT('/{id}/updatepro',[ProductController::class,'updatepro'])->middleware('auth')->name('updatepro');
Route::get('/{id}/deletepro',[ProductController::class,'deletepro'])->middleware('auth')->name('deletepro');


// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/cards',[ClothesController::class,'cards'])->name('cards');
Route::get('/{id}/complete', [ClothesController::class, 'complete'])->name('complete')->middleware('auth');
Route::get('/dashboardTable', [ClothesController::class, 'dashboardTable'])->middleware('auth')->name('dashboardTable');
Route::get('/create',[ClothesController::class,'create'])->middleware('auth')->name('create');
Route::get('/{id}/edit', [ClothesController::class, 'edit'])->middleware('auth')->name('edit');
Route::post('/insert',[ClothesController::class,'insert'])->middleware('auth')->name('insert');
Route::PUT('/{id}/update',[ClothesController::class,'update'])->middleware('auth')->name('update');
Route::get('/{id}/delete',[ClothesController::class,'delete'])->middleware('auth')->name('delete');

// Route::post('/toggle-like', [ClothesController::class, 'toggleLike'])->name('toggle.like');

Route::post('/{id}/store', [LikeController::class, 'store'])->middleware('auth')->name('likeStore');
Route::get('/liked-products', [LikeController::class, 'getLikedProducts'])->name('getLikedProducts');


Route::get('/{id}/comment',[CommentController::class,'comment'])->name('comment')->middleware('auth');
Route::post('/insertcom',[CommentController::class,'insertcom'])->name('insertcom');
Route::PUT('/{id}/updatecom',[CommentController::class,'updatecom'])->name('updatecom');
Route::get('/{id}/deletecom',[CommentController::class,'deletecom'])->name('deletecom');


// Route::get('/cardswinter',[ProductwinterController::class,'cardswinter'])->middleware('auth')->name('cardswinter');
// Route::get('/createwinter',[ProductwinterController::class,'createwinter'])->name('createwinter');
// Route::get('/{id}/editwinter', [ProductwinterController::class, 'editwinter'])->name('editwinter');
// Route::post('/insertwinter',[ProductwinterController::class,'insertwinter'])->name('insertwinter');
// Route::PUT('/{id}/updatewinter',[ProductwinterController::class,'updatewinter'])->name('updatewinter');
// Route::get('/{id}/deletewinter',[ProductwinterController::class,'deletewinter'])->name('deletewinter');


// Route::get('/dashboard', function () {
//     return view('login');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';
