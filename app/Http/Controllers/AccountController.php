<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        $participants = Participant::where('user_id', Auth::user()->id)->get();
        $review = Review::select('user_id')->where('user_id', Auth::user()->id)->first();
        return view('account.index', [
            'title' => 'Akun ' . Auth::user()->name,
            'user' => Auth::user(),
            'participants' => $participants,
            'review' => $review
        ]);
    }

    public function sertifikat()
    {
        $participants = Participant::where('user_id', Auth::user()->id)->whereNotNull('certificate')->get();
        $review = Review::select('user_id')->where('user_id', Auth::user()->id)->first();
        return view('account.sertifikat', [
            'title' => 'Sertifikat ' . Auth::user()->name,
            'user' => Auth::user(),
            'participants' => $participants,
            'review' => $review
        ]);
    }

    public function pengaturan()
    {
        $review = Review::select('user_id')->where('user_id', Auth::user()->id)->first();
        return view('account.pengaturan', [
            'title' => 'Pengaturan Akun ' . Auth::user()->name,
            'user' => Auth::user(),
            'review' => $review
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'photo' => 'image|file|max:1024|dimensions:max_width=500,max_height=500'
        ];
        
        
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }
        
        
        if ($request->password) {
            $rules['password'] = 'min:5|max:20';
        }
        
        $validatedData = $request->validate($rules);
        
        if ($request->file('photo')) {
            if ($request->oldImage != NULL) {
                Storage::delete($request->oldImage);
            }
            
            $validatedData['photo'] = $request->file('photo')->store('profile-images');
        }

        if ($request->password) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/akun/pengaturan')->with('added', 'Profil Anda Berhasil diperbarui!');
    }
}
