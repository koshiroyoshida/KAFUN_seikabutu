<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;//外部にあるPostControllerクラスをインポート
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('index');
    
    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('create');
    
    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');
    
    Route::get('/posts/{post}', [PostController::class, 'show'])
        ->name('posts.show');
        
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    
    Route::post('/posts/{post}/comment', [CommentController::class, 'store'])
        ->name('posts.addComment');
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
    
    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');
    
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
        ->name('comments.edit');
    
    Route::put('/comments/{comment}', [CommentController::class, 'update'])
        ->name('comments.update');
    
    Route::delete('/comments/{comment}', [CommentController::class, 'delete'])
        ->name('comments.delete');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])
      ->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    
    Route::resource('comment', 'CommentController', ['only' => ['store']]);
});

// 認証ルートの定義
require __DIR__.'/auth.php';

