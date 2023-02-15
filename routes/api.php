<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
   
    return "hello dina";
});

Route::get('/posts', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/post/{id}', [PostController::class, 'show'])->middleware('auth:sanctum');
Route::post('/post', [PostController::class, 'store'])->middleware('auth:sanctum');
// Route::get('/post/edit', [PostController::class, 'edit']);
// Route::post('/post/update{id}', [PostController::class, 'update'])->middleware('auth:sanctum');



Route::get('/comments', [CommentController::class, 'index'])->middleware('auth:sanctum');
Route::get('/comment/{id}', [CommentController::class, 'show'])->middleware('auth:sanctum');
Route::post('/comment', [CommentController::class, 'store'])->middleware('auth:sanctum');


//to generate token with sanctum package

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});