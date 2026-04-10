<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;

use function Pest\Laravel\session;

class OrderController extends Controller
{

    public function show()
    {
        $orderItems = [];
        $cost = 0;
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            foreach ($orderItems as &$item) {
                $product = Product::where('id', $item['product_id'])->first();
                $item['name'] = $product->name;
                $item['price'] = $product->price;
                $item['path_img'] = $product->path_img;
                $cost += $item['price'] * $item['quantity'];
            }
            unset($item);
        }
        return view('basket', compact('orderItems', 'cost'));
    }
    public function addItem(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'characteristic' => ['nullable', 'string', 'max:255'],
        ]);
        $product = Product::where('id', $request->product_id)->first();
        if (!$product->isAvailable()) {
            abort(403);
        }
        $orderItems = [];
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            $foundKey = null;
            foreach ($orderItems as $key => $item) {
                if ($item['product_id'] === $request->product_id && $item['characteristic'] == $request->characteristic) {
                    $foundKey = $key;
                    break;
                }
            }
            if (!is_null($foundKey)) {
                $orderItems[$key]['quantity']++;
            } else {
                array_push($orderItems, ['product_id' => $request->product_id, 'quantity' => 1, 'characteristic' => $request->characteristic]);
            }
        } else {
            array_push($orderItems, ['product_id' => $request->product_id, 'quantity' => 1, 'characteristic' => $request->characteristic]);
        }

        Session::put('cart', $orderItems);
        if (Session::has('count')) {
            $count = Session::get('count');
            $count++;
        } else {
            $count = 1;
        }
        Session::put('count', $count);
        return redirect()->back();
    }

    public function removeItem(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'characteristic' => ['nullable', 'string', 'max:255'],
        ]);
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            if (Session::has('count')) {
                $count = Session::get('count');
                $foundKey = null;
                foreach ($orderItems as $key => $item) {
                    if ($item['product_id'] === $request->product_id && $item['characteristic'] == $request->characteristic) {
                        $foundKey = $key;
                        break;
                    }
                }
                $count -= $orderItems[$foundKey]['quantity'];
                Session::put('count', $count);
            }
            $orderItems = array_filter($orderItems, function ($item) use ($request) {
                return !($item['product_id'] == $request->product_id && $item['characteristic'] == $request->characteristic);
            });
            $orderItems = array_values($orderItems);
            Session::put('cart', $orderItems);
        }
        return redirect()->back();
    }

    public function minusItem(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'characteristic' => ['nullable', 'string', 'max:255'],
        ]);
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            $foundKey = null;
            foreach ($orderItems as $key => $item) {
                if ($item['product_id'] === $request->product_id && $item['characteristic'] == $request->characteristic) {
                    $foundKey = $key;
                    break;
                }
            }
            if ($orderItems[$foundKey]['quantity'] == 1) {
                return $this->removeItem($request);
            } else {
                if (Session::has('count')) {
                    $count = Session::get('count');
                    $count--;
                    Session::put('count', $count);
                }

                if ($orderItems[$foundKey]['quantity'] == 1) {
                    return $this->removeItem($request);
                }

                $orderItems[$foundKey]['quantity']--;
            }
            Session::put('cart', $orderItems);
        }
        return redirect()->back();
    }

    public function plusItem(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'characteristic' => ['nullable', 'string', 'max:255'],
        ]);
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            $foundKey = null;
            foreach ($orderItems as $key => $item) {
                if ($item['product_id'] === $request->product_id && $item['characteristic'] == $request->characteristic) {
                    $foundKey = $key;
                    break;
                }
            }
            if (Session::has('count')) {
                $count = Session::get('count');
                $count++;
                Session::put('count', $count);
            }
            $orderItems[$foundKey]['quantity']++;
            Session::put('cart', $orderItems);
        }
        return redirect()->back();
    }

    public function placeOrder()
    {
        $orderItems = [];
        $cost = 0;
        if (Session::has('cart')) {
            $orderItems = Session::get('cart', []);
            foreach ($orderItems as &$item) {
                $product = Product::where('id', $item['product_id'])->first();
                $item['name'] = $product->name;
                $item['price'] = $product->price;
                $item['path_img'] = $product->path_img;
                $cost += $item['price'] * $item['quantity'];
            }
            unset($item);
        }
        return view('buy', compact('orderItems', 'cost'));
    }

    public function create(Request  $request, Order $order)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'comment' => ['nullable', 'string']
        ]);
        $validated['order_date'] = today();
        $validated['total_price'] = 0;
        $order = $order->create($validated);
        $order_id = $order->id;

        if (Session::has('cart')) {
            $cost = 0;
            $orderItems = Session::get('cart', []);
            foreach ($orderItems as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                $orderItem = new OrderItem;
                $orderItem->order_id = $order_id;
                $orderItem->product_id = $product->id;
                $orderItem->product_name = $product->name;
                $orderItem->quantity = $item['quantity'];
                $orderItem->characteristic_value = $item['characteristic'];
                $orderItem->item_price = $product->price;
                $orderItem->save();
                $cost += $product->price * $item['quantity'];
            }
            Session::forget('cart');
        }
        Order::where('id', $order_id)
            ->update(['total_price' => $cost]);
        if (Session::has('count')) {
            Session::forget('count');
        }
        return redirect()->route('home')->with('success', 'Заказ успешно оформлен. Мы свяжемся с вами в ближайшее время!');;
    }
}
