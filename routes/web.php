<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ImageController::class,  'index'])->name('image.index');
Route::get('/images/{image}',[ImageController::class,  'show'])->name('image.show');
Route::get('/images',[ImageController::class,  'create'])->name('image.create');
Route::post('/images',[ImageController::class,  'store'])->name('image.store');
