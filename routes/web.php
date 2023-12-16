<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[Homecontroller::class,'homepage']);

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::get('/home',[Homecontroller::class,'index'])->middleware('auth')->name('home');
Route::get('/post',[Homecontroller::class,'post'])->middleware(['auth','admin'])->name('post');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post_page',[Admincontroller::class,'post_page']);
Route::post('/add_post',[Admincontroller::class,'add_post']);

Route::get('/show_post',[Admincontroller::class,'show_post']);

Route::get('/delete_post/{id}',[Admincontroller::class,'delete_post']);

Route::get('/home_post',[Admincontroller::class,'home_post']);

Route::get('/update_post/{id}',[Admincontroller::class,'update_post']);

Route::get('/details_post/{id}',[Homecontroller::class,'details_post']);
Route::get('/blogs}',[Homecontroller::class,'blogs']);


Route::post('/updated_post/{id}',[Admincontroller::class,'updated_post']);

Route::get('/create_post',[Homecontroller::class,'create_post'])->middleware('auth');

Route::post('/user_post',[Homecontroller::class,'user_post']);

Route::get('/my_post',[Homecontroller::class,'my_post'])->middleware('auth');


Route::get('/removepostbyuser/{id}',[Homecontroller::class,'removepostbyuser'])->middleware('auth');


Route::get('/post_update_page/{id}',[Homecontroller::class,'post_update_page'])->middleware('auth');

Route::post('/updated_post_data/{id}',[Homecontroller::class,'updated_post_data']);

Route::get('/accept_post/{id}',[Admincontroller::class,'accept_post']);
Route::get('/reject_post/{id}',[Admincontroller::class,'reject_post']);



