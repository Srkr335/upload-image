<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\ProductImageController;  
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {


$categories=Category::get();

    return view('dashboard',compact('categories'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route::get('/categories', [CategoryController::class, 'index'])->name('index');
Route::get('dashboard/create', [CategoryController::class, 'create'])->name('create');
Route::post('dashboard/create', [CategoryController::class, 'store'])->name('store');
Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name('edit');
Route::PUT('/categories/{id}/edit',[CategoryController::class, 'update'])->name('update');
Route::get('/categories/{id}/delete',[CategoryController::class, 'delete'])->name('delete');

Route::get('/categories/{productid}/upload',[ProductImageController::class, 'index'])->name('index.upload');


require __DIR__.'/auth.php';
