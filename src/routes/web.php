<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


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
    Route::get('/auth/user/{id}/edit-profile', [ProfileController::class, 'editProfile'])->name('user.editProfile');
    Route::put('/auth/user/{id}/update-profile', [ProfileController::class, 'updateProfile'])->name('user.updateProfile');
    
    // ポスト機能
    Route::get('/timeline', [PostController::class, 'timeline'])->name('timeline');
    Route::get('/mypost', [PostController::class, 'mypost'])->name('mypost');
    Route::get('/chat/index', [PostController::class, 'index'])->name('chat.index');
    
    //新規投稿登録画面のルート設定
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    // チャット機能
    Route::get('/chat/index', [ChatController::class, 'chat'])->name('chat.index');
    Route::post('/chat/create', [ChatController::class, 'create'])->name('chat.create');
    Route::get('/chat/show/{id}', [ChatController::class, 'chatShow'])->name('chat.show');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::patch('/chat/{posting}/toggle-anonymity', [ChatController::class, 'toggleAnonymity'])->name('chat.toggle-anonymity');

    // メモ機能
    Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    Route::get('memo/create', [MemoController::class, 'memocreate'])->name('memo.create');
    // Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');

    //非公開ディレクトリから画像を表示するためのカスタムルート設定
    Route::get('/user-icon/{filename}', function ($filename) {
        $path = 'public/private/user_icons/' . $filename;
        if (!Storage::exists($path)) {
            abort(404);
        }
        return Storage::download($path);
    })->name('user.icon');
    
  });
    require __DIR__.'/auth.php';
    


# メモ一覧画面
Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
Route::post('/memo/{id}', [MemoController::class, 'softDelete'])->name('memo.softDelete');

Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
Route::post('/memo/create', [MemoController::class, 'store'])->name('memo.store');


// Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');

//非公開ディレクトリから画像を表示するためのカスタムルート設定
Route::get('/user-icon/{filename}', function ($filename) {
    $path = 'public/private/user_icons/' . $filename;
    if (!Storage::exists($path)) {
        abort(404);
    }
    return Storage::download($path);
})->name('user.icon');


require __DIR__.'/auth.php';

