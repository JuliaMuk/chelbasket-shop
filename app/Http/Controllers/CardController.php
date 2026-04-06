<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{
    // public function addItem(Request $request, Product $product)
    // {
    //     $validated = $request->validate([
    //         'characteristic' => ['nullable', 'string', 'max:255'],
    //     ]);

    //     $order = Order::query()->findOrFail($validated['order_id']);

    //     if ($request->user() && $order->user_id !== null && $order->user_id !== $request->user()->id) {
    //         abort(403);
    //     }

    //     try {
    //         $order->addItem(
    //             $product,
    //             $validated['quantity'],
    //             $validated['characteristic'] ?? null
    //         );
    //     } catch (InvalidArgumentException $e) {
    //         return back()->withErrors(['order' => $e->getMessage()])->withInput();
    //     }

    //     return back()->with('success', 'Товар добавлен в заказ.');
    // }
}
