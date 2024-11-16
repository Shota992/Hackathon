<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\PostController;
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

<<<<<<< HEAD
Route::get('/timeline', [PostController::class, 'timeline'])->name('timeline');
Route::get('/mypost', [PostController::class, 'mypost'])->name('mypost');
Route::get('/chat/index', [ProfileController::class, 'index'])->name('chat.index');
=======
//新規投稿登録画面のルート設定
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/timeline', [ProfileController::class, 'timeline'])->name('timeline');
Route::get('/mypost', [ProfileController::class, 'mypost'])->name('mypost');
Route::get('/chat/index', [ProfileController::class, 'chat'])->name('chat.index');
>>>>>>> 691e4fce3878436449af387608a2881ce338c5fa


Route::get('memo/create', [MemoController::class, 'memocreate'])->name('memo.create');
// Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');

require __DIR__.'/auth.php';
