<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ProductController::class,'home'])->name('home');

Route::get('/categories', [ProductController::class,'categories'])->name('categories');
Route::get('/catalog/{category}', [ProductController::class,'catalog'])->name('catalog');
Route::get('/products/{product}',[ProductController::class,'show'])->name('card');

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest')->name('registration');

Route::get('/autorisation', function () {
    return view('autorisation');
})->middleware('guest')->name('autorisation');



Route::get('/user', function () {
    return view('user');
})->name('user');


Route::get('/form', function () {
    $products = Product::all();
    return view('form', compact('products'));
})->name('form');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/buy', function () {
    return view('buy');
})->name('buy');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
