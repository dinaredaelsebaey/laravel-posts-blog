<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('welcome');
    //return "hello dina";
});
 
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');


Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/edit{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/delete{id}', [PostController::class, 'delete'])->name('posts.delete');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');