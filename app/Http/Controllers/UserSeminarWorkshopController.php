<?php

namespace App\Http\Controllers;

use App\Models\SeminarWorkshop;
use App\Models\SeminarWorkshopCategory;
use Illuminate\Http\Request;

class UserSeminarWorkshopController extends Controller
{
    public function index()
    {
        return view('seminarWorkshop.index', [
            "title" => "Seminar & Workshop | Guruku",
            "categories" => SeminarWorkshopCategory::all(),
            "seminarWorkshop" => SeminarWorkshop::latest()->paginate(6)
        ]);
    }

    public function cat(SeminarWorkshopCategory $category)
    {
        $seminarWorkshop = SeminarWorkshop::where('seminar_workshop_category_id', $category->id)->latest()->paginate(6);
        return view('seminarWorkshop.category', [
            "title" =>  $category->tittle . " | Guruku",
            "seminarWorkshop" => $seminarWorkshop,
            "categories" => SeminarWorkshopCategory::all(),
            "category" => $category
        ]);
    }

    public function detail(SeminarWorkshop $seminarWorkshop)
    {
        $random = SeminarWorkshop::inRandomOrder()->limit(3)->whereNotIn('id', [request()->seminarWorkshop->id])->get();

        return view('seminarWorkshop.detail', [
            "title" => "Detail Kegiatan | Guruku",
            "seminarWorkshop" => $seminarWorkshop,
            "randSW" => $random
        ]);
    }
}
