<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'comment' => $validatedData['comment'],
        ]);

        return redirect()->back();
    }
}
