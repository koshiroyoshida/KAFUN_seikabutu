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

Route::get('/posts/create', [PostController::class, 'create']); //投稿フォームの表示
Route::post('/posts', [PostController::class, 'store']);  //画像を含めた投稿の保存処理
Route::get('/posts/{post}', [PostController::class, 'show']); //投稿詳細画面の表示// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::post('/posts/{post}/comment', [CommentController::class, 'store']);
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('posts.addComment');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('/', [SearchController::class, 'search'])->name('search');

Route::delete('/posts/{post}', [PostController::class, 'delete']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'delete']);
Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('comment', 'CommentController', ['only' => ['store']]);

require __DIR__.'/auth.php';


