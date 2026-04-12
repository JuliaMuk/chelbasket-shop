<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('card');
Route::post('/order/add-item',[OrderController::class,'addItem'])->name('order.add-item');
Route::get('/basket', [OrderController::class, 'show'])->name('basket');
Route::delete('/order/item', [OrderController::class, 'removeItem'])->name('order.remove-item');
Route::get('/order/plus-item', [OrderController::class, 'plusItem'])->name('order.plus-item');
Route::get('/order/minus-item', [OrderController::class, 'minusItem'])->name('order.minus-item');
Route::get('/buy', [OrderController::class,'placeOrder'])->name('buy');
Route::post('/order/create', [OrderController::class,'create'])->name('order.create');
Route::post('/search',[SearchController::class,'index'])->name('search');
Route::post('/subscribe',[UserController::class,'subscribe'])->name('subscribe');

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




Route::get('/clean-session', function(){
    session()->flush();
    return redirect()->back();
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
