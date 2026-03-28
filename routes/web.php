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

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/new-collection', function () {
    $products = Product::all();
    return view('new-collection', compact('products'));
})->name('new-collection');

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest')->name('registration');

Route::get('/autorisation', function () {
    return view('autorisation');
})->middleware('guest')->name('autorisation');

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/balls', function () {
    $products = Product::all();
    return view('balls', compact('products'));
})->name('balls');

Route::get('/t-shirt', function () {
    $products = Product::all();
    return view('t-shirt', compact('products'));
})->name('t-shirt');

Route::get('/singlet', function () {
    $products = Product::all();
    return view('singlet', compact('products'));
})->name('singlet');

Route::get('/souvenirs', function () {
    $products = Product::all();
    return view('souvenirs', compact('products'));
})->name('souvenirs');

Route::get('/sweatshirts', function () {
    $products = Product::all();
    return view('sweatshirts', compact('products'));
})->name('sweatshirts');

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

Route::get('/card', function () {
    return view('card');
})->name('card');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
