<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Diklat;
use App\Models\Review;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $diklat = Diklat::inRandomOrder()->limit(1)->get();
        $trainings = Training::inRandomOrder()->limit(2)->get();
        $review = Review::select()->where('rate', '>', 2)->get();
        return view('home', [
            "title" => "Guruku",
            "reviews" => $review,
            "diklats" => $diklat,
            "trainings" => $trainings
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect('/')->with('added', 'Terima kasih telah menghubungi kami!');
    }
}
