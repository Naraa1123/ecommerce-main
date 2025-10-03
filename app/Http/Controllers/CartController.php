<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => ['integer','min:1'],
        ]);

        $quantity = $validated['quantity'] ?? 1;

        $product = Product::findOrFail($validated['product_id']);

        if($product->stock < $quantity)
        {
            return back()->with('error','Үлдэгдэл хүрэлцэхгүй байна');
        }

        $cart = $request->session()->get('cart', []);

        if( isset($cart[$product->id]) )
        {
            $newQty = $cart[$product->id]['quantity'] + $quantity;
            if($product->stock < $newQty)
            {
                return back()->with('error','Үлдэгдэл хүрэлцэхгүй байна');
            }
            $cart[$product->id]['quantity'] = $newQty;
        }
        else{
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        $request->session()->put('cart',$cart);


        return back()->with('success','Сагсанд нэмэгдлээ');

    }

    public function show(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        return view('cart.index', compact('cart', 'subtotal'));
    }

    public function remove(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
        ]);

        $cart = $request->session()->get('cart', []);

        unset($cart[$validated['product_id']]);

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success','Амжилттай усгалаа');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('home')->with('success','Сагс хоосоллоо');
    }
}
