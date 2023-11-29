<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;


//auth protected routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('posts.comments', CommentController::class);
    Route::post('{comment}/replies', [ReplyController::class ,'store'])->name('comments.store');
    
    //admins functionalities
    Route::middleware('isAdmin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('posts', PostController::class);
            Route::resource('categories', CategoryController::class);
        });
    });
});

//user posts
Route::get('/', [UserPostController::class, 'index'])->name('dashboard');
Route::resource('/posts', UserPostController::class)->names([
    'index' => 'user-posts.index',
    'store' => 'user-posts.store',
    'edit' => 'user-posts.edit',
    'create' => 'user-posts.create',
    'show' => 'user-posts.show',
    'update' => 'user-posts.update',
    'destroy' => 'user-posts.destroy',
]);

require __DIR__.'/auth.php';
