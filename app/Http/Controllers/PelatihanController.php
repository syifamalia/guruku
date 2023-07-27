<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Training;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $newTraining = Training::select()->orderByDesc('created_at')->limit(3)->get();

        return view('pelatihan.index', [
            "title" => "Pelatihan | Guruku",
            "newTraining" => $newTraining,
            "training" => Training::latest()->paginate(6)
        ]);
    }

    public function showModul(Training $training)
    {
        $modules = Module::where('training_id', $training->id)->get();
        return view('pelatihan.modul', [
            "title" => "Modul Pelatihan | Guruku",
            "modules" => $modules,
            "training" => $training
        ]);
    }

    public function detail(Training $training)
    {
        $random = Training::inRandomOrder()->limit(3)->whereNotIn('id', [request()->training->id])->get();

        return view('pelatihan.detail', [
            "title" => "Detail Pelatihan | Guruku",
            "training" => $training,
            "randTraining" => $random,
            'modules' => Module::all()
        ]);
    }
}
