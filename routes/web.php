<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StudentController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
// use vendor\spatie\yaml-front-matter\src\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');
 
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('authors/{author:username}', function(User $author){
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login/store', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::get('admin/posts/{post}/delete', [AdminPostController::class, 'destroy'])->middleware('admin');
Route::get('admin/posts/{post}/view', [AdminPostController::class, 'show'])->middleware('admin');
Route::get('/admin/posts', [AdminPostController::class,'table'])->name('admin/posts');