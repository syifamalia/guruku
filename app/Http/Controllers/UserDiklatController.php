<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\DiklatCategory;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Http\Request;

class UserDiklatController extends Controller
{
    public function index()
    {
        $newDiklat = Diklat::select()->orderByDesc('created_at')->limit(3)->get();

        return view('diklat.index', [
            "title" => "Diklat | Guruku",
            "newDiklat" => $newDiklat,
            "categories" => DiklatCategory::all(),
            "diklat" => Diklat::latest()->paginate(6)
        ]);
    }

    public function cat(DiklatCategory $category)
    {
        $diklat = Diklat::where('diklat_category_id', $category->id)->latest()->paginate(6);
        return view('diklat.category', [
            "title" => "Diklat " . $category->name . " | Guruku",
            "diklats" => $diklat,
            "categories" => DiklatCategory::all(),
            "category" => $category
        ]);
    }

    public function detail(Diklat $diklat)
    {
        $random = Diklat::inRandomOrder()->limit(3)->whereNotIn('id', [request()->diklat->id])->get();

        return view('diklat.detail', [
            "title" => "Detail Diklat | Guruku",
            "diklat" => $diklat,
            "randDiklat" => $random
        ]);
    }

    public function update(Request $request)
    {
        Participant::create([
            'user_id' => $request->userID,
            'diklat_id' => $request->diklatID,
            'email' => $request->userEmail
        ]);

        return redirect('/akun')->with('newDiklat', 'Kamu akan menerima e-mail berupa detail jam, modul dan link zoom untuk program Diklat ini. Mohon cek e-mail kamu, ya! Terima Kasih!');
    }
}
