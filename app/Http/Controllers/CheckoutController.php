<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $cart = Cart::with('items.product')->findOrFail($id);

        $subtotal = $cart->items->sum(fn($i) => $i->unit_price * $i->quantity);

        return view('cart.index',compact('cart','subtotal'));
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $cart = Cart::where('user_id',$user->id)
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if($cart->items->count() <= 0)
        {
            return redirect()->back()->with('error','Карт хоосон байна');
        }

        $subtotal = $cart->items->sum(fn($i) => $i->unit_price * $i->quantity);


        $order = Order::create([
            'user_id' => $user->id,
            'cart_id' => $cart->id,
            'subtotal' => $subtotal,
            'status' => 'pending',
        ]);

        $cart->update(['status' => 'ordered']);

        $request->session()->forget('cart');

        return redirect()->route('home')->with('success','Амжилттай захиаллаа');
    }

}
