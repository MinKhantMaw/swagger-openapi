<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/user', 'App\Http\Controllers\UserController@getUserDetails')->middleware('auth:sanctum');


Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::post('/create-post', 'App\Http\Controllers\PostController@create');
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@show');
Route::post('/posts/{id}/update', 'App\Http\Controllers\PostController@update');
Route::post('/posts/{id}/delete', 'App\Http\Controllers\PostController@delete');
