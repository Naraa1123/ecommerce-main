<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(4)->get();

        return view('home', compact('products'));
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('name','like',"%{$validated['search']}%")->get();

        return view('home',compact('products'));
    }
}
