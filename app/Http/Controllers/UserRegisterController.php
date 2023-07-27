<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            "title" => "Daftar Akun | Guruku",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20',
            'phone' => 'required',
            'photo' => 'required|image|file|max:1024|dimensions:max_width=500,max_height=500'
        ]);

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('profile-images');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/signin')->with('success', 'Pendaftaran berhasil! Silahkan login!');
    }
}
