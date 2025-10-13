<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $details = UserDetail::where('user_id', $user_id)->first();
        return view('details',compact('details'));
    }

    public function storeOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'address' => 'required|max:255',
            'notes' => 'nullable',
            'postal_code' => 'required|max:255',
        ]);

        $user_id = auth()->id();

        $details = UserDetail::updateOrCreate(
            ['user_id' => $user_id],
            [
                'lastname' => $validatedData['lastname'],
                'firstname' => $validatedData['firstname'],
                'phone_number' => $validatedData['phone_number'],
                'city' => $validatedData['city'],
                'district' => $validatedData['district'],
                'address' => $validatedData['address'],
                'notes' => $validatedData['notes'],
                'postal_code' => $validatedData['postal_code'],
            ]
        );

        return redirect()->back()->with('success','Амжилттай хадгаллаа');
    }

}
