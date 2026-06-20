<?php
use App\Http\Controllers\PageController;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

//   Route::get('/', function () {
//     return view('welcome');
// });
//     Route::get('hello', function () {
//         return "<h1>hello world</h1>";
//     });
// Route::get("user/{id}", function ($id) {
//     return "User id = $id";
// });

// Route::get('user/{id}', function ($id ) {
//     return "User id = $id";
// })->where('id', '[0-9]+');// where method to restrict the parameter to be numeric only

// Route::get('product/{category}/{id}', function ($category, $id) {
//     return "Product category => $category -  product ID = $id";
// })->where(['category'=>'[A-Za-z]+', 'id'=>'[0-9]+']);// where method to restrict the parameters to be alphabetic only
// //Product category => arabi - product ID = 8
// Route::get('name', function () {
//     return ('welcome suzan');
// });
// Route::get('name/{name}', function ($name) {
//     return ("welcome {$name}");
// });
// Route::get('test', function () {
//     $name = 'suzan';
//    //return view('test.test', ['name' => $name]);
//    // return view('test.test')->with('name', $name);
//     return view('test.test', compact('name'));
    
// });
// Route::get('/users/{id}', function ($id) {
//     return "User ID = $id";
// });
// //Route::get('/home', function () {
//     //$name = 'suzan';
//     //$age = 30;
//    // $skills = ['php', 'laravel', 'javascript'];
//   // return view('/home', ['name' => $name, 'age' => $age, 'skills' => $skills]);

// // //});
// Route::get('/login',[PageController::class,'login']);

// Route::get('/home', [PageController::class,'home']);
// Route::get('/contact-us', [PageController::class,'contact']);

// Route::get('categories',function(){
//     return Category::all();
// });
// Route::get('posts',function(){
//     return Post::all();
// });
//categories routes
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//posts routes
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

                                    //بالطريقتين           
//resource routes
  Route::resource('categories', CategoryController::class);
  Route::resource('posts', PostController::class);